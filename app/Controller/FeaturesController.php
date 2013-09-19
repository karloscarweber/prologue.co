<?php
App::uses('AppController', 'Controller');

class FeaturesController extends AppController {

	public $name = 'Features';

	var $components = array('Auth');
	var $p_user = array();

	public function beforeFilter()
	{
		$this->layout = 'dashboard';

		$user = $this->Auth->user();
		if(!empty($user)){
			$this->loadModel('User');
			$options = array('conditions'=>array('username'=>$user['User']['username']));
			$this->p_user = $this->User->find('first', $options);
			$this->set('user', $this->p_user);
		} else {
			$this->set('user', null);
		}
	}

	public function index()
	{
		$features = $this->Feature->find('all');
		$this->set('features', $features);
	}
}