<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_service2 extends CI_Model {
	
	function __construct() {
        parent::__construct();
    }
	
	function count_service($like,$nama_user) {
		$this->db->where('nama_user',$nama_user);
        $like != '' ? $this->db->like($like) : '';
        return $this->db->count_all('service');
    }
	
	function get_service($like, $sidx, $sord, $limit, $start,$nama_user) {
		//$like != '' ? $this->db->like($like) : '';
		//$this->db->order_by($sidx, $sord);
		//return $this->db->get('service', $limit, $start);
		$q = $this->db->query("SELECT ttr,nama_user, nama_konsumen, 
									merek, model, serial_number, tanggal_masuk,tanggal_estimasi,tanggal_setuju, 
                                    tanggal_selesai,tanggal_ambil,status_barang, status_perbaikan, teknisi, kelengkapan 
								FROM service
								INNER JOIN user
								ON service.id_user=user.id_user where service.nama_konsumen = '$nama_user' $like order by $sidx $sord LIMIT $start ,$limit ");

        return $q;

	}
	
}