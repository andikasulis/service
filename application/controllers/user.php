<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->load->helper('url'); // Load Helper URL CI
		$this->load->model('m_user'); // Load Model m_jqgrid
		$this->is_logged_in();
    }

    function is_logged_in() {
		$is_logged_in = $this->session->userdata('is_logged_in');
		if(!isset($is_logged_in) || $is_logged_in != true)
		{
		   redirect('login');
		}  
	} 
	
	function index() {
		$this->grid(); //Default di arahkan ke function grid
	}
	
	function grid() 
	{
		$this->load->view('layout/header');
		$this->load->view('user/v_input_user');
		$this->load->view('user/v_user'); // Load View jqgrid
		$this->load->view('layout/footer');
	}
	
	function json() {
		$page  = isset($_POST['page'])?$_POST['page']:1;
		$limit = isset($_POST['rows'])?$_POST['rows']:10;
		$sidx  = isset($_POST['sidx'])?$_POST['sidx']:'user_name';
		$sord  = isset($_POST['sord'])?$_POST['sord']:'desc' ;
		
		if(!$sidx) $sidx=1;
		
	
		# Untuk Single Searchingnya #		
		$where = "user_name"; //if there is no search request sent by jqgrid, $where should be empty
		$searchField = isset($_GET['searchField']) ? $_GET['searchField'] : false;
		$searchString = isset($_GET['searchString']) ? $_GET['searchString'] : false;
		if ($_POST['_search'] == 'true') {
			$where = array($searchField => $searchString);
		}
		# End #
		
	        		
		$count = $this->m_user->count_user($where);
		
		$count > 0 ? $total_pages = ceil($count/$limit) : $total_pages = 0;
		if ($page > $total_pages) $page=$total_pages;
		$start = $limit*$page - $limit;
		if($start <0) $start = 0;
		
		$data1 = $this->m_user->get_user($where, $sidx, $sord, $limit, $start)->result();
	
		$responce = new StdClass;
		$responce->page = $page;
		$responce->total = $total_pages;
		$responce->records = $count;
		$i=0;
		foreach($data1 as $line){
			$action = "<a href=\"user/ubah/$line->id_user\">Ubah</a> || <a href=\"user/delete/$line->id_user\"  onclick=\"return confirm('Apakah sudah benar benar yakin untuk menghapus data ???')\">Hapus</a>";
			if($line->level == "1")
			{
				$level = 'ADMIN';
			}else {
				$level = 'USER';
			}
			$responce->rows[$i]['id']   = $line->id_user;
			$responce->rows[$i]['cell'] = array($line->id_user,$line->user_name,$line->nama_user,
												$line->alamat_user,$line->telepon_user,$level,$action);
			$i++;
		}
		echo json_encode($responce);
	}
	
	function insert()
    {
        if($this->input->post('level')=='ADMIN')
       	{
        	$level = '1';
        }else {
        	$level = '2';
        }

        $data = array(
        	'id_user' => $this->input->post('id_user'),
            'user_name' => $this->input->post('user_name'),
            'nama_user' => $this->input->post('namauser'),
            'password' => $this->input->post('pass2'),
            'level' => $level,
            'alamat_user' => $this->input->post('alamat'),
            'telepon_user' => $this->input->post('telepon')
        );

        $this->m_user->insert_user($data);
        redirect('user');
        //print_r($data);

    }

     function ubah()
    {
        $id = $this->uri->segment(3);
        $data['user'] = $this->m_user->get_by_id($id);
        $this->load->view('layout/header');
        $this->load->view('user/v_update_user', $data);
        //print_r($data['user']);
        $this->load->view('layout/footer');

    }

    function update()
    {
     	if($this->input->post('level')=='ADMIN')
       	{
        	$level = '1';
        }else {
        	$level = '2';
        }

        $data = array(
        	'id_user' => $this->input->post('id_user'),
            'user_name' => $this->input->post('user_name'),
            'nama_user' => $this->input->post('namauser'),
            'level' => $level,
            'alamat_user' => $this->input->post('alamat'),
            'telepon_user' => $this->input->post('telepon')
        );

        $this->m_user->update_user($data);
        redirect('user');
        //print_r($data);
    }

    function delete()
    {
 
        $id = $this->uri->segment(3);
        $this->m_user->delete_user($id);
        redirect('user');

    }

    function cek_username()
    {
    	$username = $this->input->post('username');
		$hasil = $this->m_user->cek_username($username);

		if(count($hasil)==1){
            echo '0';
        }else{
            echo '1';
        }
        //print_r(count($hasil));
			
    }

    
}