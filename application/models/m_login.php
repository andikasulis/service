<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_login extends CI_Model {
	
	function validate(){
		$this->db->where('user_name', $this->input->post('username'));
		$this->db->where('password', $this->input->post('password'));
		$query = $this->db->get('user');
		 
		if($query->num_rows() == 1){
		   return $query->result();
		}
	}
}