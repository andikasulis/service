<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Service extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->load->helper(array('url')); // Load Helper URL CI

        $this->load->model('m_service2'); // Load Model m_jqgrid

		$this->is_logged_in();
		
    }

    function is_logged_in() {
		$is_logged_in = $this->session->userdata('is_logged_in');
		if(!isset($is_logged_in) || $is_logged_in != true)
		{
		   redirect('login');
		}  
	} 
	
    function json_service() {
        $page  = isset($_POST['page'])?$_POST['page']:1;
        $limit = isset($_POST['rows'])?$_POST['rows']:10;
        $sidx  = isset($_POST['sidx'])?$_POST['sidx']:'ttr';
        $sord  = isset($_POST['sord'])?$_POST['sord']:'desc' ;
        
        if(!$sidx) $sidx=1;
        
    
        # Untuk Single Searchingnya #       
        $where = ""; //if there is no search request sent by jqgrid, $where should be empty
        $searchField = isset($_POST['searchField']) ? $_POST['searchField'] : false;
        $searchString = isset($_POST['searchString']) ? $_POST['searchString'] : false;
        if ($_POST['_search'] == 'true') {
            $where = "AND $searchField like '%$searchString%'";
        }
        # End #
        
        $nama_user = $this->session->userdata('nama_user');            
        $count = $this->m_service2->count_service($where,$nama_user);
        
        $count > 0 ? $total_pages = ceil($count/$limit) : $total_pages = 0;
        if ($page > $total_pages) $page=$total_pages;
        $start = $limit*$page - $limit;
        if($start <0) $start = 0;
        
        $data1 = $this->m_service2->get_service($where, $sidx, $sord, $limit, $start,$nama_user)->result();
    
        $responce = new StdClass;
        $responce->page = $page;
        $responce->total = $total_pages;
        $responce->records = $count;
        $i=0;
        foreach($data1 as $line){
            $responce->rows[$i]['id']   = $line->ttr;
            $responce->rows[$i]['cell'] = array($line->ttr,$line->nama_user,$line->nama_konsumen,
                                                $line->merek,$line->model,$line->serial_number,$line->tanggal_masuk,
                                                $line->tanggal_estimasi,$line->tanggal_setuju,$line->tanggal_selesai,
                                                $line->tanggal_ambil,$line->status_barang,$line->status_perbaikan,
                                                $line->teknisi,$line->kelengkapan);
            $i++;
        }
        echo json_encode($responce);
    }

}