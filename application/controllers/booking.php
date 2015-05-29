<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Booking extends CI_Controller {

    var $header;
    var $tanggal;
    var $ktp_path;

    public function __Construct() {
        parent::__Construct();
        $this->load->library('header_lib');
        $this->access_lib->is_login();

        $script_obj = new header_lib;
        $this->header = $script_obj->dashboard_header();
        $this->tanggal = date("Y-m-d H:i:s");
        $this->ktp_path = realpath(APPPATH . '../files/dokumen_user');
    }

    public function index() {
        $this->load->model('siteplan_m');
        $this->load->model('cluster_m');

        $data['header'] = $this->header;
        // $data['siteplan']			= $this->siteplan_m->get_all_regular()->result();
        $data['cluster'] = $this->cluster_m->get_all("all")->result();
        if (isset($_POST['submit'])) {
            $id_cluster = $this->input->post('id_cluster');
            if (!empty($id_cluster)) {
                $data['siteplan'] = $this->siteplan_m->get_all_regular_by_name($id_cluster)->result();
            } else {
                $data['siteplan'] = $this->siteplan_m->get_all_regular()->result();
            }
            $data['id_cluster'] = $id_cluster;
        }
        $this->load->view('booking_show_siteplan_regular_v', $data);
    }

    #	Menampilkan siteplan promo

    public function promo() {
        $this->load->model('siteplan_m');

        $data['header'] = $this->header;
        $data['siteplan'] = $this->siteplan_m->get_all_promo()->result();

        $this->load->view('booking_show_siteplan_promo_v', $data);
    }

    # 	Menampilkan sitplan detail

    public function siteplan_detail($id_siteplan) {
        $this->load->model('siteplan_m');
        $this->load->library('user_agent');

        $data['header'] = $this->header;
        $data['data_siteplan'] = $this->siteplan_m->get_by_id($id_siteplan)->row();
        $data['unit'] = $this->siteplan_m->get_unit_regular($id_siteplan)->result();

        if ($this->agent->is_mobile()) {
            $this->load->view('mobile/booking_siteplan_detail_regular_v', $data);
        } else {
            $this->load->view('booking_siteplan_detail_regular_v', $data);
        }
    }

    # 	Menampilkan customer sitplan detail

    public function customer_siteplan_detail($id_siteplan, $id_unit, $id_pemesanan) {
        $this->load->model('siteplan_m');
        $this->load->model('pemesanan_m');
        $this->load->library('user_agent');

        $data['header'] = $this->header;
        $data['data_siteplan'] = $this->siteplan_m->get_by_id($id_siteplan)->row();
        $data['unit'] = $this->siteplan_m->get_unit_regular($id_siteplan)->result();
        $pemesanan = $this->pemesanan_m->get_by_id($id_pemesanan)->row();
        $data['data_pemesanan'] = $pemesanan;
        $data['nomor_pemesanan'] = $pemesanan->nomor_pemesanan;
        $data['id_unit'] = $id_unit;
        if ($this->agent->is_mobile()) {
            $this->load->view('mobile/booking_siteplan_detail_regular_customer_v', $data);
        } else {
            $this->load->view('booking_siteplan_detail_regular_customer_v', $data);
        }
    }

    # 	Menampilkan sitplan detail

    public function siteplan_detail_promo($id_siteplan) {
        $this->load->model('siteplan_m');
        $this->load->library('user_agent');

        $data['header'] = $this->header;
        $data['data_siteplan'] = $this->siteplan_m->get_by_id($id_siteplan)->row();
        $data['unit'] = $this->siteplan_m->get_unit_promo($id_siteplan)->result();

        if ($this->agent->is_mobile()) {
            $this->load->view('mobile/booking_siteplan_detail_promo_v', $data);
        } else {
            $this->load->view('booking_siteplan_detail_promo_v', $data);
        }
    }

    # 	Menampilkan unit lainnya header
    # 	Added : Mei, 30 2013 

    public function unit_lainnya_detail_regular() {
        $data['header'] = $this->header;
        $this->load->view('booking_unit_lainnya_regular_v', $data);
    }

    # 	Menampilkan unit lainnya header
    # 	Added : Mei, 30 2013 

    public function unit_lainnya_detail_promo() {
        $data['header'] = $this->header;
        $this->load->view('booking_unit_lainnya_promo_v', $data);
    }

    # 	Menampilkan data unit lainnya
    # 	Added : Mei, 30 2013

    public function unit_lainnya_data_regular($posisi = 0) {
        $this->load->model('unit_m');

        $data['unit'] = $this->unit_m->get_unit_regular_lainnya("limit", $posisi)->result();
        $data['total_unit'] = count($this->unit_m->get_unit_regular_lainnya("all")->result());

        $data['prev'] = $posisi - 10;
        $data['next'] = $posisi + 10;
        $data['posisi'] = $posisi;

        if (($data['total_unit'] % 10) > 0) {
            $data['akhir'] = floor($data['total_unit'] / 10) * 10;
        } else {
            $data['akhir'] = (floor($data['total_unit'] / 10) * 10) - 10;
        }

        $this->load->view('booking_unit_lainnya_data_regular_v', $data);
    }

    # 	Menampilkan data unit lainnya
    # 	Added : Mei, 30 2013

    public function unit_lainnya_data_promo($posisi = 0) {
        $this->load->model('unit_m');

        $data['unit'] = $this->unit_m->get_unit_promo_lainnya("limit", $posisi)->result();
        $data['total_unit'] = count($this->unit_m->get_unit_promo_lainnya("all")->result());

        $data['prev'] = $posisi - 10;
        $data['next'] = $posisi + 10;
        $data['posisi'] = $posisi;

        if (($data['total_unit'] % 10) > 0) {
            $data['akhir'] = floor($data['total_unit'] / 10) * 10;
        } else {
            $data['akhir'] = (floor($data['total_unit'] / 10) * 10) - 10;
        }

        $this->load->view('booking_unit_lainnya_data_promo_v', $data);
    }

    # 	Menampilkan form pemesanan

    public function form_pemesanan($status_form, $id_siteplan, $id_unit, $id_pemesanan) {
        $this->access_lib->is_active_transaction();

        $this->load->model('unit_m');
        $this->load->model('cara_pembayaran_m');
        $this->load->model('promo_m');
        $this->load->model('timeout_m');
        $this->load->model('pemesanan_m');

        $data['header'] = $this->header;
        $data['status_form'] = $status_form;
        $data['id_unit'] = $id_unit;
        $data['id_siteplan'] = $id_siteplan;
        $data['data_unit'] = $this->unit_m->get_by_id($id_unit)->row();
        $data['data_cara_pembayaran'] = $this->cara_pembayaran_m->get_all()->result();

        # lock unit yg dipilih
        $this->unit_m->lock($id_unit);

        # Cek apakah unit yang dipesan adalah unit promo atau reguler
        # Jika unit yang dipesan adalah promo, maka akan ditampilkan status promo
        # yang sedang aktif.
        if ($data['data_unit']->status_unit == "Promo") {
            $data['status'] = "Promo";

            # Mengambil Data Promo Yang sedang aktif Dan Unit Terdaftar Didalamnya
            $data_promo = $this->promo_m->get_active_promo_by_id_unit($id_unit)->row();

            if ($data_promo->id_promo != "") {
                $data['diskon_cara_pembayaran'] = $this->promo_m->get_max_diskon($id_unit)->result();
                $data['data_cara_pembayaran'] = $data['diskon_cara_pembayaran'];
                $data['nama_promo'] = $data_promo->nama_promo;
                $data['deskripsi'] = $data_promo->deskripsi;
                $data['id_promo'] = $data_promo->id_promo;
            } else {
                redirect('booking/promo');
            }
        }

        # Fungsi untuk mengecek apakah form statusnya menambah pemesanan (add) atau mengubah (edit)
        # Berhubungan dengan tombol back di form pemesanan
        # Status : add, edit
        if ($status_form == "add") {

            # Cek Jika Unit Belum Mempunyai Status Transaksi
            if ($data['data_unit']->status_transaksi != "" OR $data['data_unit']->locked == "1") {
                if ($data['data_unit']->status_transaksi != "") {
                    $this->session->set_flashdata("alert", "<script language='javascript'>$(document).ready(function(){alert('Maaf, unit \"" . $data['data_unit']->kode_unit . "\" telah mempunyai status transaksi.')});</script>");
                }
                if ($data['data_unit']->locked == "1") {
                    $timeout = $this->timeout_m->get_active_locked()->row()->timeout;
                    $this->load->library('f_lib');
                    $detail_timeout = $this->f_lib->dhm($timeout, "dhm");
                    $this->session->set_flashdata("alert", "<script language='javascript'>$(document).ready(function(){alert('Maaf, unit \"" . $data['data_unit']->kode_unit . "\" sedang dalam proses pemesanan. Status unit akan kembali available dalam " . $detail_timeout . " jika proses pemesanan dibatalkan.')});</script>");
                }

                if ($data['data_unit']->status_unit == "Promo") {
                    if ($id_siteplan != '0') {
                        redirect('booking/siteplan_detail_promo/' . $id_siteplan);
                    } else {
                        redirect('booking/unit_lainnya_detail_promo');
                    }
                } else {
                    if ($id_siteplan != '0') {
                        redirect('booking/siteplan_detail/' . $id_siteplan);
                    } else {
                        redirect('booking/unit_lainnya_detail_regular');
                    }
                }
            } else {
                $this->unit_m->lock($id_unit);
            }

            $data['action'] = base_url() . "booking/save_pemesanan";
            # add nomor virtual account
            $data['no_va'] = "";
            # end add nomor virtual account

            $data['id_pemesanan'] = "";
            $data['nomor_pemesanan'] = "";
            $data['diskon_khusus'] = "";
            $data['nama_lengkap'] = "";
            $data['no_ktp'] = "";
            $data['no_kartu_keluarga'] = "";
            $data['no_npwp'] = "";
            $data['telpon'] = "";
            $data['hp'] = "";
            $data['email'] = "";
            $data['alamat_surat_menyurat'] = "";
            $data['alamat_ktp'] = "";
            $data['diskon_tanah'] = "0.00";
            $data['diskon_bangunan'] = "0.00";
            $data['alamat_npwp'] = "";
            $data['cara_pembayaran'] = "";
            $data['booking_fee'] = "";
            $data['doc_ktp'] = "";
            $data['doc_npwp'] = "";
            $data['doc_kartu_keluarga'] = "";
            $data['doc_akta_nikah'] = "";
            $data['doc_siup'] = "";
            $data['locked'] = $this->timeout_m->get_active_locked()->row()->timeout;

            $this->access_lib->logging("Lock pemesanan unit : " . $data['data_unit']->kode_unit);
        } else if ($status_form == "edit") {
            $this->load->model('pemesanan_m');

            $data_pemesanan = $this->pemesanan_m->get_by_id($id_pemesanan)->row();
            # Untuk sales, jika status = booked dan belum di-verify
            if ($this->access_lib->_if("sal")) {
                if ($data_pemesanan->status_pemesanan != "Booked" OR $data_pemesanan->status_verify != "") {
                    redirect('report/regular');
                }
            }


            $this->load->model('customer_m');
            $this->load->model('kartu_keluarga_m');

            $data_customer = $this->customer_m->get_by_id($data_pemesanan->id_customer)->row();
            $data_kartu_keluarga = $this->kartu_keluarga_m->get_kartu_keluarga_by_id_customer($data_pemesanan->id_customer)->row();
            $data['action'] = base_url() . "booking/edit_pemesanan";

            $data['no_va'] = $data_pemesanan->no_va;
            $data['nomor_pemesanan'] = $data_pemesanan->nomor_pemesanan;
            $data['id_pemesanan'] = $data_pemesanan->id_pemesanan;
            $data['nama_lengkap'] = $data_customer->nama_lengkap;
            $data['no_ktp'] = $data_customer->no_ktp;
            $data['no_kartu_keluarga'] = $data_kartu_keluarga->no_kartu_keluarga;
            $data['no_npwp'] = $data_customer->no_npwp;
            $data['telpon'] = $data_customer->telpon;
            $data['hp'] = $data_customer->hp;
            $data['email'] = $data_customer->email;
            $data['alamat_surat_menyurat'] = $data_customer->alamat_surat_menyurat;
            $data['alamat_ktp'] = $data_customer->alamat_ktp;
            $data['diskon_tanah'] = $data_pemesanan->diskon_tanah;
            $data['diskon_bangunan'] = $data_pemesanan->diskon_bangunan;
            $data['alamat_npwp'] = $data_customer->alamat_npwp;
            $data['cara_pembayaran'] = $data_pemesanan->cara_pembayaran;
            $data['booking_fee'] = $data_pemesanan->booking_fee;
            $data['doc_ktp'] = $data_customer->doc_ktp;
            $data['doc_npwp'] = $data_customer->doc_npwp;
            $data['doc_kartu_keluarga'] = $data_customer->doc_kartu_keluarga;
            $data['doc_akta_nikah'] = $data_customer->doc_akta_nikah;
            $data['doc_siup'] = $data_customer->doc_siup;

            if ($data['data_unit']->status_unit == "Promo") {
                $data['nama_promo'] = $data_pemesanan->nama_promo;
                $data['deskripsi'] = $data_pemesanan->deskripsi;
                $data['id_promo'] = $data_pemesanan->id_promo;
            }
        }

        $this->load->view('booking_form_pemesanan_v', $data);
    }

    # 	Menyimpan data pemesanan

    public function save_pemesanan() {
        $this->access_lib->is_active_transaction();

        $this->load->model('unit_m');
        $this->load->model('pemesanan_m');
        $this->load->model('customer_m');
        $this->load->model('customer_ref_m');
        $this->load->model('kartu_keluarga_m');
        $this->load->model('timeout_m');
        $this->load->model('sk_m');

        $diskon_khusus = $this->input->post('diskon_khusus');

        $data_unit = $this->unit_m->get_by_id($this->input->post('id_unit'))->row();

        if ($data_unit->status_transaksi != "") {
            $this->session->set_flashdata("alert", "<script language='javascript'>$(document).ready(function(){alert('Maaf, unit \"" . $data_unit->kode_unit . "\" telah mempunyai status transaksi.')});</script>");
            if ($data_unit->status_unit == "Promo") {
                redirect('booking/promo');
            } else {
                redirect('booking');
            }
        }

        if ($this->input->post('booking_fee') >= $this->input->post('tanda_jadi_real')) {
            $status_pemesanan = "Tanda Jadi";
            $data_timeout = $this->timeout_m->get_active_tanda_jadi()->row();
            $timeout = $data_timeout->timeout;
            $tanggal_tanda_jadi = $this->tanggal;
        } else {
            $status_pemesanan = "Booked";
            $data_timeout = $this->timeout_m->get_active_booking()->row();
            $timeout = $data_timeout->timeout;
            $tanggal_tanda_jadi = "";
        }

        $doc_ktp = $this->upload_dokumen("doc_ktp");
        $doc_npwp = $this->upload_dokumen("doc_npwp");
        $doc_kartu_keluarga = $this->upload_dokumen("doc_kartu_keluarga");
        $doc_akta_nikah = $this->upload_dokumen("doc_akta_nikah");
        $doc_siup = $this->upload_dokumen("doc_siup");

        # Menyimpan data customer
        $data_customer = array("nama_lengkap" => $this->input->post('nama_lengkap'),
            "no_ktp" => $this->input->post('no_ktp'),
            "no_npwp" => $this->input->post('no_npwp'),
            "alamat_npwp" => $this->input->post('alamat_npwp'),
            "telpon" => $this->input->post('telpon'),
            "hp" => $this->input->post('hp'),
            "email" => $this->input->post('email'),
            "alamat_ktp" => $this->input->post('alamat_ktp'),
            "alamat_surat_menyurat" => $this->input->post('alamat_surat_menyurat'),
            "doc_ktp" => $doc_ktp,
            "doc_npwp" => $doc_npwp,
            "doc_kartu_keluarga" => $doc_kartu_keluarga,
            "doc_akta_nikah" => $doc_akta_nikah,
            "doc_siup" => $doc_siup
        );

        $id_customer = $this->customer_m->add($data_customer);

        # Update / Insert Referensi Customer
        $this->customer_ref_m->save();

        # Menyimpan data kartu keluarga
        $data_kartu_keluarga = array("id_customer" => $id_customer,
            "no_kartu_keluarga" => $this->input->post('no_kartu_keluarga'),
            "tanggal_posting" => $this->tanggal);
        $id_kartu_keluarga = $this->kartu_keluarga_m->add_kartu_keluarga($data_kartu_keluarga);

        $temp_cara_pembayaran = explode(" ", $this->input->post('cara_pembayaran'));
        $tipe_pembayaran = $temp_cara_pembayaran[0];
        $tahap_pembayaran = $temp_cara_pembayaran[1];

        # Menyimpan data pemesanan
        if ($data_unit->status_unit == "Promo") {
            $data_pemesanan = array("nomor_pemesanan" => $this->generate_nomor_pemesanan("Ancol"),
                "tanggal_pemesanan" => $this->tanggal,
                "tanggal_tanda_jadi" => $tanggal_tanda_jadi,
                "id_agen" => $this->session->userdata('id_agent'),
                "id_user" => $this->session->userdata('id_user'),
                "id_customer" => $id_customer,
                "id_promo" => $this->input->post('id_promo'),
                "jenis_pemesanan" => "Promo",
                "status_pemesanan" => $status_pemesanan,
                "tipe_pembayaran" => $tipe_pembayaran,
                "tahap_pembayaran" => $tahap_pembayaran,
                "booking_fee" => $this->input->post('booking_fee'),
                "id_unit" => $this->input->post('id_unit'),
                "id_kartu_keluarga" => $id_kartu_keluarga,
                "timeout" => $timeout,
                "diskon_tanah" => $this->input->post('diskon_tanah'),
                "diskon_bangunan" => $this->input->post('diskon_bangunan')
            );
        } else {
            //hitung diskon
            $nup = $this->input->post('nomor_pemesanan');
            if (($nup > 0) && ($nup <= 56)) {
                if (($diskon_khusus != "") || (!empty($diskon_khusus)) || ($diskon > 0)) {
                    $diskon = $diskon_khusus / 100;
                } else {
                    $diskon = 0.10;
                }
            } elseif (($nup > 56) && ($nup <= 100)) {
                if (($diskon_khusus != "") || (!empty($diskon_khusus)) || ($diskon > 0)) {
                    $diskon = $diskon_khusus / 100;
                } else {
                    $diskon = 0.8;
                }
            } elseif (($nup > 100) && ($nup <= 150)) {
                if (($diskon_khusus != "") || (!empty($diskon_khusus)) || ($diskon > 0)) {
                    $diskon = $diskon_khusus / 100;
                } else {
                    $diskon = 0.6;
                }
            } elseif (($nup > 150) && ($nup <= 200)) {
                if (($diskon_khusus != "") || (!empty($diskon_khusus)) || ($diskon > 0)) {
                    $diskon = $diskon_khusus / 100;
                } else {
                    $diskon = 0.4;
                }
            } elseif (($nup > 200) && ($nup <= 250)) {
                if (($diskon_khusus != "") || (!empty($diskon_khusus)) || ($diskon > 0)) {
                    $diskon = $diskon_khusus / 100;
                } else {
                    $diskon = 0.2;
                }
            } elseif (($nup > 250) && ($nup <= 300)) {
                if (($diskon_khusus != "") || (!empty($diskon_khusus)) || ($diskon > 0)) {
                    $diskon = $diskon_khusus / 100;
                } else {
                    $diskon = 0;
                }
            }

            //dapatkan harga
            if (($tahap_pembayaran == "1") && ($tipe_pembayaran == "Cash")) {
                $harga_jual = $data_unit->harga_jual_inc_ppn;
            } elseif (($tahap_pembayaran == "36") && ($tipe_pembayaran == "Cash")) {
                $harga_jual = $data_unit->kpr_5_tahun;
            } elseif (($tahap_pembayaran == "48") && ($tipe_pembayaran == "Cash")) {
                $harga_jual = $data_unit->kpr_10_tahun;
            } elseif (($tahap_pembayaran == "36") && ($tipe_pembayaran == "KPR")) {
                $harga_jual = $data_unit->plafon_kpr;
            
            } elseif (($tahap_pembayaran == "24") && ($tipe_pembayaran == "KPR")) {
                $harga_jual = $data_unit->kpr_15_tahun;
            }

            $harga = $harga_jual - ($harga_jual * $diskon);

            $data_pemesanan = array("nomor_pemesanan" => $this->input->post('nomor_pemesanan'),
                "tanggal_pemesanan" => $this->tanggal,
                "tanggal_tanda_jadi" => $tanggal_tanda_jadi,
                "id_agen" => $this->session->userdata('id_agent'),
                "id_user" => $this->session->userdata('id_user'),
                "id_customer" => $id_customer,
                "id_promo" => "",
                "harga_jual" => $harga,
                "diskon_khusus" => $diskon_khusus,
                "jenis_pemesanan" => "Marketable",
                "status_pemesanan" => $status_pemesanan,
                "tipe_pembayaran" => $tipe_pembayaran,
                "tahap_pembayaran" => $tahap_pembayaran,
                "booking_fee" => $this->input->post('booking_fee'),
                "id_unit" => $this->input->post('id_unit'),
                "id_kartu_keluarga" => $id_kartu_keluarga,
                "timeout" => $timeout
            );
        }

        $id_pemesanan = $this->pemesanan_m->add($data_pemesanan);

        #mengisi ke tabel virtual account
        $data_virtual_account = array("no_va" => $this->input->post('no_va'),
            "id_pemesanan" => $id_pemesanan
        );


        $id_va = $this->pemesanan_m->add_va($data_virtual_account);

        // #mengisi ke tabel resepsionis
        // $data_resepsionis = array(
        // "no_va" => $this->input->post('no_va'),
        // "id_customer" => $id_customer,
        // "id_pemesanan" => $id_pemesanan
        // );
        // $id_resepsionis = $this->pemesanan_m->add_resepsionis($data_resepsionis);
        # Mengupdate status unit
        $this->unit_m->update_status_transaksi($this->input->post('id_unit'), "Booked");

        # Unlock Pemesanan
        $this->unit_m->unlock($this->input->post('id_unit'));

        # Mengupload file dokumen
        $i = 0;
        foreach ($_FILES['doc']['name'] as $filename) {
            if (!empty($_FILES['doc']['name'][$i])) {
                $file = $this->upload_dokumen_lainnya($i);

                $data = array("id_customer" => $id_customer,
                    "file_dokumen" => $file);
                $this->customer_m->add_dokumen($data);
                $i++;
            }
        }

        $this->access_lib->logging("Booking unit : " . $data_unit->kode_unit);

        redirect("booking/form_kartu_keluarga/" . $this->input->post('id_siteplan') . "/" . $this->input->post('id_unit') . "/" . $id_kartu_keluarga . "/" . $id_pemesanan);
    }

    public function pindah($nomor_pemesanan, $id_siteplan, $id_unit) {

        $this->load->model('unit_m');
        $this->load->model('pemesanan_m');

        $data = array("status_transaksi" => "");
        $this->unit_m->edit($id_unit, $data);

        $this->unit_m->unlock($id_unit);
        $pemesanan = $this->pemesanan_m->delete_by_nup($nomor_pemesanan);



        $this->access_lib->logging("Unlock pemesanan unit : " . $data_unit->kode_unit);

//        if ($data_unit->status_unit == "Promo") {
//            if ($id_siteplan != '0') {
//                redirect('booking/siteplan_detail_promo/' . $id_siteplan);
//            } else {
//                redirect('booking/unit_lainnya_detail_promo');
//            }
//        } else {
//            if ($id_siteplan != '0') {
//                redirect('booking/siteplan_detail/' . $id_siteplan);
//            } else {
//                redirect('booking/unit_lainnya_detail_regular');
//            }
//        }

        redirect('booking');
    }

    public function cancel_pemesanan($id_unit, $id_siteplan) {
        $this->load->model('unit_m');

        $this->unit_m->unlock($id_unit);
        $data_unit = $this->unit_m->get_by_id($id_unit)->row();

        $this->access_lib->logging("Unlock pemesanan unit : " . $data_unit->kode_unit);

        if ($data_unit->status_unit == "Promo") {
            if ($id_siteplan != '0') {
                redirect('booking/siteplan_detail_promo/' . $id_siteplan);
            } else {
                redirect('booking/unit_lainnya_detail_promo');
            }
        } else {
            if ($id_siteplan != '0') {
                redirect('booking/siteplan_detail/' . $id_siteplan);
            } else {
                redirect('booking/unit_lainnya_detail_regular');
            }
        }
    }

    public function edit_pemesanan() {
        $this->access_lib->is_active_transaction();

        $this->load->model('pemesanan_m');
        $now_pemesanan = $this->pemesanan_m->get_by_id($this->input->post('id_pemesanan'))->row();
        # Untuk sales, jika status = booked dan belum di-verify
        if ($this->access_lib->_if("sal")) {
            if ($now_pemesanan->status_pemesanan != "Booked" OR $now_pemesanan->status_verify != "") {
                redirect('report/regular');
            }
        }

        $this->load->model('customer_m');
        $this->load->model('customer_ref_m');
        $this->load->model('kartu_keluarga_m');
        $this->load->model('unit_m');
        $this->load->model('timeout_m');

        if ($this->input->post('booking_fee') >= $this->input->post('tanda_jadi_real')) {
            $status_pemesanan = "Tanda Jadi";
            $data_timeout = $this->timeout_m->get_active_tanda_jadi()->row();
            $timeout = $data_timeout->timeout;
            $tanggal_tanda_jadi = $this->tanggal;
        } else {
            $status_pemesanan = "Booked";
            $data_timeout = $this->timeout_m->get_active_booking()->row();
            $timeout = $data_timeout->timeout;
            $tanggal_tanda_jadi = "";
        }

        $temp_cara_pembayaran = explode(" ", $this->input->post('cara_pembayaran'));
        $tipe_pembayaran = $temp_cara_pembayaran[0];
        $tahap_pembayaran = $temp_cara_pembayaran[1];

        # Mengupdata data pemesanan
        $data_pemesanan = array("tanggal_pemesanan" => $this->tanggal,
            "tanggal_tanda_jadi" => $tanggal_tanda_jadi,
            "status_pemesanan" => $status_pemesanan,
            "tipe_pembayaran" => $tipe_pembayaran,
            "tahap_pembayaran" => $tahap_pembayaran,
            "booking_fee" => $this->input->post('booking_fee'),
            "timeout" => $timeout,
            "id_promo" => $this->input->post('id_promo'),
            "diskon_tanah" => $this->input->post('diskon_tanah'),
            "diskon_bangunan" => $this->input->post('diskon_bangunan')
        );
        $this->pemesanan_m->edit($this->input->post('id_pemesanan'), $data_pemesanan);

        $data_unit = $this->unit_m->get_by_id($this->input->post('id_unit'))->row();
        $data_pemesanan = $this->pemesanan_m->get_by_id($this->input->post('id_pemesanan'))->row();
        $data_kartu_keluarga = $this->kartu_keluarga_m->get_kartu_keluarga_by_id_customer($data_pemesanan->id_customer)->row();

        # Mengupdata data customer
        $data_customer = array("nama_lengkap" => $this->input->post('nama_lengkap'),
            "no_ktp" => $this->input->post('no_ktp'),
            "no_npwp" => $this->input->post('no_npwp'),
            "alamat_npwp" => $this->input->post('alamat_npwp'),
            "telpon" => $this->input->post('telpon'),
            "hp" => $this->input->post('hp'),
            "email" => $this->input->post('email'),
            "alamat_ktp" => $this->input->post('alamat_ktp'),
            "alamat_surat_menyurat" => $this->input->post('alamat_surat_menyurat')
        );
        $this->customer_m->edit($data_pemesanan->id_customer, $data_customer);

        # Update / Insert Referensi Customer
        $this->customer_ref_m->save();

        # Update No Kartu Keluarga
        $this->kartu_keluarga_m->edit_kartu_keluarga(
                $data_kartu_keluarga->id_kartu_keluarga, array("no_kartu_keluarga" => $this->input->post('no_kartu_keluarga'))
        );

        # Upload File Customer
        $doc_ktp = $this->upload_dokumen("doc_ktp");
        $doc_npwp = $this->upload_dokumen("doc_npwp");
        $doc_kartu_keluarga = $this->upload_dokumen("doc_kartu_keluarga");
        $doc_akta_nikah = $this->upload_dokumen("doc_akta_nikah");
        $doc_siup = $this->upload_dokumen("doc_siup");

        $data_upload = array();
        if ($doc_ktp != "") {
            $data_upload["doc_ktp"] = $doc_ktp;
        }
        if ($doc_npwp != "") {
            $data_upload["doc_npwp"] = $doc_npwp;
        }
        if ($doc_kartu_keluarga != "") {
            $data_upload["doc_kartu_keluarga"] = $doc_kartu_keluarga;
        }
        if ($doc_akta_nikah != "") {
            $data_upload["doc_akta_nikah"] = $doc_akta_nikah;
        }
        if ($doc_siup != "") {
            $data_upload["doc_siup"] = $doc_siup;
        }
        if (!empty($data_upload)) {
            $this->customer_m->edit($data_pemesanan->id_customer, $data_upload);
        }

        # Mengupload file dokumen
        $i = 0;
        foreach ($_FILES['doc']['name'] as $filename) {
            if (!empty($_FILES['doc']['name'][$i])) {
                $file = $this->upload_dokumen_lainnya($i);

                $data = array("id_customer" => $data_pemesanan->id_customer,
                    "file_dokumen" => $file);
                $this->customer_m->add_dokumen($data);
                $i++;
            }
        }

        $this->access_lib->logging("Ubah data pemesanan : " . $data_pemesanan->nomor_pemesanan);

        redirect("booking/form_kartu_keluarga/" . $this->input->post('id_siteplan') . "/" . $this->input->post('id_unit') . "/" . $data_kartu_keluarga->id_kartu_keluarga . "/" . $this->input->post('id_pemesanan'));
    }

    # RENCANA

    public function rencana_list($id_unit, $id_pemesanan) {
        $this->load->model('unit_m');
        $this->load->model('pemesanan_m');
        $this->load->model('customer_m');
        $this->load->model('kartu_keluarga_m');
        $this->load->model('cara_pembayaran_m');

        $data['header'] = $this->header;
        $data['data_unit'] = $this->unit_m->get_by_id($id_unit)->row();
        $data['pemesanan'] = $this->pemesanan_m->get_by_id($id_pemesanan)->row();
        $data['id_unit'] = $id_unit;
        $data['id_pemesanan'] = $id_pemesanan;
        $data['data_cara_pembayaran'] = $this->cara_pembayaran_m->get_all()->result();
        $data['rencana'] = $this->pemesanan_m->get_rencana($id_pemesanan)->result();
        $data['get_rencana'] = ($this->pemesanan_m->get_jumlah_rencana($id_pemesanan)->result());
        $data['jumlah_rencana'] = count($data['get_rencana']);

        $this->load->view('booking_rencana_list_v', $data);
    }

    public function rencana($id_unit, $id_pemesanan) {
        $this->load->model('unit_m');
        $this->load->model('pemesanan_m');
        $this->load->model('customer_m');
        $this->load->model('kartu_keluarga_m');
        $this->load->model('cara_pembayaran_m');

        $data['header'] = $this->header;
        $data['data_unit'] = $this->unit_m->get_by_id($id_unit)->row();
        $data['pemesanan'] = $this->pemesanan_m->get_by_id($id_pemesanan)->row();
        $data['id_unit'] = $id_unit;
        $data['id_pemesanan'] = $id_pemesanan;
        $data['data_cara_pembayaran'] = $this->cara_pembayaran_m->get_all()->result();


        $this->load->view('booking_form_rencana_v', $data);
    }

    public function save_rencana($id_unit, $id_pemesanan) {
        if (isset($_POST['submit'])) {
            $this->load->model('unit_m');
            $this->load->model('pemesanan_m');
            $this->load->model('cara_pembayaran_m');

            # Mengupdata data rencana
            $tipe_pembayaran = $this->input->post('tipe_pembayaran');
            $tahap_pembayaran = $this->input->post('tahap_pembayaran');

            #ambil data
            $tanggal = $this->input->post('tanggal_rencana');
            $booking_fee = $this->input->post('booking_fee');
            $harga_pemesanan = $this->input->post('harga_pemesanan');
            $plafon_kpr = $this->input->post('plafon_kpr');

            $keterangan = "UANG MUKA";
            if ($tipe_pembayaran == 'Cash') {
                $besar_angsuran = ($harga_pemesanan - 20000000) / $tahap_pembayaran;
            }
            if ($tipe_pembayaran == 'KPR') {
                $kpr = harga_pemesanan * 0.4;
                $besar_angsuran = ($harga_pemesanan - $kpr - 20000000) / $tahap_pembayaran;
            }


            # generate tahap pembayaran sesuai jumlah angsuran/kpr
            for ($i = 0; $i < $tahap_pembayaran; $i++) {
                // PEMBAYARAN PERTAMA, NILAI = UANG MUKA - NILAI
                if ($i == 0) {
                    if ($tipe_pembayaran == 'Cash') {
                        $keterangan = "ANGSURAN";
                        $nilai = $besar_angsuran;
                    }
                    if ($tipe_pembayaran == 'KPR') {
                        $keterangan = "UANG MUKA";
                        $nilai = "-";
                    }
                }

                // PEMBYARAN TERAKHIR
                else if ($i == $tahap_pembayaran - 1) {

                    if ($tipe_pembayaran == 'Cash') {
                        $keterangan = "PELUNASAN";
                        $nilai = $besar_angsuran;
                    }
                    if ($tipe_pembayaran == 'KPR') {
                        $keterangan = "UANG MUKA";
                        $nilai = $plafon_kpr;
                    }
                } else {
                    $nilai = $besar_angsuran;
                    if ($tipe_pembayaran == 'Cash') {
                        $keterangan = "ANGSURAN";
                    }
                    if ($tipe_pembayaran == 'KPR') {
                        $keterangan = "UANG MUKA";
                    }
                }

                $time = strtotime($tanggal);
                $final = date("Y-m-d", strtotime("+" . $i . "month", $time));

                $data_rencana = array("id_pemesanan" => $id_pemesanan,
                    "tanggal_rencana" => $final,
                    "tipe_pembayaran" => $tipe_pembayaran,
                    "tahap_pembayaran" => $tahap_pembayaran,
                    "nilai" => $nilai,
                    "keterangan" => $keterangan
                );

                $this->pemesanan_m->save_rencana($data_rencana);
            }

            # Mengupdata data pemesanan
            $data_pemesanan = array("tanggal_pemesanan" => $this->input->post('tanggal_rencana'),
                "tipe_pembayaran" => $tipe_pembayaran,
                "tahap_pembayaran" => $tahap_pembayaran
            );

            $this->pemesanan_m->edit($id_pemesanan, $data_pemesanan);

            $data['header'] = $this->header;
            $data['data_unit'] = $this->unit_m->get_by_id($id_unit)->row();
            $data['pemesanan'] = $this->pemesanan_m->get_by_id($id_pemesanan)->row();
            $data['id_unit'] = $id_unit;
            $data['id_pemesanan'] = $id_pemesanan;
            $data['data_cara_pembayaran'] = $this->cara_pembayaran_m->get_all()->result();
            $data['rencana'] = $this->pemesanan_m->get_rencana($id_pemesanan)->result();

            redirect("booking/rencana_list/" . $id_unit . "/" . $id_pemesanan);
        }
    }

    #	Menampilkan form kartu keluarga

    public function form_kartu_keluarga($id_siteplan, $id_unit, $id_kartu_keluarga, $id_pemesanan) {
        $this->access_lib->is_active_transaction();

        $this->load->model('unit_m');
        $this->load->model('pemesanan_m');
        $this->load->model('kartu_keluarga_m');

        $data["pemesanan"] = $this->pemesanan_m->get_by_id($id_pemesanan)->row();
        $data["status"] = $data["pemesanan"]->jenis_pemesanan;
        $data['nama_promo'] = $data["pemesanan"]->nama_promo;
        $data['deskripsi'] = $data["pemesanan"]->deskripsi;

        $data['header'] = $this->header;
        $data['data_unit'] = $this->unit_m->get_by_id($id_unit)->row();
        $data['kartu_keluarga'] = $this->kartu_keluarga_m->get_kartu_keluarga_by_id($id_kartu_keluarga)->row();
        $data['id_siteplan'] = $id_siteplan;
        $data['id_unit'] = $id_unit;
        $data['id_kartu_keluarga'] = $id_kartu_keluarga;
        $data['id_pemesanan'] = $id_pemesanan;
        $data['anggota_keluarga'] = $this->kartu_keluarga_m->get_all_anggota_keluarga($id_kartu_keluarga)->result();

        $this->load->view('booking_form_kartu_keluarga_v', $data);
    }

    #	Menyimpan data anggota keluarga

    public function add_anggota_keluarga() {
        $this->access_lib->is_active_transaction();

        $this->load->model('kartu_keluarga_m');

        $data = array("id_kartu_keluarga" => $this->input->post('id_kartu_keluarga'),
            "nama_lengkap" => $this->input->post('nama_anggota_keluarga'),
            "no_ktp" => $this->input->post('no_ktp'),
            "tanggal_lahir" => $this->input->post('tanggal_lahir'),
            "bulan_lahir" => $this->input->post('bulan_lahir'),
            "tahun_lahir" => $this->input->post('tahun_lahir'),
            "npwp" => $this->input->post('npwp'),
            "hubungan_keluarga" => $this->input->post('hubungan_keluarga'),
            "status_nikah" => $this->input->post('status_kawin'));

        $id_anggota_keluarga = $this->kartu_keluarga_m->add_anggota_keluarga($data);

        redirect("booking/form_kartu_keluarga/" . $this->input->post('id_siteplan') . "/" . $this->input->post('id_unit') . "/" . $this->input->post('id_kartu_keluarga') . "/" . $this->input->post('id_pemesanan'));
    }

    # 	Menghapus data anggota keluarga

    public function delete_anggota_keluarga($id_anggota_keluarga) {
        $this->access_lib->is_active_transaction();

        $this->load->model('kartu_keluarga_m');
        $this->kartu_keluarga_m->delete_anggota_keluarga($id_anggota_keluarga);
    }

    #	Menampilkan halaman pemesanan detail

    public function pemesanan_detail($id_siteplan, $id_unit, $id_kartu_keluarga, $id_pemesanan) {
        $this->access_lib->is_active_transaction();

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
        $data['id_siteplan'] = $id_siteplan;
        $data['id_unit'] = $id_unit;
        $data['id_kartu_keluarga'] = $id_kartu_keluarga;
        $data['id_pemesanan'] = $id_pemesanan;

        $data["status"] = $data["pemesanan"]->jenis_pemesanan;
        $data['nama_promo'] = $data["pemesanan"]->nama_promo;
        $data['deskripsi'] = $data["pemesanan"]->deskripsi;

        $this->load->view('booking_form_pemesanan_preview_v', $data);
    }

    # Mengupload dokumen yang harus ada (KTP, NPWP, KK, Akta Nikah, SIUP)

    public function upload_dokumen($nama_dokumen) {
        if ($_FILES[$nama_dokumen]['name'] != "") {
            $path_parts = pathinfo($_FILES[$nama_dokumen]['name']);
            $rand_name = $this->session->userdata('id_user') . "_" . $nama_dokumen . "_" . md5(date('Y-m-d H:i:s')) . "." . $path_parts['extension'];

            move_uploaded_file($_FILES[$nama_dokumen]["tmp_name"], $this->ktp_path . "/" . $rand_name);
            $ktp = $rand_name;
        } else {
            $ktp = "";
        }

        return $ktp;
    }

    # Mengupload dokumen diluar yang formal harus diupload

    public function upload_dokumen_lainnya($i) {
        if ($_FILES['doc']['name'][$i] != "") {
            $path_parts = pathinfo($_FILES['doc']['name'][$i]);
            $rand_name = $this->session->userdata('id_user') . "_" . $i . "_" . md5(date('Y-m-d H:i:s')) . "." . $path_parts['extension'];

            move_uploaded_file($_FILES['doc']["tmp_name"][$i], $this->ktp_path . "/" . $rand_name);
            $ktp = $rand_name;
        } else {
            $ktp = "";
        }

        return $ktp;
    }

    # Generates nomor pemesanan

    public function generate_nomor_pemesanan($type) {
        $this->load->model('pemesanan_m');

        $data_pemesanan = $this->pemesanan_m->get_latest_data()->row();

        if (count($data_pemesanan) > 0) {
            $nomor_pemesanan_asal = explode("/", $data_pemesanan->nomor_pemesanan);
        } else {
            $nomor_pemesanan_asal = 0;
        }

        $nomor_pemesanan_next = (int) $nomor_pemesanan_asal[0] + 1;

        if (strlen($nomor_pemesanan_next) == 1) {
            $penambah = '000';
        } else if (strlen($nomor_pemesanan_next) == 2) {
            $penambah = '00';
        } else if (strlen($nomor_pemesanan_next) == 3) {
            $penambah = '0';
        } else {
            $penambah = '';
        }

        $bulan = "";

        if (date('m') == '01') {
            $bulan = 'I';
        } else if (date('m') == '02') {
            $bulan = 'II';
        } else if (date('m') == '03') {
            $bulan = 'III';
        } else if (date('m') == '04') {
            $bulan = 'IV';
        } else if (date('m') == '05') {
            $bulan = 'V';
        } else if (date('m') == '06') {
            $bulan = 'VI';
        } else if (date('m') == '07') {
            $bulan = 'VII';
        } else if (date('m') == '08') {
            $bulan = 'VIII';
        } else if (date('m') == '09') {
            $bulan = 'IX';
        } else if (date('m') == '10') {
            $bulan = 'X';
        } else if (date('m') == '11') {
            $bulan = 'XI';
        } else if (date('m') == '12') {
            $bulan = 'XI';
        }

        // return $penambah."".$nomor_pemesanan_next."/".$type."/".$bulan."/".date('Y');
        return $penambah . "" . $nomor_pemesanan_next;
    }

    # Generates nomor pemesanan

    public function generate_nomor_va($type) {
        $this->load->model('pemesanan_m');

        $data_pemesanan = $this->pemesanan_m->get_latest_data()->row();

        if (count($data_pemesanan) > 0) {
            $nomor_pemesanan_asal = explode("/", $data_pemesanan->nomor_pemesanan);
        } else {
            $nomor_pemesanan_asal = 0;
        }

        $nomor_pemesanan_next = (int) $nomor_pemesanan_asal[0] + 1;

        if (strlen($nomor_pemesanan_next) == 1) {
            $penambah = '000';
        } else if (strlen($nomor_pemesanan_next) == 2) {
            $penambah = '00';
        } else if (strlen($nomor_pemesanan_next) == 3) {
            $penambah = '0';
        } else {
            $penambah = '';
        }

        $bulan = "";

        if (date('m') == '01') {
            $bulan = 'I';
        } else if (date('m') == '02') {
            $bulan = 'II';
        } else if (date('m') == '03') {
            $bulan = 'III';
        } else if (date('m') == '04') {
            $bulan = 'IV';
        } else if (date('m') == '05') {
            $bulan = 'V';
        } else if (date('m') == '06') {
            $bulan = 'VI';
        } else if (date('m') == '07') {
            $bulan = 'VII';
        } else if (date('m') == '08') {
            $bulan = 'VIII';
        } else if (date('m') == '09') {
            $bulan = 'IX';
        } else if (date('m') == '10') {
            $bulan = 'X';
        } else if (date('m') == '11') {
            $bulan = 'XI';
        } else if (date('m') == '12') {
            $bulan = 'XI';
        }

        // return $penambah."".$nomor_pemesanan_next."/".$type."/".$bulan."/".date('Y');
        return "01686888" . $penambah . "" . $nomor_pemesanan_next;
    }

    # 	Mencetak form pemesanan SP

    public function print_form($id_siteplan, $id_unit, $id_kartu_keluarga, $id_pemesanan) {
        $this->load->model('unit_m');
        $this->load->model('pemesanan_m');
        $this->load->model('customer_m');
        $this->load->model('kartu_keluarga_m');
        $this->load->library('user_agent');

        $data['data_unit'] = $this->unit_m->get_by_id($id_unit)->row();
        $data['pemesanan'] = $this->pemesanan_m->get_by_id($id_pemesanan)->row();
        $data['id_siteplan'] = $id_siteplan;
        $data['id_unit'] = $id_unit;
        $data['id_kartu_keluarga'] = $id_kartu_keluarga;
        $data['id_pemesanan'] = $id_pemesanan;
        $data['rencana'] = $this->pemesanan_m->get_rencana($id_pemesanan)->result();
        $status_cetak = $this->pemesanan_m->update_status_cetak($id_pemesanan);
        
        $data['rencana'] = $this->pemesanan_m->get_rencana($id_pemesanan)->result();
        $data['get_rencana'] = ($this->pemesanan_m->get_jumlah_rencana($id_pemesanan)->result());
        $data['jumlah_rencana'] = count($data['get_rencana']);


        $this->load->view('booking_form_pemesanan_print_v', $data);
    }

    # 	Mencetak form kuitansi

    public function kuitansi_form($id_siteplan, $id_unit, $id_kartu_keluarga, $id_pemesanan) {
        $this->load->model('unit_m');
        $this->load->model('pemesanan_m');
        $this->load->model('customer_m');
        $this->load->model('kartu_keluarga_m');
        $this->load->library('user_agent');

        $data['header'] = $this->header;
        $data['data_unit'] = $this->unit_m->get_by_id($id_unit)->row();
        $data['pemesanan'] = $this->pemesanan_m->get_by_id($id_pemesanan)->row();
        $data['id_siteplan'] = $id_siteplan;
        $data['id_unit'] = $id_unit;
        $data['id_kartu_keluarga'] = $id_kartu_keluarga;
        $data['id_pemesanan'] = $id_pemesanan;

        $this->load->view('report_kuitansi_form_v', $data);
    }

    public function cetak_kuitansi($id_pemesanan) {
        $this->load->model('unit_m');
        $this->load->model('pemesanan_m');
        $this->load->model('customer_m');
        $this->load->model('kartu_keluarga_m');
        $this->load->library('user_agent');

        $data_pemesanan = $this->pemesanan_m->get_by_id($id_pemesanan)->row();
        $nomor_pemesanan = $data_pemesanan->nomor_pemesanan;
        $status_pemesanan = $data_pemesanan->status_pemesanan;
        $status_verify = $data_pemesanan->status_verify;
        $id_unit = $data_pemesanan->id_unit;

        $data = array("status_pemesanan" => "Sold",
            "tanggal_sold" => $this->tanggal);

        $this->pemesanan_m->edit($id_pemesanan, $data);

        $show_status_pemesanan = "Sold";

        $this->unit_m->update_status_transaksi($id_unit, "Sold");

        $this->access_lib->logging('Verify pemesanan : ' . $nomor_pemesanan . ' ["Tanda Jadi (Verified)" -> "Sold"]');

        $data['nomor'] = $this->input->post('nomor');
        $data['nama'] = $this->input->post('nama');
        $data['sejumlah'] = $this->input->post('sejumlah');
        $data['keterangan'] = $this->input->post('keterangan');
        $data['jumlah'] = $this->input->post('jumlah');
        $data['tanggal'] = $this->input->post('tanggal');
        $data['nama_pejabat'] = $this->input->post('nama_pejabat');
        $this->load->view('kuitansi_print', $data);
    }

    # Referensi Data Customer Diambil Dari tbl_customer_ref
    # Menampilkan semua data customer-reff berdasarkan nomor dokumen identitas

    function get_data_by_nomor_pemesanan($input_string) {
        $this->load->model('customer_ref_m');

        $data = $this->customer_ref_m->get_by_nomor_pemesanan($input_string)->result();

        foreach ($data as $data_customer) {
            echo "<div id='list_suggestion' onClick='javascript:select_suggest(" . $data_customer->nomor_pemesanan . ")'><div class='suggestion_name'>" . $data_customer->nama_lengkap . "</div>";
            echo "<div class='suggestion_number'>" . $data_customer->nomor_pemesanan . "</div></div>";
        }
    }

    # Menampilkan data customer-reff berdasarkan no_ktp
    // function get_data_customer($no_ktp) {
    // $this->load->model('customer_ref_m');
    // $data = $this->customer_ref_m->get_by_no_ktp($no_ktp)->result();
    // echo json_encode($data);
    // }

    function get_data_customer($nomor_pemesanan) {
        $this->load->model('customer_ref_m');

        $data = $this->customer_ref_m->get_by_nomor_pemesanan($nomor_pemesanan)->result();

        echo json_encode($data);
    }

}