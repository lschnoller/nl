<?php
$head['current'] = $data['current'];

$this->load->view('includes/header',$head); 

$this->load->view($main_content,$data); 

$this->load->view('includes/footer'); 

?>