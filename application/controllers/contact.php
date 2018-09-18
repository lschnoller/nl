<?php

class Contact extends Controller {

	function Contact()
	{
		parent::Controller();	
		$this->load->helper('url');	
		$this->load->helper('msg');
		$this->load->helper('form');
		$this->load->model('pcfunc');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->lang->load('common');
	}
	
	function index()
	{
		//$lang = $this->flang->getLang();
		$data['current'] = 'contact';
		
		$data['title'] = 'Nora Latorre - ' . $this->lang->line('contact-title');
		$data['categoryName'] = 'Contacto';
		$data['send'] = FALSE;
		/// FORM VALIDATION
		$this->form_validation->set_rules('yourname', 'Nombre', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('subject', 'Tema', 'required');
		$this->form_validation->set_rules('message', 'Mensaje', 'required');
		
		if ($this->form_validation->run() != FALSE)
		{
			$vals['name'] = $this->pcfunc->getPostValue('yourname');
			$vals['email'] = $this->pcfunc->getPostValue('email');
			$vals['subject'] = $this->pcfunc->getPostValue('subject');
			$vals['message'] = $_POST['message'];
			
			if($this->pcfunc->sendContactFormEntry($vals))
				$data['send'] = TRUE;
		}
		$this->load->view('header',$data);
		$this->load->view('contact-view',$data);
		$this->load->view('footer',$data);
	}
}

?>
