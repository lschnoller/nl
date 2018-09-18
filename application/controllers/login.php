<?php
class Login extends Controller {
	
	function Login()
	{
		parent::Controller();	
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
	}
	
	function index()
	{
		$this->load->view('login_form');		
	}
	
	function validate_credentials()
	{		
		$this->load->model('adminfunc');
		$query = $this->adminfunc->validate();
		if($query)
		{		
			redirect(base_url().'admin_menu');
		}
		else
		{
			$data['wrongpass'] = TRUE;
			$this->index();
		}
	}	
	
	function logout()
	{
		$this->session->sess_destroy();
		$this->index();
	}

}