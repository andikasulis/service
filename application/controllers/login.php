<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->load->helper('url'); // Load Helper URL CI
    }

    function index() {
        $this->load->view('login/v_singin');
    }

    function validate() {
       $this->load->model('m_login');
	   $query = $this->m_login->validate();
	   
	   if($query){ // jika data user benar
	   		foreach ($query as $data1):
	   			$id_user = $data1->id_user;
	   			$level = $data1->level;
	   		endforeach; 
	   		$data = array(
	    		'username' => $this->input->post('username'),
	    		'is_logged_in' => true,
	    		'id_user' => $id_user,
	    		'level' => $level
	   		);
	   		$this->session->set_userdata($data);
	   		redirect('service2');
	   		//print_r($data);
	   }else{ 
	   		// username atau password salah
	   		redirect('search_ttr');
	   }
    }

    function logout()
 	{
  		$this->session->sess_destroy();
  		$this->index();
 	}

}    