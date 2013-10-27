<?php
App::uses('AppController', 'Controller');

class UsersController extends AppController {

	public $name = 'Users';

	var $components = array('Auth');
	var $p_user = array();

	public function beforeFilter()
	{
		$this->layout = 'dashboard';
		$this->Auth->allow('signup','login');

		$user = $this->Auth->user();
		//debug($user);
		if(!empty($user)){
			$this->loadModel('User');
			$options = array('conditions'=>array('username'=>$user['User']['username']));
			$this->p_user = $this->User->find('first', $options);
		}

		$this->set('user', $this->p_user);

	}

	public function login() {
		$this->layout = 'dashboardsingles';
		// if($this->Auth->user($this->request->data)){
		// 	$this->redirect(array('controller'=>'users','action'=>'dashboard'));
		// }

		// Check for login
		//$this->request->data
		//debug($this->request->data);
		if($this->request->data) {

			if($this->Auth->login($this->request->data)){

				$this->redirect(array('controller' => 'users', 'action' => 'dashboard'));
			} else {
				$this->Session->setFlash('Sorry but your login attempt failed.');
				$this->goBack();
			}
		}

	}

	public function signup() {
		// Check for login
		$this->layout = 'default';

		if($this->request->data) {

			$email = $this->request->data['User']['email'];
			$username = $this->request->data['User']['username'];
			$password = $this->request->data['User']['password'];

			$conditions = array('OR' => array('email' => $email, 'username'=>$username));
			$user = $this->User->find('first', array('conditions' =>$conditions));

			if(!empty($user)){
				//$this->data['User']['username'] = $username;
				//$this->data['User']['email'] = $email;

				// This user already exists brosef.
				if($user['User']['username'] == $username && $user['User']['email'] == $email){
					$this->Session->setFlash('That Username and Email has already been used.', 'default', array('class' => 'example_class'));
					$this->goBack();
				} else if($user['User']['username'] == $username) {
					$this->Session->setFlash('Username has already been taken.', 'default', array('class' => 'example_class'));
					$this->goBack();
				} else {
					$this->Session->setFlash('Email has already been taken.', 'default', array('class' => 'example_class'));
					$this->goBack();
				}
			}

			// Check for an empty password
			if($password == $this->Auth->password('')){
				$this->Session->setFlash('Sorry but your password is blank.', 'default', array('class' => 'example_class'));
				$this->goBack();
			} else if( strlen($password) < 8 ){
				$this->Session->setFlash('Your password is too short', 'default', array('class' => 'example_class'));
				$this->goBack();				
			}
			$this->request->data['User']['password'] = $this->Auth->password($password);



// create a new stripe customer
			// Lets sign this brother up.
			$data = array(
				'email' => $this->request->data['User']['email']
			);
			$result = $this->Stripe->create($data);
			$this->request->data['User']['stripe_id'] = $result['id'];
			$this->User->create();
			$this->User->save($this->data);


			// Give this Brosef some Votes
			$new_user = $this->User->find('first', array('conditions'=>array('username' => $this->data['User']['username'])));
			$this->loadModel('Vote');
			$data = array('Vote'=>array(
				'user_id' => $new_user['User']['id']
				)
			);

			for($i = 2; $i >0; $i--){
				$this->Vote->create();
				$this->Vote->save($data);
			}

			$this->Auth->login($this->data);

			$this->redirect(array('controller'=>'users','action'=>'dashboard'));
		}
	}

	public function logout()
	{
		$this->Auth->logout();
		$this->redirect('/');
	}

	public function account()
	{
		// Debugging
		//debug($this->p_user);

		// Layout and settings
		$this->layout = 'ajax';
		$created = $this->p_user['User']['created'];
		$isplus = false;
		if($this->p_user['User']['plan'] == 'plus'){$isplus = true;}
		$this->set('isplus',$isplus);
		$time = strtotime($created);
		$this->set('supporting', $time);
		// Expose User
		$this->set('user', $this->p_user);


		// Votes
		$this->loadModel('Vote');
		$options = array('conditions'=>array('user_id'=> $this->p_user['User']['id']));
		$votes = $this->Vote->find('count', $options);
		$this->set('votes', $votes);


		// Used Votes
		$options = array('conditions'=>array('user_id'=> $this->p_user['User']['id'], 'used !=' => 'NULL'));
		$used = $this->Vote->find('count', $options);
		$this->set('used', $used);


		// Obtain Stripe Customer information.
		$id = $this->p_user['User']['stripe_id'];
		$result = $this->Stripe->customerRetrieve($id);

		// No Card
		$nocard = false;
		if(!empty($result)){
			if($result->cards->count == 0){
				$nocard = true;
			}
		}
		$this->set('nocard', $nocard);
		// debug($result);
	}


	public function dashboard()
	{
		$this->loadModel('Vote');
		$options = array('conditions'=>array('user_id'=>$this->p_user['User']['id']));
		$votes = $this->Vote->find('count', $options);
		$this->set('votes', $votes);

		$this->loadModel('Feature');
		$features = $this->Feature->find('all');
		$this->set('features', $features);
	}



	/*
		Credit Card stuff
	*/
	public function savenewcard()
	{
		$this->layout = 'ajax';
		$data =  $this->request->input();
		//$token = 'tok_2hbMbOmBgEw4Gl';

		// Obtain Stripe Customer information.
		$id = $this->p_user['User']['stripe_id'];
		$cu = $this->Stripe->customerRetrieve($id);
		$cu->card = $data;
		
		if($cu->save()){
			echo "success";
		} else {
			echo "Your Card Was Declined";
		}
		die;
	}

	// The Subscribe view for Plus
	public function subscribe()
	{

	}

	// Saves the User token.
	public function savetoken()
	{
		 
		$id = $this->p_user['User']['id'];
		//die;
		if($this->data){
			$this->User->id = $id;
			$token = $this->data['stripeToken'];
			$this->User->saveField('stripetoken', $token);


			// Lets sign this brother up.
			$data = array(
				'amount'=>'1.99', 
				'stripeToken' => $token,
				'description' => $this->p_user['User']['email']
			);
			$result = $this->Stripe->charge($data);

			//if success
			if(is_array($result)){
				$this->User->saveField('stripe_id', $result['stripe_id']);
				$this->User->saveField('plan', 'plus');
			//if failure
			} else {
				$this->Session->setFlash($result);
			}
			// Now redirect
			$this->redirect('dashboard');
		}
	}

	/*
		Admin Stuff
	*/

	public function admin_login() {

		$this->layout = 'dashboardsingles';

		if($this->request->data) {

			if($this->Auth->login($this->request->data)){

				$this->admin_check();
				$this->redirect(array('controller' => 'users', 'action' => 'index'));
			} else {

				$this->Session->setFlash('Sorry but your login attempt failed.');
				$this->goBack();
			}
		}

	}

	public function admin_index()
	{
		$this->layout = 'dashboardsingles';
		$this->admin_check();
	}

}