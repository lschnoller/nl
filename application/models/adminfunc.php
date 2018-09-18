<?php

class Adminfunc extends Model {
	
	function validate()
	{
		//$this->db->where('username', $this->input->post('username'));
		//$this->db->where('password', md5($this->input->post('password')));
		//$query = $this->db->get('membership');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		//if($query->num_rows == 1)
		if($username == 'plantas' && $password == 'plantas')
		{
			$data = array(
				'username' => $this->input->post('username'),
				'is_logged_in' => true
			);
			$this->session->set_userdata($data);
			return true;
		}else{
			return false;
		}
		
	}
	
}