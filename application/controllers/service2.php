<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Service2 extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->load->helper(array('url')); // Load Helper URL CI
		$this->load->model('m_service'); // Load Model m_jqgrid
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
		//$today = gmdate("Ymd",time()+60*60*7);
    	//$hasil = $this->m_service->get_no_transaksi($today)->result_array();
    	//$lastNoTransaksi = $hasil['0']['last'];
    	//print_r($hasil['0']['last']);
    	//echo $today;
    	// baca nomor urut transaksi dari id transaksi terakhir
		//$lastNoUrut = substr($lastNoTransaksi, 8, 4); 

		// nomor urut ditambah 1
		//$nextNoUrut = $lastNoUrut + 1;

		// membuat format nomor transaksi berikutnya
		//$nextNoTransaksi = $today.sprintf('%04s', $nextNoUrut);
		//$data['no_transaksi'] = $nextNoTransaksi;
		$this->load->view('layout/header');
		$level = $this->session->userdata('level');
        
        if(!isset($level) || $level == 1)
        {            
            $this->load->view('service/v_input_service');
        }
		
        $this->load->view('service/v_service2'); // Load View jqgrid
		$this->load->view('layout/footer');
	}
	
	function json() {
		$page  = isset($_POST['page'])?$_POST['page']:1;
		$limit = isset($_POST['rows'])?$_POST['rows']:10;
		$sidx  = isset($_POST['sidx'])?$_POST['sidx']:'ttr';
		$sord  = isset($_POST['sord'])?$_POST['sord']:'desc' ;
		
		if(!$sidx) $sidx=1;
		
	
		# Untuk Single Searchingnya #		
		$where = ""; //if there is no search request sent by jqgrid, $where should be empty
		$searchField = isset($_GET['searchField']) ? $_GET['searchField'] : false;
		$searchString = isset($_GET['searchString']) ? $_GET['searchString'] : false;
		if ($_POST['_search'] == 'true') {
			$where = array($searchField => $searchString);
		}
		# End #
		
	        		
		$count = $this->m_service->count_service($where);
		
		$count > 0 ? $total_pages = ceil($count/$limit) : $total_pages = 0;
		if ($page > $total_pages) $page=$total_pages;
		$start = $limit*$page - $limit;
		if($start <0) $start = 0;
		
		$data1 = $this->m_service->get_service($where, $sidx, $sord, $limit, $start)->result();
	
		$responce = new StdClass;
		$responce->page = $page;
		$responce->total = $total_pages;
		$responce->records = $count;
		$i=0;
		foreach($data1 as $line){
			$action = "<a target=\"_blank\" href=\"service2/blanko/$line->ttr\">Cetak</a> || <a href=\"service2/ubah/$line->ttr\">Ubah</a> || <a href=\"service2/delete/$line->ttr\"  onclick=\"return confirm('Apakah sudah benar benar yakin untuk menghapus data ???')\">Hapus</a>";
			$responce->rows[$i]['id']   = $line->ttr;
			$responce->rows[$i]['cell'] = array($line->ttr,$line->nama_user,$line->nama_konsumen,
												$line->merek,$line->model,$line->serial_number,$line->tanggal_masuk,
												$line->status_barang,$line->status_perbaikan,$line->tgl_estimasi_selesai,
												$line->teknisi,$line->kelengkapan,$action);
			$i++;
		}
		echo json_encode($responce);
	}
	
	function insert()
    {
        $data = array(
        	'ttr' => $this->input->post('ttr'),
            'id_user' => $this->input->post('id_user'),
            'nama_konsumen' => $this->input->post('nama_konsumen'),
            'merek' => $this->input->post('merek'),
            'model' => $this->input->post('model'),
            'serial_number' => $this->input->post('serial_number'),
            'tanggal_masuk' => $this->input->post('tanggal_masuk'),
            'status_barang' => $this->input->post('kode_garansi'),
            'status_perbaikan' => $this->input->post('status_perbaikan'),
            'tgl_estimasi_selesai' => $this->input->post('tgl_estimasi_selesai'),
            'teknisi' => $this->input->post('teknisi'),
            'kelengkapan' => $this->input->post('kelengkapan')
        );

        $this->m_service->insert_service($data);
        redirect('service2');
        //print_r($data);

    }

     function ubah()
    {
        $id = $this->uri->segment(3);
        $data['service'] = $this->m_service->get_by_id($id);
        $data['service2'] = $this->m_service->get_all();
        $this->load->view('layout/header');
        $this->load->view('service/v_update_service', $data);
        $this->load->view('layout/footer');

    }

    function update()
    {
        
        $data = array(
        	'ttr' => $this->input->post('ttr'),
            'id_user' => $this->input->post('id_user'),
            'nama_konsumen' => $this->input->post('nama_konsumen'),
            'merek' => $this->input->post('merek'),
            'model' => $this->input->post('model'),
            'serial_number' => $this->input->post('serial_number'),
            'tanggal_masuk' => $this->input->post('tanggal_masuk'),
            'status_barang' => $this->input->post('kode_garansi'),
            'status_perbaikan' => $this->input->post('status_perbaikan'),
            'tgl_estimasi_selesai' => $this->input->post('tgl_estimasi_selesai'),
            'teknisi' => $this->input->post('teknisi'),
            'kelengkapan' => $this->input->post('kelengkapan')
        );

        $this->m_service->update_service($data);
        redirect('service2');
        //print_r($data);
    }

    function delete()
    {
 
        $id = $this->uri->segment(3);
        $this->m_service->delete_service($id);
        redirect('service2');

    }

    function cek_ttr()
    {
    	$ttr = $this->input->post('ttr');
		$hasil_ttr = $this->m_service->cek_ttr($ttr);

		if(count($hasil_ttr)!=0){
            echo "0";
        }else{
            echo "1";
        }
			
    }

    function report()
    {
		$data['user'] = $this->m_service->ambiluser();
		//print_r($data['user']);
		$this->load->view('layout/header');
		$this->load->view('report/v_report',$data);
		$this->load->view('layout/footer');

    }    

    function resultreport($download_pdf = '')
    {
    	$this->load->helper('mediatutorialpdf');
    	$user=$this->input->post('user');
    	$awal=$this->input->post('tgl_awal');
    	$akhir=$this->input->post('tgl_akhir');

    	$sqluser = "AND user.nama_user='$user'";
    	$sqltanggal = "where service.tanggal_masuk between '$awal' and '$akhir'";

    	if($user!="ALL")
    	{	
    		$data['result'] = $this->m_service->resultreport($sqltanggal,$sqluser)->result();
    	}elseif ($user=="ALL") {
    		$sqluser='';
    		$data['result'] = $this->m_service->resultreport($sqltanggal,$sqluser)->result();
    	}

		//$this->load->view('layout/header');
		date_default_timezone_set('Asia/Jakarta');
        $date = strftime( "%d/%B/%Y", time());
		$pdf_filename = 'data_service_'.$date.'.pdf';
        //$data['link_download'] = ($download_pdf == TRUE)?'':anchor(base_url().'index.php/service2/resultreport/true/', 'Download Pdf');
		
		$isi = $this->load->view('report/v_report_result',$data, TRUE);
		$footer = $this->load->view('layout/footer','',TRUE);

		$output = $isi.$footer;
        //
        if($download_pdf == TRUE)
            generate_pdf($output, $pdf_filename);
        else
            echo $output;    	
    }

    function blanko()
    {
        $id = $this->uri->segment(3);
        $data['service'] = $this->m_service->get_by_id($id);
        $data['result'] = $this->m_service->get_all();
        //print_r($id);
        //$this->load->view('layout/header');
        $this->load->view('service/v_blanko', $data);
        //$this->load->view('layout/footer');
    }
}	