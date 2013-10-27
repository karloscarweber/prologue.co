<?php
App::uses('AppController', 'Controller');

class ContactsController extends AppController {

	/**
	 * Controller name
	 * @var string
	 */
	public $name = 'Contacts';

	var $components = array('Auth', 'Mandrill');

	public function beforeFilter()
	{
		$this->Auth->allow();
	}


	public function index()
	{
		
	}

	// an ajax thingy.
	public function request()
	{
		$this->layout = 'ajax';

		if($this->data){
			$data = $this->data;

			$message = $data['Contact']['name'];
			$message .= "<br>";
			$message = $data['Contact']['email'];
			$message .= "<br><br>";
			$message = $data['Contact']['message'];

			$subject = "Prologue.co Lead";
			$result = $this->Mandrill->send_email('me@karloscarweber.com', 'Karl Weber', 'contact@prologue.co', $subject, $message);

			echo $result;
			die;
		}
		die;
	}


	public function rest()
	{		
		// $this->Mandrill->send_email($recipient = null, $sender = null, $subject = null, $html = null)
		$message = "<p>This is the response message hardcore</p>";
		$subject = "A new lead is ready. ";
		$result = $this->Mandrill->send_email('me@karloscarweber.com', 'Karl Weber', 'contact@prologue.co', $subject, $message);
		//debug($result);
		die;
	}

}