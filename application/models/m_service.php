<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_service extends CI_Model {
	
	function __construct() {
        parent::__construct();
    }
	
	function count_service($like) {
		$like != '' ? $this->db->like($like) : '';
        return $this->db->count_all('service');
    }
	
	function get_service($like, $sidx, $sord, $limit, $start) {
		//$like != '' ? $this->db->like($like) : '';
		//$this->db->order_by($sidx, $sord);
		//return $this->db->get('service', $limit, $start);
		$q = $this->db->query("SELECT ttr,nama_user, nama_konsumen, 
									merek, model, serial_number, tanggal_masuk,tanggal_estimasi,tanggal_setuju, 
                                    tanggal_selesai,tanggal_ambil,status_barang, status_perbaikan, teknisi, kelengkapan 
								FROM service
								INNER JOIN user
								ON service.id_user=user.id_user $like order by $sidx $sord LIMIT $start,$limit ");

        return $q;

	}
	
	function insert_service($data) {
		return $this->db->insert('service',$data);
	}
	
	function update_service($data) {
		$this->db->where('ttr',$data['ttr']);
        $this->db->update('service',$data);
	}
	
	function delete_service($id) 
	{
		$this->db->where('ttr', $id);
		$this->db->delete('service'); 
	}

	function get_all()
	{
        $query=$this->db->get('service');
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return FALSE;
        }
    }

    function get_by_id($id)
    {
        $this->db->where('ttr',$id);
        $query=$this->db->get('service');
        return $query->result();
    }

    function get_no_transaksi($today)
    {
    	$hasil = $this->db->query("SELECT max(no_transaksi) AS last FROM service WHERE no_transaksi LIKE '$today%'");
    	//return $hasil->result_array();
    	return $hasil;
    }

    function search_ttr($ttr)
    {
    	$q = $this->db->query("SELECT ttr,status_perbaikan 
								FROM service where ttr='$ttr' ");
		return $q->result();
    }

    function cek_ttr($ttr)
    {
    	$query = $this->db->query("SELECT * FROM service where ttr='$ttr' ");
        return $query->result();
    }

    function ambiluser()
    {
    	$sql ="select * from user";
    	$query = $this->db->query($sql);
    	$i=0;
    	
    	return $query->result_array();
    }

    function resultreport($sqltanggal,$sqluser)
    {
    	$q = $this->db->query("SELECT ttr,nama_user, nama_konsumen, 
									merek, model, serial_number, tanggal_masuk,tanggal_estimasi,tanggal_setuju,
									tanggal_selesai, tanggal_ambil, status_barang, status_perbaikan, teknisi, kelengkapan 
								FROM service
								INNER JOIN user
								ON service.id_user=user.id_user $sqltanggal $sqluser");
		return $q;
    }

    function cari_konsumen($nama)
    {
        $this->db->select('nama_user');
        $this->db->like('nama_user', $nama);
           $query = $this->db->get('user');
        return $query->result();
    }

}