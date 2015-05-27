<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sk extends CI_Controller
{
	var $header;
	
	function __Construct()
	{
		parent::__Construct();
		$this->access_lib->is_login();
		$this->access_lib->_is("adm,mgr,stk,sal,ksr");
	}
	
	# Halaman default sk
	function index()
	{		
		$this->load->library('header_lib');
		$script_obj = new header_lib;
		
		$data['header'] = $script_obj->dashboard_header();				
		$this->load->view('sk_v', $data);
	}
	
	# Menampilkan list data sk
	function list_data($posisi = 0)
	{
		$this->load->model('sk_m');
		$data['sk'] 			= $this->sk_m->get_all('limit', $posisi)->result();
		$data['total_sk']	= count($this->sk_m->get_all('all', 0)->result());
		$data['prev']			= $posisi - 10;
		$data['next']			= $posisi + 10;
		$data['posisi']			= $posisi;
		
		if(($data['total_sk'] % 10) > 0)
		{
			$data['akhir']	= floor($data['total_sk']/10)*10;
		}
		else
		{
			$data['akhir']	= (floor($data['total_sk']/10)*10) - 10;
		}
		
		$this->load->view('sk_data_v', $data);
	}
	
	# Menampilkan form data sk
	function form_data_sk($status, $id_sk, $posisi = 0)
	{
		$this->access_lib->_is("adm,mgr,stk,sal,ksr");
		
		$data['posisi']	= $posisi;
		
		if($status === "add")
		{
			$data['judul']	= "Tambah Data sk";
			$data['action']	= base_url()."sk/add";
			
			$data['id_sk']		= "";
			$data['nama_sk']	= "";
			$data['persentase_kenaikan']		= "";
			$data['persentase_penurunan']		= "";
			$data['nup_awal']		= "";
			$data['nup_akhir']		= "";
			$data['status']		= "";
			$data['deskripsi']		= "";
		}
		else if($status === "edit")
		{
			$this->load->model('sk_m');
			
			$data['judul']	= "Ubah Data sk";
			$data['action']	= base_url()."sk/edit";
			$data_sk	= $this->sk_m->get_by_id($id_sk)->row();
			
			$data['id_sk']		= $data_sk->id_sk;
			$data['nama_sk']		= $data_sk->nama_sk;
			$data['persentase_kenaikan']	= $data_sk->persentase_kenaikan;
			$data['persentase_penurunan']	= $data_sk->persentase_penurunan;
			$data['nup_awal']	= $data_sk->nup_awal;
			$data['nup_akhir']	= $data_sk->nup_akhir;
			$data['status']	= $data_sk->status;
			$data['deskripsi']		= $data_sk->deskripsi;
		}
		
		$this->load->view('sk_form_data_v', $data);
	}	
	
	# Menambah data sk
	function add()
	{
		$this->access_lib->_is("adm,mgr,stk,sal,ksr");
		
		$this->load->model('sk_m');
		
		$data = array('nama_sk'		=> $this->input->post('nama_sk'),
					  'persentase_kenaikan'	=> $this->input->post('persentase_kenaikan'),
					  'persentase_penurunan'	=> $this->input->post('persentase_penurunan'),
					  'nup_awal'	=> $this->input->post('nup_awal'),
					  'nup_akhir'	=> $this->input->post('nup_akhir'),
					  'status'	=> $this->input->post('status'),
					  'deskripsi'		=> $this->input->post('deskripsi'));
		
		$id_sk = $this->sk_m->add($data);
		if ($id_promo)
		{
			$this->access_lib->logging('Tambah data sk : '.$this->input->post('nama_sk'));
			echo "ok-add";
		}
	}
	
	# Mengubah data sk
	function edit()
	{
		$this->access_lib->_is("adm,mgr,stk,sal,ksr");
		
		$this->load->model('sk_m');

		$data = array('nama_sk'		=> $this->input->post('nama_sk'),
					   'persentase_kenaikan'	=> $this->input->post('persentase_kenaikan'),
					  'persentase_penurunan'	=> $this->input->post('persentase_penurunan'),
					  'nup_awal'	=> $this->input->post('nup_awal'),
					  'nup_akhir'	=> $this->input->post('nup_akhir'),
					  'status'	=> $this->input->post('status'),
					  'deskripsi'		=> $this->input->post('deskripsi'));
		
		$this->sk_m->update($this->input->post('id_sk'), $data);
		
		if ($id_promo)
		{
			$this->access_lib->logging('ubah data sk : '.$this->input->post('nama_sk'));
			echo "ok-edit";
		}
		
		
	}
	
	# Menghapus data sk
	function detail($id_sk, $posisi = 0)
	{
		$this->load->model('sk_m');
		$data['posisi'] = $posisi;
		$data['sk']	= $this->sk_m->get_by_id($id_sk)->row();
		$this->load->view('sk_detail_v', $data);
	}
	
	# Menghapus data sk
	function delete($id_sk)
	{
		$this->access_lib->_is("adm,mgr,stk,sal,ksr");
		
		$this->load->model('sk_m');
		$nama_sk = $this->sk_m->get_by_id($id_sk)->row()->nama_sk;
		$result = $this->sk_m->delete($id_sk);
		if ($result == "ok")
		{
			$this->access_lib->logging('Hapus data sk : '.$nama_sk);
		}
		echo $result;
	}
	

	
}

# End of file sk.php
# Location: ./applicaion/controller/dashboard/sk.php