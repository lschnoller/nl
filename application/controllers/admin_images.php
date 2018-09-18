<?php
class Admin_images extends Controller 
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

	function index($protfolioId = 0)
	{
		if(isset($_POST['main_image']) && $_POST['main_image'] > 0)
		{
			$mainImage['default_img_id '] = $_POST['main_image'];
			$this->pcfunc->mainIU('Portfolio_Items',$mainImage,$protfolioId);
		}
		
		$data['current'] = 'portfolio_items';
		$data['id'] = $protfolioId;
		$data['mainImage'] = $this->pcfunc->getMainImage($protfolioId);
		$data['list'] = $this->pcfunc->getMainList('Images','title_es,status,image_url','title_es','ASC'," WHERE portfolio_items_id = $protfolioId ");
		$viewData['data'] = $data;
		$viewData['main_content'] = 'admin/images-view';
		$this->load->view('includes/template', $viewData);
	}
	function edit($protfolioId,$id=0)
	{
		$data['mainImage'] = $this->pcfunc->getMainImage($protfolioId);
		$data['id'] = $protfolioId;
		$data['current'] = 'portfolio_items';
		$this->form_validation->set_rules('title_es', 'Title ES', 'required');		
		$this->form_validation->set_rules('description_es', 'Description ES', 'required');
		$this->form_validation->set_rules('title_en', 'Title EN', 'required');		
		$this->form_validation->set_rules('description_en', 'Description EN', 'required');
		
		$config['upload_path'] = './images/';
		$config['allowed_types'] = 'jpg|png|gif';
		$config['max_size']	= '5000';
		$config['max_width']  = '1000';
		$config['max_height']  = '1000';
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		$uploadErrors = '';
		if($this->upload->do_upload('image_url'))
		{
			$file = $this->upload->data();
			$values['image_url'] = $file['file_name'];
		}
		elseif($id == 0)
		{
			$this->form_validation->set_rules('asas', 'Image', 'trim|required');
			$uploadErrors = $this->upload->display_errors();
		}
		$data['uploadErrors'] = $uploadErrors;
		if ($this->form_validation->run() == FALSE)
		{
			$data['edit'] = TRUE;
			$data['values'] = $this->pcfunc->getImage($id);
		}
		else
		{
			$values['portfolio_items_id'] = $protfolioId;
			$values['title_en'] = $_POST['title_en'];
			$values['description_en'] = $_POST['description_en'];
			$values['title_es'] = $_POST['title_es'];
			$values['description_es'] = $_POST['description_es'];
			$data['message'] = $this->pcfunc->mainIU('Images',$values,$id);
			if($id == 0)
				$this->pcfunc->isDefaultImage($protfolioId,$this->pcfunc->last_id);
			$data['list'] = $this->pcfunc->getMainList('Images','title_es,status','title_es','ASC'," WHERE portfolio_items_id = $protfolioId ");
		}
		$viewData['data'] = $data;
		$viewData['main_content'] = 'admin/images-view';
		$this->load->view('includes/template', $viewData);
	}
	
	function del($id=0){
		return $this->pcfunc->mainDel('Images',$id);
	}
	function status($id=0,$status=0) {
		return $this->pcfunc->changeStatus('Images',$id);
	}
	
}
