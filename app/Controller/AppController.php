<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

	/*
		Components
	*/
	var $components = array('Stripe.Stripe', 'Auth', 'Session');
	/*
		Plugins
	*/
	



	/*
		Totally Lifted From Fifty Studio.
		yes, one line of code.
	*/
	public function goBack()
	{
		$this->redirect($this->referer());
	}

	var $p_user = array();
	/**/
	
	public function beforeFilter()
	{
		// $this->Auth->allow();
		//	Fix the user data problem
		
		$user = $this->Auth->user();
		//debug($this->p_user);
		if(!empty($user)){
			if(isset($user['Admin'])){
				$this->loadModel('User');
				$options = array('conditions'=>array('username'=>$user['Admin']['username']));
				$this->p_user = $this->User->find('first', $options);
			} else {
				$this->loadModel('User');
				$options = array('conditions'=>array('username'=>$user['User']['username']));
				$this->p_user = $this->User->find('first', $options);
			}

		}
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

	public function admin_check()
	{
		$user = $this->Auth->user();
		if($user['User']['username'] != 'karl'){
			$this->Session->setFlash();
			$this->redirect('/404');
		}
	}


}