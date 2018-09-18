<?php
class Admin_references extends Controller 
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

	function index($orderBy = 'title',$dir='asc'){
		$data['current'] = 'references';
		$data['list'] = $this->pcfunc->getMainList('Our_References','title,status',$orderBy,$dir);
		$viewData['data'] = $data;
		$viewData['main_content'] = 'admin/references-view';
		$this->load->view('includes/template', $viewData);
	}
	
	function edit($id=0){
		$data['current'] = 'references';
		$this->form_validation->set_rules('title', 'Title', 'required');		
		$this->form_validation->set_rules('desci_en', 'Text EN', '');
		$this->form_validation->set_rules('desci_es', 'Text ES', '');
		$this->form_validation->set_rules('ref_url', 'URL', 'prep_url');
		if ($this->form_validation->run() == FALSE)
		{
			$data['edit'] = TRUE;
			$data['values'] = $this->pcfunc->getReference($id);
		}
		else
		{
			$values['title'] = $_POST['title'];
			$values['desci_en'] = $_POST['desci_en'];
			$values['desci_es'] = $_POST['desci_es'];
			$values['ref_url'] = $_POST['ref_url'];
			
			$data['message'] = $this->pcfunc->mainIU('Our_References',$values,$id);
			
			$data['list'] = $this->pcfunc->getMainList('Our_References','title,status','title');
		}
		$viewData['data'] = $data;
		$viewData['main_content'] = 'admin/references-view';
		$this->load->view('includes/template', $viewData);
	}
	
	function del($id=0){
		return $this->pcfunc->mainDel('Our_References',$id);
	}
	function status($id=0,$status=0) {
		return $this->pcfunc->changeStatus('Our_References',$id,$status);
	}
	
}
