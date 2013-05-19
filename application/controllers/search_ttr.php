<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search_ttr extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->load->helper('url'); // Load Helper URL CI
		$this->load->model('m_service'); // Load Model m_service
    }

	function index()
	{
		$this->search_ttr();
	}

	function search_ttr()
    {
    	$this->load->view('layout/header');
		$this->load->view('search_ttr/v_search_ttr'); // Load View search_trr
		$this->load->view('layout/footer');
    }

    function result()
    {
    	$ttr = $this->input->post('kode_ttr');
    	$search['result'] = $this->m_service->search_ttr($ttr);
    	//print_r($search['result']);  
        //print_r($ttr);
        //if($search['result']!='')
        //{
            $this->load->view('layout/header');
            $this->load->view('search_ttr/v_search_ttr_result',$search); // Load View search_trr_result
            $this->load->view('layout/footer');    
        //} else {
          // redirect(search_ttr);
        //}
    	
    }

}

?>
