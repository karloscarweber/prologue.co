<?php
App::uses('AppController', 'Controller');

class UsersController extends AppController {

	/**
	 * Controller name
	 *
	 * @var string
	 */
	public $name = 'Users';

	var $components = array('Auth');
	var $p_user = array();

	public function beforeFilter()
	{
		$this->layout = 'dashboard';
		$this->Auth->allow('signup','login');

		$user = $this->Auth->user();
		if(!empty($user)){
			$this->loadModel('User');
			$options = array('conditions'=>array('username'=>$user['users']['username']));
			$this->p_user = $this->User->find('first', $options);
		}

	}



	/**
	 * Displays a view
	 *
	 * @param mixed What page to display
	 * @return void
	 */

	public function login() {

		if($this->Auth->user()){
			$this->redirect(array('controller'=>'users','action'=>'dashboard'));
		}

		// Check for login
		//$this->request->data
		//debug($this->request->data);
		if($this->request->data) {

			if($this->Auth->login($this->request->data)){
				$this->redirect(array('controller' => 'users', 'action' => 'dashboard'));
			}

			debug($this->request->data);
			die;
			$this->data['User'];
		}

	}

	public function signup() {
		// Check for login
		//$this->request->data

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
				$this->Session->setFlash('', 'default', array('class' => 'example_class'));
				$this->goBack();				
			}



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

		//$this->p_user['User']['id'];
		//debug($this->p_user);

		//debug($this->p_user);
		$created = $this->p_user['User']['created'];

		//$time = date($created);
		$time = strtotime($created);
		//debug($time);

		$this->loadModel('Vote');
		$options = array('conditions'=>array('user_id'=> $this->p_user['User']['id']));
		$votes = $this->Vote->find('count', $options);
		$this->set('votes', $votes);

		$options = array('conditions'=>array('user_id'=> $this->p_user['User']['id'], 'used !=' => 'NULL'));
		$used = $this->Vote->find('count', $options);
		$this->set('used', $used);


		$this->set('user', $this->p_user);
		$this->set('supporting',$time);
		//debug($user);
	}

	public function dashboard()
	{

		$this->p_user['User']['id'];

		//debug($this->p_user);

		$this->loadModel('Vote');
		$options = array('conditions'=>array(''));
		$votes = $this->Vote->find('count', $options);
		$this->set('votes', $votes);

		$this->layout = 'dashboard';
		$this->set('user', $this->p_user);
		//debug($user);
	}

	/*
		Credit Card stuff
	*/

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
}
//september 7th