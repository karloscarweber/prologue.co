<?php
// App/controllers/components/mandrill.php
class MandrillComponent extends Component
{
	var $components = array('Session', 'RestRequest');
	
	var $settings = array(
		'host'		=> 'smtp.mandrillapp.com',
		'port'		=> '587',
		'username'	=> 'me@karloscarweber.com',
		'api_key'	=> 'iC4ThplXlESpJVJODjIS9A'
	);
	
	/*
		A Default $request_array for convenience purposes.
	*/
	var $request_array = array(
	    'key' => 'key',
	    'message'=> array(
	        'html'=> '<p>Example HTML content</p>',
	        'text'=> 'Example text content',
	        'subject'=> 'example subject',
	        'from_email'=> 'message.from_email@example.com',
	        'from_name'=> 'Example Name',
	        'to' => array( 
/*
	        	'0' => array(
	                'email'=> 'recipient.email@example.com',
	                'name'=> 'Resident'
				),
	        	'1' => array(
	                'email'=> 'recipient.email@example.com',
	                'name'=> 'Resident'
				)
*/
            ),
	        'headers'=> array(
	            'Reply-To'=> 'message.reply@example.com'
	        ),
	        'important'=> false,
	        'track_opens'=> null,
	        'track_clicks'=> null,
	        'auto_text'=> null,
	        'auto_html'=> null,
	        'inline_css'=> null,
	        'url_strip_qs'=> null,
	        'preserve_recipients'=> null,
	        'view_content_link'=> null,
	        'bcc_address'=> 'message.bcc_address@example.com',
	        'tracking_domain'=> null,
	        'signing_domain'=> null,
	        'return_path_domain'=> null,
	        'tags'=> array(
	        	'notification-email'
	        ),
	        'metadata'=> array(
	            'website'=> 'www.example.com'
	        )
	    ),
	    'async'=> false,
	    'ip_pool'=> 'Main Pool'
	);


	/*
		Sample 
	*/
	function send_email($recipientemail = null, $recipientname = '', $sender = null, $subject = null, $html = null)
	{
		
		// all the Mandrill sendness
		$request_array = $this->request_array;
		$request_array['key'] = 'iC4ThplXlESpJVJODjIS9A';
		$request_array['message']['from_email'] = $sender;
		
		$recipient = array('email' => $recipientemail, 'name' => $recipientname);
		
		$request_array['message']['to'][] = $recipient;
		//debug($request_array['message']['to'][0]['email']);
		//$request_array['message']['headers']['Reply-To'] = $html['message']['headers']['Reply-To'];
		$request_array['message']['html'] = $html;
		$request_array['message']['subject'] = $subject;

	    $request = new $this->RestRequest('https://mandrillapp.com/api/1.0/messages/send.json', 'POST', $request_array);
	    $request->execute();
	    //$responseObject = json_decode($request->getResponseBody());
		//return $responseObject;
		
		return $request->getResponseBody();
	}
}
?>