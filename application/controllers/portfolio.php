<?php
class Portfolio extends Controller 
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
		$data['current'] = 'portfolio';
		$data['sam'] = true;
		$data['slider'] = true;
		$data['title'] = 'Nora Latorre - Portfolio';		
		$data['list'] = $this->pcfunc->getPortfolioItems(TRUE);
		$this->load->view('header',$data);
		$this->load->view('portfolio-view',$data);
		$this->load->view('footer');
	}
	function get_single($id)
	{
		$data['id'] = $id;
		$data['list'] = $this->pcfunc->getPortfolioImages($id);
		$this->load->view('single-view',$data);
	}
}
?>