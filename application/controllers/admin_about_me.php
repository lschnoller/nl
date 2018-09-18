<?php
class Admin_about_me extends Controller 
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

	function index($orderBy = 'title_es',$dir='asc'){
		$data['current'] = 'about_me';
		$data['list'] = $this->pcfunc->getMainList('About_Me','title_es,status',$orderBy,$dir);
		$viewData['data'] = $data;
		$viewData['main_content'] = 'admin/about_me-view';
		$this->load->view('includes/template', $viewData);
	}
	function activate()
	{
		$data['current'] = 'about_me';
		$this->form_validation->set_rules('status', 'Status', 'required');
		if ($this->form_validation->run() != FALSE)
		{
			$id = $this->pcfunc->getPostValue('status');
			$this->pcfunc->changeAboutMeStatus($id);
		}
		$data['list'] = $this->pcfunc->getMainList('About_Me','title_es,status','title_es','asc');
		$viewData['data'] = $data;
		$viewData['main_content'] = 'admin/about_me-view';
		$this->load->view('includes/template', $viewData);
	}
	function edit($id=0){
		$data['current'] = 'about_me';
		$this->form_validation->set_rules('title_en', 'Title EN', 'required');		
		$this->form_validation->set_rules('body_text_en', 'Text EN', 'required');
		$this->form_validation->set_rules('title_es', 'Title ES', 'required');		
		$this->form_validation->set_rules('body_text_es', 'Text ES', 'required');
		if ($this->form_validation->run() == FALSE){
			$data['edit'] = TRUE;
			$data['values'] = $this->pcfunc->getAboutMe($id);
		}else{
			$data['current'] = 'about_me';
			$values['title_en'] = $_POST['title_en'];
			$values['body_text_en'] = $_POST['body_text_en'];
			$values['title_es'] = $_POST['title_es'];
			$values['body_text_es'] = $_POST['body_text_es'];
			
			$data['message'] = $this->pcfunc->mainIU('About_Me',$values,$id);
			if($id == 0)
				$this->pcfunc->isDefaultAboutMe();
			$data['list'] = $this->pcfunc->getMainList('About_Me','title_es,status','title_es');
		}
		$viewData['data'] = $data;
		$viewData['main_content'] = 'admin/about_me-view';
		$this->load->view('includes/template', $viewData);
	}
	
	function del($id=0){
		return $this->pcfunc->mainDel('About_Me',$id);
	}
	
	
}
