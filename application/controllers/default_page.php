<?php
class Default_page extends Controller 
{
	function __construct()
	{
		parent::Controller();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->helper('msg');
		//$this->load->helper('form');
		$this->load->model('pcfunc');
		//$this->load->helper(array('form', 'url'));
		//$this->load->library('form_validation');
		$this->lang->load('common');
	}
	function index()
	{
		//$data['sam'] = true;
		//$data['slider'] = true;
		$data['title'] = 'Nora Latorre - Paisajismo, Palma de Mallorca, Espa&ntilde;a - Landscaping Spain';		
		//$data['list'] = $this->pcfunc->getPortfolioItems(TRUE);
		//$this->load->view('header',$data);
		$this->load->view('default-view',$data);
		//$this->load->view('footer');
	}
	function get_single($id)
	{
		$data['id'] = $id;
		$data['list'] = $this->pcfunc->getPortfolioImages($id);
		$this->load->view('single-view',$data);
	}
}
?>