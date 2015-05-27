<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Resepsionis extends CI_Controller {

    var $tanggal;
    var $dokumen_path;

    public function __Construct() {
        parent::__Construct();
        $this->access_lib->is_login();
        $this->access_lib->_is("ksr,adm,sal,res");

        $this->load->library('header_lib');
        $script_obj = new header_lib;
        $this->header = $script_obj->dashboard_header();

        $this->tanggal = date("Y-m-d H:i:s");

        $this->load->model('pemesanan_m');
        $this->load->model('cluster_m');
        $this->load->model('resepsionis_m');
        $this->load->model('unit_m');
    }

    #	------------------------------
    #	RESEPSIONIS
    #	------------------------------

    public function index() {
        $data['header'] = $this->header;
        $this->load->view('resepsionis_v', $data);
    }

    public function resepsionis_list($limit) {
        $data['pemesanan'] = $this->resepsionis_m->get_by_id()->result();
        $this->load->view('resepsionis_data_v', $data);
    }

    public function kehadiran($nomor_pemesanan) {

        $data = array(
            'status_kehadiran' => "1"
            , 'waktu_kehadiran' => $this->tanggal
        );
        $hasil = $this->resepsionis_m->edit($nomor_pemesanan, $data);

        $show_status_verify = "<img src='" . base_url() . "files/images/ceklis.png'>";
        $waktu_kehadiran = $this->tanggal;
        echo $show_status_verify . "|" . $waktu_kehadiran;
    }

    public function transaksi($id_pemesanan) {

        $data = array(
            'status_transaksi' => "1"
        );
        $hasil = $this->resepsionis_m->edit($id_pemesanan, $data);

        $show_status_transaksi = "<img src='" . base_url() . "files/images/ceklis.png'>";
        $waktu_kehadiran = $this->tanggal;
        echo $show_status_transaksi . "|" . $waktu_kehadiran;
    }

    public function resepsionis_anggota_keluarga($id_unit, $id_kartu_keluarga, $id_pemesanan) {
        $this->load->model('unit_m');
        $this->load->model('pemesanan_m');
        $this->load->model('kartu_keluarga_m');

        $data['header'] = $this->header;
        $data['data_unit'] = $this->unit_m->get_by_id($id_unit)->row();
        $data['kartu_keluarga'] = $this->kartu_keluarga_m->get_kartu_keluarga_by_id($id_kartu_keluarga)->row();
        $data['anggota_keluarga'] = $this->kartu_keluarga_m->get_all_anggota_keluarga($id_kartu_keluarga)->result();
        $data['id_unit'] = $id_unit;
        $data['id_pemesanan'] = $id_pemesanan;
        $data['id_kartu_keluarga'] = $id_kartu_keluarga;

        $this->load->view('resepsionis_kartu_keluarga_v', $data);
    }

    public function resepsionis_detail($id_unit, $id_kartu_keluarga, $id_pemesanan) {
        $this->load->model('unit_m');
        $this->load->model('pemesanan_m');
        $this->load->model('customer_m');
        $this->load->model('kartu_keluarga_m');

        $data['header'] = $this->header;
        $data['data_unit'] = $this->unit_m->get_by_id($id_unit)->row();
        $data['kartu_keluarga'] = $this->kartu_keluarga_m->get_kartu_keluarga_by_id($id_kartu_keluarga)->row();
        $data['anggota_keluarga'] = $this->kartu_keluarga_m->get_all_anggota_keluarga($id_kartu_keluarga)->result();
        $data['pemesanan'] = $this->pemesanan_m->get_by_id($id_pemesanan)->row();
        $data['dokumen_lainnya'] = $this->customer_m->get_dokumen_by_id_customer($data['pemesanan']->id_customer)->result();
        $data['id_unit'] = $id_unit;
        $data['id_kartu_keluarga'] = $id_kartu_keluarga;
        $data['id_pemesanan'] = $id_pemesanan;

        $this->load->view('resepsionis_detail_v', $data);
    }

    public function antrian() {
        $data['header'] = $this->header;
        $this->load->view('resepsionis_no_antrian_pendaftaran', $data);
    }

    public function tampilan1() {
        $data['header'] = $this->header;
        $posisi = 0;
        $show = 20;
        $ikey = "";
        $key = '';
        $key = base64_decode($ikey);
        $key = explode("#", $key);

        $data['unit'] = $this->resepsionis_m->tampil_1()->result();
        $this->load->view('tampilan_view_1', $data);
    }

    public function table1() {
        $data['header'] = $this->header;
        $posisi = 0;
        $show = 20;
        $ikey = "";
        $key = '';
        $key = base64_decode($ikey);
        $key = explode("#", $key);

        $data['unit'] = $this->resepsionis_m->tampil_1()->result();
        $this->load->view('tampilan_tabel_1', $data);
    }

    public function tampilan2() {
        $data['header'] = $this->header;
        $posisi = 0;
        $show = 20;
        $ikey = "";
        $key = '';
        $key = base64_decode($ikey);
        $key = explode("#", $key);

        $data['unit'] = $this->unit_m->get_all('limit', $posisi, $show, $key)->result();
        $this->load->view('tampilan_view_2', $data);
    }

    public function table2() {
        $data['header'] = $this->header;
        $posisi = 0;
        $show = 20;
        $ikey = "";
        $key = '';
        $key = base64_decode($ikey);
        $key = explode("#", $key);

        $data['unit'] = $this->unit_m->get_all('limit', $posisi, $show, $key)->result();
        $this->load->view('tampilan_tabel_2', $data);
    }

}

/* End of file resepsionis.php */
/* Location: ./application/controllers/resepsionis.php */