<?php
class References extends Controller 
{
	function __construct()
	{
		parent::Controller();
		$this->load->library('session');
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
		$data['current'] = 'references';
		$data['title'] = 'Nora Latorre - ' . $this->lang->line('references-title');
				
		$data['list'] = $this->pcfunc->getReferences();
		$this->load->view('header',$data);
		$this->load->view('references-view',$data);
		$this->load->view('footer');
	}
}
?>