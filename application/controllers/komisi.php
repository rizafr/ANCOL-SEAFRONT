<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Komisi extends CI_Controller
{
	var $header;
	
	function __Construct()
	{
		parent::__Construct();
		$this->access_lib->is_login();
		$this->access_lib->_is("adm,mgr,stk");
	}
	
	# Halaman default komisi
	function index()
	{		
		$this->load->library('header_lib');
		$script_obj = new header_lib;
		
		$data['header'] = $script_obj->dashboard_header();				
		$this->load->view('komisi_v', $data);
	}
	
	# Menampilkan list data komisi
	function list_data($posisi = 0)
	{
		$this->load->model('komisi_m');
		$data['komisi'] 			= $this->komisi_m->get_all('limit', $posisi)->result();
		$data['total_komisi']	= count($this->komisi_m->get_all('all', 0)->result());
		$data['prev']			= $posisi - 10;
		$data['next']			= $posisi + 10;
		$data['posisi']			= $posisi;
		
		if(($data['total_komisi'] % 10) > 0)
		{
			$data['akhir']	= floor($data['total_komisi']/10)*10;
		}
		else
		{
			$data['akhir']	= (floor($data['total_komisi']/10)*10) - 10;
		}
		
		$this->load->view('komisi_data_v', $data);
	}
	
	# Menampilkan form data komisi
	function form_data_komisi($status, $id_komisi, $posisi = 0)
	{
		$this->access_lib->_is("adm,stk");
		
		$data['posisi']	= $posisi;
		
		if($status === "add")
		{
			$data['judul']	= "Tambah Data komisi";
			$data['action']	= base_url()."komisi/add";
			
			$data['id_komisi']		= "";
			$data['nama_komisi']	= "";
			$data['persentase']		= "";
			$data['deskripsi']		= "";
		}
		else if($status === "edit")
		{
			$this->load->model('komisi_m');
			
			$data['judul']	= "Ubah Data komisi";
			$data['action']	= base_url()."komisi/edit";
			$data_komisi	= $this->komisi_m->get_by_id($id_komisi)->row();
			
			$data['id_komisi']		= $data_komisi->id_komisi;
			$data['nama_komisi']		= $data_komisi->nama_komisi;
			$data['persentase']	= $data_komisi->persentase;
			$data['deskripsi']		= $data_komisi->deskripsi;
		}
		
		$this->load->view('komisi_form_data_v', $data);
	}	
	
	# Menambah data komisi
	function add()
	{
		$this->access_lib->_is("adm,stk");
		
		$this->load->model('komisi_m');
		
		$data = array('nama_komisi'		=> $this->input->post('nama_komisi'),
					  'persentase'	=> $this->input->post('persentase'),
					  'deskripsi'		=> $this->input->post('deskripsi'));
		
		$id_komisi = $this->komisi_m->add($data);
		if ($id_promo)
		{
			$this->access_lib->logging('Tambah data komisi : '.$this->input->post('nama_komisi'));
			echo "ok-add";
		}
	}
	
	# Mengubah data komisi
	function edit()
	{
		$this->access_lib->_is("adm,stk");
		
		$this->load->model('komisi_m');

		$data = array('nama_komisi'		=> $this->input->post('nama_komisi'),
					  'persentase'	=> $this->input->post('persentase'),
					  'deskripsi'		=> $this->input->post('deskripsi'));
		
		$this->komisi_m->update($this->input->post('id_komisi'), $data);
		
		if ($id_promo)
		{
			$this->access_lib->logging('ubah data komisi : '.$this->input->post('nama_komisi'));
			echo "ok-edit";
		}
		
		
	}
	
	# Menghapus data komisi
	function detail($id_komisi, $posisi = 0)
	{
		$this->load->model('komisi_m');
		$data['posisi'] = $posisi;
		$data['komisi']	= $this->komisi_m->get_by_id($id_komisi)->row();
		$this->load->view('komisi_detail_v', $data);
	}
	
	# Menghapus data komisi
	function delete($id_komisi)
	{
		$this->access_lib->_is("adm,stk");
		
		$this->load->model('komisi_m');
		$nama_komisi = $this->komisi_m->get_by_id($id_komisi)->row()->nama_komisi;
		$result = $this->komisi_m->delete($id_komisi);
		if ($result == "ok")
		{
			$this->access_lib->logging('Hapus data komisi : '.$nama_komisi);
		}
		echo $result;
	}
	

	
}

# End of file komisi.php
# Location: ./applicaion/controller/dashboard/komisi.php