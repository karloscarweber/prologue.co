<?php
App::uses('AppController', 'Controller');

class SubscribersController extends AppController {

	public $name = 'Subscribers';

	var $components = array('Auth', 'Stripe.Stripe');
	var $p_user = array();

	public function beforeFilter()
	{
		$this->layout = 'dashboard';
		$this->Auth->allow('new_charge');

		$user = $this->Auth->user();
		//debug($user);
		if(!empty($user)){
			$this->loadModel('User');
			$options = array('conditions'=>array('username'=>$user['User']['username']));
			$this->p_user = $this->User->find('first', $options);
		}

		$this->set('user', $this->p_user);
	}

	public function index() {

		// list all these bros
	}


	public function new_charge(){

		$this->layout = 'ajax';

		// stuff we need
		// email
		// the app they are charging from
		// a stripe token
		if($this->data){

			$stripeToken  = $this->data['stripeToken'];
			$stripeEmail  = $this->data['stripeEmail'];
			$stripeAmount = $this->data['stripeAmount'];
			$prologueApp = $this->data['prologueApp'];
			$redirect = $this->data['redirect'];

			$data = array(
				'amount' => $stripeAmount,
				'stripeToken' => $stripeToken,
				'description' => $stripeEmail.', '.$prologueApp
			);

			// debug($data);
			// die;

			$result = $this->Stripe->charge($data);

			if(is_array($result)){
				$success = true;
				$this->redirect($redirect);
			} else {
				$success = false;
				debug($result);
				//$this->redirect('http://superpoweredpixels.com/charge_failure');
				$this->set('url', $redirect);
			}

			// debug($this->data);
			// die;
		} else {
			echo 'sorry but you shouldn\'t be here right now';
			echo "<br><br>";
			echo 'Go back to <a href="/">Prologue</a>';
			die;
		}
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

}