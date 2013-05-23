<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_user extends CI_Model {
	
	function __construct() {
        parent::__construct();
    }
	
	function count_user($like) {
		$like != '' ? $this->db->like($like) : '';
        return $this->db->count_all('user');
    }
	
	function get_user($like, $sidx, $sord, $limit, $start) {
		$like != '' ? $this->db->like($like) : '';
		$this->db->order_by($sidx, $sord);
		return $this->db->get('user', $limit, $start);
		
	}
	
	function insert_user($data) {
		return $this->db->insert('user',$data);
	}
	
	function update_user($data) {
		$this->db->where('id_user',$data['id_user']);
        $this->db->update('user',$data);
	}
	
	function delete_user($id) 
	{
		$this->db->where('id_user', $id);
		$this->db->delete('user'); 
	}

	function get_all()
	{
        $query=$this->db->get('user');
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return FALSE;
        }
    }

    function get_by_id($id)
    {
        $this->db->where('id_user',$id);
        $query=$this->db->get('user');
        return $query->result();
    }

    function cek_username($username)
    {
        $query = $this->db->query("SELECT * FROM user where user_name='$username' ");
        return $query->result();
    }

}