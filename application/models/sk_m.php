<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sk_m extends CI_Model
{
	private $tbl_sk = 'tbl_sk';
	
	function __Construct()
	{
		parent::__Construct();
	}
	
	# Mendapatkan semua data sk
	function get_all($status, $limit)
	{
		if($status == "all")
		{
			$query = $this->db->query("SELECT 	*
									   FROM		tbl_sk
									   ORDER BY id_sk asc");
		}else if($status == "limit")
		{
			$query = $this->db->query("SELECT 	*
									   FROM		tbl_sk
									   ORDER BY id_sk asc
									   LIMIT	".$limit.", 10");
		}
		return $query;
	}
	
	# Mendapatkan data sk berdasarkan id_sk
	function get_by_id($id_sk)
	{
		$query = $this->db->get_where($this->tbl_sk, array('id_sk' => $id_sk));
		return $query;
	}	
	
	# Menambah data sk
	function add($data)
	{				
		$this->db->insert($this->tbl_sk, $data);
		return $this->db->insert_id();
	}
	
	# Mengubah data sk
	function update($id_sk, $data)
	{		
		$this->db->where('id_sk', $id_sk);
		$this->db->update($this->tbl_sk, $data);
	}
	
	# Menghapus data sk
	function delete($id_sk)
	{		
		$this->db->where('id_sk', $id_sk);
		$this->db->delete($this->tbl_sk);	
		
		return "ok";
	}
	
	
	
}

# End of file sk_m.php
# Location: ./application/model/sk_m.php