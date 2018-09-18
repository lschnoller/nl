<?php

class Email extends Controller {

	function Email()
	{
		parent::Controller();	
		$this->load->helper('url');	
		$this->load->helper('form');
		
	}
	
	function index()
	{		
			$to = 'aybergon@yahoo.com, notifications@hoaworldwide.com';
			$message="test";
			
			$headers = "MIME-Version: 1.0" . "\r\n";
		   	$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";		
		   	$headers .= 'From: lucas.s@hoaworldwide.com' . "\r\n";
		   	$headers .= 'Cc: info@noralatorre.com' . "";
			if(mail($to, 'test emir', $message, $headers))
			{
				echo 'send';
			}
			else 
			{
				echo 'error';
			}
	}
}

?>
