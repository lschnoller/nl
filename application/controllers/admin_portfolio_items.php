<?php
class Admin_portfolio_items extends Controller 
{
	function __construct()
	{
		parent::Controller();
		$this->load->library('session');
		$this->load->helper('url');
		$this->is_logged_in();
		$this->load->helper('msg');
		$this->load->helper('form');
		$this->load->model('pcfunc');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
	}	
	function is_logged_in(){
		$is_logged_in = $this->session->userdata('is_logged_in');
		if(!isset($is_logged_in) || $is_logged_in != true)
		{
			redirect(base_url());
			die();		
		}		
	}	

	function index(){
		$data['current'] = 'portfolio_items';
		$data['list'] = $this->pcfunc->getPortfolioItemsAdmin();
		$viewData['data'] = $data;
		$viewData['main_content'] = 'admin/portfolio-items-view';
		$this->load->view('includes/template', $viewData);
	}
	function edit($id=0){
		$data['current'] = 'portfolio_items';
		$this->form_validation->set_rules('name_en', 'Item Name EN', 'required');		
		$this->form_validation->set_rules('description_en', 'Description EN', 'required');
		$this->form_validation->set_rules('name_es', 'Item Name ES', 'required');		
		$this->form_validation->set_rules('description_es', 'Description ES', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$data['edit'] = TRUE;
			$data['values'] = $this->pcfunc->getPortfolioItem($id);
		}
		else
		{
			$values['name_en'] = $_POST['name_en'];
			$values['description_en'] = $_POST['description_en'];
			$values['name_es'] = $_POST['name_es'];
			$values['description_es'] = $_POST['description_es'];
			$data['message'] = $this->pcfunc->mainIU('Portfolio_Items',$values,$id);
			$data['list'] = $this->pcfunc->getPortfolioItemsAdmin();
		}
		$viewData['data'] = $data;
		$viewData['main_content'] = 'admin/portfolio-items-view';
		$this->load->view('includes/template', $viewData);
	}
	
	function del($id=0){
		return $this->pcfunc->mainDel('Portfolio_Items',$id);
	}
	function status($id=0,$status=0) {
		return $this->pcfunc->changeStatus('Portfolio_Items',$id);
	}
	
}
