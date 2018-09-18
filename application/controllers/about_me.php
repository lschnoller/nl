<?php
class About_me extends Controller 
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
		$data['current'] = 'about_me';
		$data['title'] = 'Nora Latorre - ' . $this->lang->line('about-title');
		$data['categoryName'] = 'Curriculum';
		$data['list'] = $this->pcfunc->getAboutMeText();
		$this->load->view('header', $data);
		$this->load->view('about_me-view');
		$this->load->view('footer');
	}
}
?>