<?php
App::uses('AppController', 'Controller');

class VotesController extends AppController {

	/**
	 * Controller name
	 * @var string
	 */
	public $name = 'Votes';

	var $components = array('Auth');

	public function index(){

	}

	// an ajax thingy.
	public function cast_vote($user_id = null){
		if($user_id){

			$id = $this->p_user['User']['id'];
			if($id !== $user_id){
				$this->goBack();
			}
		}
	}

	// an ajax thingy.
	public function cast_vote($user_id = null){
		if($user_id){

			$id = $this->p_user['User']['id'];
			if($id !== $user_id){
				$this->goBack();
			}
		}
	}


}