<?php
App::uses('AppController', 'Controller');

class AdminsController extends AppController {

	public $name = 'Admins';

	public $components = array('Auth');

	public function beforeFilter()
	{
		$this->Auth->allow('login');


		// Pass settings in
		$this->Auth->authenticate = array(
		    'Basic' => array('userModel' => 'Admin'),
		    'Form' => array('userModel' => 'Admin')
		);
	}

	public function index()
	{
		$user = $this->Auth->user();
		$admins = $this->Admin->find('all');
		$this->set('admins', $admins);
		$this->scrollStats();
	}

	public function scrollStats()
	{
		$this->loadModel('User');
		$this->loadModel('Vote');
		$this->loadModel('Feature');

		/*Users*/
		$one_month = date('Y-m-d', strtotime('-7 days'));
		$this->set('total_users', $this->User->find('count'));
		$this->set('active_users', $this->User->find('count', array('conditions' => array('modified >' => $one_month))));

		/*Votes*/
		$one_month = date('Y-m-d', strtotime('-30 days'));
		$this->set('total_votes', $this->Vote->find('count'));
		$this->set('used_votes', $this->Vote->find('count', array('conditions' => array('used >' => 1))));		

	}

	public function users()
	{
		$admins = $this->Admin->find('all');
		$this->set('admins', $admins);
		$this->scrollStats();
	}

	public function features()
	{	
		$this->loadModel('Feature');
		$this->loadModel('Vote');
		$features = $this->Feature->find('all');
		$new = array();
		foreach($features as $feature){
			$feature['Feature']['votestotal'] = $this->Vote->find('count', array('conditions' => array('feature_id' => $feature['Feature']['id'])));
			$new[] = $feature;
		}
		$this->set('features', $new);
		$this->scrollStats();
	}



	public function login()
	{

		if($this->request->data) {

			$this->request->data['Admin']['password'] = $this->Auth->password($this->request->data['Admin']['password']);
			if($this->Auth->login($this->request->data)){
				$this->redirect(array('controller' => 'admins', 'action' => 'index'));
			} else {
				$this->Session->setFlash('Sorry but your login attempt failed.');
				$this->goBack();
			}
		}
	}

	public function logout()
	{
		$this->Auth->logout();
		$this->redirect(array('controller' => 'pages', 'action' => 'index'));
	}

}