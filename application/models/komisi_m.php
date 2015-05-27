<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Komisi_m extends CI_Model
{
	private $tbl_komisi = 'tbl_komisi';
	
	function __Construct()
	{
		parent::__Construct();
	}
	
	# Mendapatkan semua data komisi
	function get_all($status, $limit)
	{
		if($status == "all")
		{
			$query = $this->db->query("SELECT 	*
									   FROM		tbl_komisi
									   ORDER BY id_komisi asc");
		}else if($status == "limit")
		{
			$query = $this->db->query("SELECT 	*
									   FROM		tbl_komisi
									   ORDER BY id_komisi asc
									   LIMIT	".$limit.", 10");
		}
		return $query;
	}
	
	# Mendapatkan data komisi berdasarkan id_komisi
	function get_by_id($id_komisi)
	{
		$query = $this->db->get_where($this->tbl_komisi, array('id_komisi' => $id_komisi));
		return $query;
	}	
	
	# Menambah data komisi
	function add($data)
	{				
		$this->db->insert($this->tbl_komisi, $data);
		return $this->db->insert_id();
	}
	
	# Mengubah data komisi
	function update($id_komisi, $data)
	{		
		$this->db->where('id_komisi', $id_komisi);
		$this->db->update($this->tbl_komisi, $data);
	}
	
	# Menghapus data komisi
	function delete($id_komisi)
	{		
		$this->db->where('id_komisi', $id_komisi);
		$this->db->delete($this->tbl_komisi);	
		
		return "ok";
	}
	
	
	
}

# End of file komisi_m.php
# Location: ./application/model/komisi_m.php