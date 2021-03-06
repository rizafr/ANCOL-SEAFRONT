<?php include "fungsi_tanggal.php"; ?>
<?php include "terbilang.php"; ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Print_SP_<?php echo $pemesanan->nomor_pemesanan; ?>_<?php echo $pemesanan->nama_lengkap; ?></title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>files/css/sp.css">
    </head>
    <body onload="window.print()">
        <div id = "spp">
            <table width="100%" border="0" class = 'pad'>
                <tr>
                    <td width="70%">
                        <div>
                            <a id ="kata_spp">SURAT PERSETUJUAN PEMBELIAN (SPP)</a><br/>
                            <a id ="kata_no">No.</a>
                        </div>		
                    </td>
                    <td width="10%" align = "right"><img src="<?php echo base_url() ?>files/images/header_oseana.jpg" id = 'logo_seafront_gambar'/></td>
                    <td width="1%" align="right"><img src="<?php echo base_url() ?>files/images/header_ancol.jpg" id = 'logo_ancol_gambar'/></td>
                </tr>
            </table>
            <table border="0" width="100%" class = 'pad'>
                <tr>
                    <td class = "blok_persetujuan color">
                        <a class="kata_persetujuan">LEMBAR PRSETUJUAN PEMBELIAN * WAJIB DIISI DENGAN HURUF BESAR DAN LENGKAP</a><br/>
                        <a class="kata_persetujuan">SECTION A : YANG BERTANDA TANGAN DIBAWAH INI :</a>
                    </td>
                </tr>
            </table>
            <table width="100%" border="0" cellspacing="0" class="pad kata_profil">
                <tr>
                    <td width="70%" class = "header_pembeli"><a>Nama Pembeli</a></td>
                    <td width="10%"></td>
                    <td width="20%"><a>No Urut Pembeli</a></td>
                </tr>
                <tr>
                    <td height="5"></td>
                </tr>
                <tr>
                    <td class="garis_isian"><a><?php echo ucwords($pemesanan->nama_lengkap) ?></a></td>
                    <td></td>
                    <td class="garis_isian"><a><?php echo ucwords($pemesanan->nomor_pemesanan) ?></a></td>
                </tr>
            </table>

            <table width="70%" border="0" cellspacing="0" class="pad kata_profil">
                <tr>
                    <td width="50%"><a>Alamat Sesuai KTP</a></td>
                    <td width="20%"><a>No NPWP</a></td>
                </tr>
                <tr>
                    <td height="5"></td>
                </tr>
                <tr>
                    <td class="garis_isian"><a><?php echo ucwords($pemesanan->alamat_ktp); ?></a></td>
                    <td class="garis_isian"><a><?php echo $pemesanan->no_npwp; ?></a></td>
                </tr>
            </table>

            <table width="70%" border="0" cellspacing="0" class="pad kata_profil">
                <tr>
                    <td width="23%"><a>Telepon(R)</a></td>
                    <td width="22%"><a>(HP)</a></td>
                    <td width="23%"><a>(K)</a></td>
                    <td width="22%"><a>(F)</a></td>
                </tr>
                <tr>
                    <td height="5"></td>
                </tr>
                <tr>
                    <td class="garis_isian"><a><?php echo $pemesanan->telpon; ?></a></td>
                    <td class="garis_isian"><a> <?php echo $pemesanan->hp; ?></a></td>
                    <td class="garis_isian"><a></a></td>
                    <td class="garis_isian"><a></a></td>
                </tr>
            </table>

            <table width="70%" border="0" cellspacing="0" class="pad kata_profil">
                <tr>
                    <td width="25%"><a>No Identitas (KTP/SIM/KIMS)</a></td>
                    <td width="25%"><a>Tanggal Lahir :(Tgl/Bln/Thn)</a></td>
                    <td width="20%"><a>Email</a></td>
                </tr>
                <tr>
                    <td height="5"></td>
                </tr>
                <tr>
                    <td class="garis_isian"><a> <?php echo $pemesanan->no_ktp; ?></a></td>
                    <td class="garis_isian"><a></a></td>
                    <td class="garis_isian"><a> <?php echo $pemesanan->email; ?></a></td>
                </tr>
            </table>

            <table width="70%" border="0" cellspacing="0" class="pad kata_profil">
                <tr>
                    <td><a>Alamat Korespondensi</a></td>
                </tr>
                <tr>
                    <td height="5"></td>
                </tr>
                <tr>
                    <td class="garis_isian"><a><?php echo ucwords($pemesanan->alamat_surat_menyurat); ?></a></td>
                </tr>
            </table>

            <table width="100%" border="0" cellspacing="0" class="pad kata_profil">
                <tr>
                    <td class="garis_pembatas">&nbsp;</td>
                </tr>
                <tr>
                    <td><a>Selanjutnya disebut "PEMBELI" dengan hal ini sepakat untuk membeli Satuan Unit dari "DEVELOPER" dan "PEMBELI" tunduk pada ketentuan-ketentuan pembelian sebagai tercantum di balik Surat Persetujuan Pembelian ini dan di halaman ini.</a></td>
                </tr>
            </table>

            <table border="0" width="100%" class = 'pad'>
                <tr>
                    <td class = "blok_persetujuan color" >
                        <a class="kata_persetujuan">SECTION B : SATUAN UNIT YANG DIBELI ("UNIT PEMBELIAN") PERHITUNGAN "HARGA JUAL" UNIT PEMBELIAN ADALAH SEBAGAI BERIKUT :</a>
                    </td>
                </tr>
            </table>
            <?php
            $kode_unit = explode("/", $data_unit->kode_unit);
            $kode_unit_split = explode("-", $kode_unit[1]);
            $lantai = $kode_unit_split[0];
            $unit = $kode_unit_split[1];
            ?>
            <table width="100%" border="0" cellspacing="0" class="pad kata_profil">
                <tr>
                    <td width="15%"><a>1. Tower</a></td>
                    <td width="2%"></td>
                    <td width="18%" class="garis_isian"><a><?php echo $kode_unit[0] ?></a></td>
                    <td width="2%"></td>
                    <td width="20%"><a>Harga Sarusun Bersih</a></td>
                    <td width="2%"></td>
                    <td width="19%" class="garis_isian"><a><?php echo number_format($data_unit->harga_jual_inc_ppn * 90 / 100, 0) ?></a></td>
                    <td width="2%"></td>
                    <td width="20%"><a>Cara Bayar</a></td>
                </tr>
                <tr>
                    <td><a>2. No Unit</a></td>
                    <td></td>
                    <td class="garis_isian"><a><?php echo $unit ?></a></td>
                    <td></td>
                    <td><a>PPN 10%</a></td>
                    <td></td>
                    <td class="garis_isian"><a><?php echo number_format($data_unit->harga_jual_inc_ppn * 10 / 100, 0) ?></a></td>
                    <td></td>
                    <td class="garis_isian"><a> <?php
                            if ($pemesanan->tipe_pembayaran == 'Cash') {
                                $tipe = 'CB';
                            } else {
                                $tipe = 'KPA';
                            }

                            echo $tipe . " " . $pemesanan->tahap_pembayaran . " X";
                            ?></a></td>
                </tr>
                <tr>
                    <td>3. Lantai</td>
                    <td></td>
                    <td class="garis_isian"><a><?php echo $lantai ?></a></td>
                    <td></td>
                    <td><a></a></td>
                    <td></td>
                    <td class="garis_isian"><a></a></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td><a>4. Luas Unit Semigross</a></td>
                    <td></td>
                    <td class="garis_isian"><a><?php echo $data_unit->luas_tanah ?></a></td>
                    <td></td>
                    <td><a>Terbilang</a></td>
                    <td></td>
                    <td><i></i></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>

            <table border="0" width="100%" class = 'pad'>
                <tr>
                    <td class = "blok_persetujuan color">
                        <a class="kata_persetujuan">SECTION C : CARA PEMBAYARAN UNIT PEMBELIAN & SELANJUTNYA PEMBELI  BERJANJI MENYELESAIKAN PEMBAYARAN</a>
                    </td>
                </tr>
            </table>
            <table border="0" width="100%" class="pad kata_profil perjanjian" cellspacing="0">
                <tr>
                    <td valign="top">1. </td>
                    <td>Selanjutnya saya menyatakan bahwa uang sebesar Rp. 20.000.000,- (Dua Puluh Juta Rupiah) menjadi booking fee untuk pembelian unit diatas dan menjadi NON REFUNDABLE</td>
                </tr>
                <tr>
                    <td valign="top">2. </td>
                    <td>Apabila Booking Fee tersebut belum diterima manajemen selambat-lambatnya pada Rabu Juni 2015, Surat Persetujuan Pembelian ini akan BATAL dengan sendirinya dan unit yang dipilihakan dijual kembali. 
                    </td>
                </tr>
                <tr>
                    <td valign="top">3. </td>
                    <td>Pembayaran untuk Booking Fee, DP (Down Payment), Cicilan, Pelunasan, Denda dan semua biaya lainnya dapat dibayar kan ke : 
                    </td>
                </tr>
            </table>

            <table border="0" class="pad kata_profil perjanjian" cellspacing="0">
                <tr>
                    <td>VIRTUAL ACCOUNT BCA  : 01686888 </td>
                    <td> [No.Lantai]</td>
                    <td> [No Unit]</td>
                </tr>
                <tr>
                    <td></td>
                    <td align="center">2 Digit</td>
                    <td align="center">2 Digit</td>
                </tr>
                <tr>
                    <td colspan="3">Jika ingin melakukan pembayaran untuk Unit 1 di Lantai 1</td>
                </tr>
                <tr>
                    <td colspan="3">Contoh : 016868800101</td>
                </tr>
                <tr>
                    <td colspan="3">Semua pembayaran hanya dapat dilakukan secara transfer ke rekening diatas</td>
                </tr>
            </table>

            <table border="0" width="100%" class="pad kata_profil perjanjian" cellspacing="0">
                <tr>
                    <td valign="top">4. </td>
                    <td>Serah terima unit : </td>
                </tr>
                <tr>
                    <td valign="top">5. </td>
                    <td>Dengan ditandatangani oleh Pembeli, maka Pembeli menyatakan sudah membaca, mengetahui, mengerti dan menyetujui seluruh ketentuan dihalaman ini dan halaman belakang berikut semua lampirannya.</td>
                </tr>
            </table>
            <br/>
            <table cellspacing="0" width="100%" border="0" class="kata_profil pad ttd">
                <tr>
                    <td width="35%" class="border_table"><a>Pembeli</a></td>
                    <td width="35%" class="border_table" colspan="2">PT. GRAHA KIRANA DEVELOPMENT</a></td>
                    <td width="30%" class="border_table"><a>PT. PEMBANGUNAN JAYA ANCOL TBK</a></td>
                </tr>
                <tr>
                    <td height="50" class="border_table"></td>
                    <td class="border_table"></td>
                    <td class="border_table"></td>
                    <td class="border_table"></td>
                </tr>
                <tr>
                    <td class="border_table"><?php echo $pemesanan->nama_lengkap; ?></td>
                    <td class="border_table">&nbsp;<br/>&nbsp;<br/>Sales / Agent</td>
                    <td class="border_table">&nbsp;<br/>&nbsp;<br/>GM Properti 1</td>
                    <td class="border_table">&nbsp;<br/>Nicke Putri<br/>Manager Marketing</td>
                </tr>
            </table>
            <table width="100%" cellspacing="0" class="kata_profil pad">
                <tr>
                    <td><a>PERHATIAN :</a></td>
                </tr>
                <tr>
                    <td><a>Seluruh Informasi Pemesanan di Surat Pemesanan Unit wajib diisi dengan lengkap, jelas dan benar jika tidak, maka surat pemesanan tidak dapat diproses lebih lanjut dan dikembalikan. Apabila ada kesalahan data diatas mohon segera sampaikan kepada</a></td>
                </tr>
            </table>
            <br/>
            <div class = 'pad kata_footer'>
                <a class = 'kata_footer'>PT. PEMBANGUNAN JAYA ANCOL, TBK</a><br/>
                <a class='kata_footer'>DEPARTEMEN PROPERTI 1</a><br/>
                <a class = 'kata_footer'>Jaya Ancol Seafront</a><br/>
                <a class='kata_footer'>Marina Coast Boulevard Kav. C1-H</a><br/>
                <a class='kata_footer'>Ancol Barat - Jakarta Utara 14430</a><br/>
            </div>
            <br/>
        </div>
        <br/>
        <div id="table">
            <div class = "blok_persetujuan pad color">
                <a class="kata_persetujuan">Rincian Pembayaran</a>
            </div>
            <a class = "keterangan pad_kpr"> 
                <?php
                if ($pemesanan->tipe_pembayaran == 'Cash') {
                    $tipe = 'CB';
                } else {
                    $tipe = 'KPA';
                }

                echo $tipe . " " . $pemesanan->tahap_pembayaran . " X";
                ?>
            </a>
            <table class="kata_profil pad_kpr ttd" id = 'table_kpr' width="55%" cellspacing="0" >
                <tr>
                    <td width="15%" class="border_table">Keterangan</td>
                    <td width="15%" class="border_table">Tanggal JT</td>
                    <td width="15%" class="border_table">Rupiah</td>
                    <td width="10%" class="kata_profil">Catatan :</td>
                </tr>
                <tr bgcolor="#FFFFFF">
                    <td class="border_table"> Booking Fee </td>
                    <td class="border_table"> 30 Mei 2015 </td>
                    <td class="border_table"> 20.000.000 </td>
                </tr>
                <?php
                if ($jumlah_rencana > 0) {
                    $i = 1;
                    $total = $pemesanan->booking_fee;
                    foreach ($rencana as $data_rencana) {
                        ?>

                        <tr bgcolor="#FFFFFF">
                            <td class="border_table"> Angsuran-<?php echo $i; ?> </div></td>
                            <td class="border_table"> <?php echo ubah_format_tanggal($data_rencana->tanggal_rencana, "") ?></td>
                            <td class="border_table"> <?php echo number_format(round($data_rencana->nilai), 0); ?> </td>
                            <?php $total += $data_rencana->nilai; ?>
                        </tr>

                        <?php
                        $i++;
                    }
                    ?>
                    <tr bgcolor="#FFFFFF">
                        <td colspan="2" class="border_table"> Total</td>
                        <td class="border_table"> <?php echo number_format(round($total), 0); ?> </td>
                    </tr>
                <?php }
                ?>
                <tr>
                    <td>&nbsp;</td>
                </tr>
            </table>
        </div>
        <div id= "halaman_belakang" class="kata_profil">
            <div class = "blok_persetujuan pad color">
                <a class="kata_persetujuan">Surat Perjanjian</a>
            </div>
            <div id = 'kiri'>
                <ol>
                    <li>Pembayaran harga Satuan Rumah susun diatas dibayarkan melalui rekening sebagai berikut: 
                        <table>
                            <tr>
                                <td>VIRTUAL ACCOUNT BCA  : 01686888</td>
                                <td>[No.Lantai]</td>
                                <td>[No Unit]</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>2 Digit</td>
                                <td>2 Digit</td>
                            </tr>
                        </table>
                        <a>Jika ingin melakukan pembayaran untuk Unit 1 di Lantai 1</a><br/>
                        <a>Contoh : 016868800101</a><br/><br/>
                        <a>Atau rekening bank lain yang akan diberitahukan kemudian melalui surat tertulis oleh PT. PEMBANGUNAN JAYA ANCOL TBK. (PJA).</a>
                    </li>
                    <br/>
                    <li>Pembayaran dengan cek dan giro baru berlaku sah apabila dana telah efektif diterima oleh rekening PJA dan PJA telah menerima tanda bukti transfer dari PEMBELI dan telah menerbitkan kuitansi yang sah atas penerimaan uang atas nama PEMBELI yang tercantum dalam Surat Persetujuan Pembelian ini. Pembayaran ke rekening PJA dengan menyebutkan Nomor Unit satuan rumah susun.<br/>Segala pembayaran tunai atau ke nomor rekening lain yang bukan atas nama PJA adalah tidak diakui dan tidak berharga. Oleh karena itu segala akibat dari pembayaran yang dilakukan secara tunai atau dilakukan ke nomor rekening yang bukan atas nama PJA dan/atau pembayaran yang tidak menyebutkan nama PEMBELI dan Nomor Unit, dinyatakan tidak berlaku dan tidak mengikat terhadap PJA serta menjadi tanggungan PEMBELI sepenuhnya.
                    </li>
                    <br/>
                    <li>Setiap keterlambatan pembayaran atas butir 1 di atas, maka atas tiap-tiap hari keterlambatan, PEMBELI setuju untuk dikenakan denda 1‰ (satu permil) per hari dari jumlah kewajiban yang harus dibayar, denda mana akan dihitung dari setiap pembayaran yang telah jatuh tempo hingga denda maksimal mencapai 3% (tiga persen). Dalam hal keterlambatan pembayaran telah mencapai denda maksimal dan PEMBELI belum melakukan kewajiban pembayaran berikut denda-dendanya, maka Surat Persetujuan Pembelian ini menjadi batal demi hukum.
                    </li>
                    <br/>
                    <li>PEMBELI bersedia dan mengikatkan diri kepada PJA untuk menandatangani Perjanjian Pengikatan Jual Beli (PPJB) Satuan Rumah Susun selambat lambatnya dalam waktu 14 (empat belas) hari setelah tanggal undangan penandatanganan PPJB. Dalam hal PEMBELI tidak atau belum menandatangani Perjanjian Pengikatan Jual Beli Satuan Rumah Susun dalam waktu yang ditetapkan, maka PJA dapat membatalkan Surat Persetujuan Pembelian ini.</li>
                    <br/>
                    <li>Surat Persetujuan Pembelian ini bukan merupakan surat berharga ataupun surat bukti kepemilikan atas Satuan Rumah Susun, sehingga PEMBELI dilarang untuk mengalihkan, menghibahkan, memperjualbelikan, dan/atau menjaminkan Surat Persetujuan Pembelian ini atau hak atas Satuan Rumah Susun ini kepada pihak manapun dan dengan cara apapun. Dalam hal PEMBELI melakukannya, maka Surat Persetujuan Pembelian ini menjadi batal demi hukum.</li>
                    <br/>
                    <li>Apabila PEMBELI dalam membayar harga Satuan Rumah Susun tersebut mempergunakan fasilitas Kredit Pemilikan Apartemen (KPA), maka wajib menggunakan fasilitas KPA dari Bank rekanan PJA dan untuk itu PEMBELI wajib melengkapi persyaratan KPA dan memperoleh Surat Persetujuan Kredit (SPK) dari Bank tersebut selambat-lambatnya 30 (tiga puluh) hari sebelum tanggal jatuh tempo penandatanganan KPA. Bila PEMBELI gagal melengkapi persyaratan KPA dalam waktu yang telah ditetapkan yang berakibat tidak diperolehnya Surat Persetujuan Kredit (SPK) dari Bank dan/atau proses permohonan KPA tersebut ditolak oleh pihak Bank maka PEMBELI wajib melanjutkan pembayaran secara tunai ke PJA. Adapun PEMBELI melakukan batal sepihak, maka akan dikenakan sesuai dengan Pasal 11 Surat Persetujuan Pembelian. Pajak dan bea yang sudah dibayarkan tidak dapat dikembalikan dan PEMBELI membebaskan PJA dari segala macam kewajiban pembayaran ganti rugi, bunga ataupun biaya-biaya lainnya.</li>
                    <br/>
                    <li>Apabila kemudian terjadi perubahan nilai KPA, maka PEMBELI bersedia membayar seluruh kekurangan nilai KPA selambat-lambatnya 14 (empat belas) hari sejak saat penyerahan SPK baru. Keterlambatan dalam pembayaran tersebut akan dikenakan denda 1‰ (satu permil) perhari hingga denda maksimal mencapai 3% (tiga persen). Dalam hal keterlambatan pembayaran telah mencapai denda maksimal dan PEMBELI belum melakukan kewajiban pembayaran berikut denda-dendanya, maka Surat Persetujuan Pembelian ini menjadi batal demi hukum.</li>
                    <br/>
                    <li>Luas unit Satuan Rumah Susun yang tercantum pada Surat Persetujuan ini dihitung dari garis sumbu dinding batas unit. Apabila terjadi perbedaan luas unit yang tercantum dalam sertipikat sarusun yang dibuat oleh Kantor Badan Pertanahan Nasional wilayah Tangerang akibat adanya perbedaan metode perhitungan luas, maka PEMBELI tidak akan memperhitungkan kembali harga jual beli dan tidak akan saling mengadakan tuntutan dalam bentuk apapun kepada PJA.</li>
                    <br/>
                </ol>
            </div>
            <div id='kanan'>
                <ol start="9">
                    <li>Perubahan ke tipe dan nomor unit lain hanya diperkenankan selambat lambatnya 1 (satu) bulan sejak pembayaran tanda jadi dan hanya untuk perubahan kepada tipe dengan nilai yang lebih besar. Harga transaksi baru berlaku sesuai dengan harga pada saat perubahan tersebut dilaksanakan pajak dan bea yang sudah dibayarkan untuk transaksi terdahulu tidak dapat diperhitungkan dan harus dibayarkan kembali.</li>	
                    <br/>
                    <li>Penyelesaian Unit Satuan Rumah Susun selambat-lambatnya empat buluh delapan bulan (48) sejak ditandatanganinya Perjanjian Awal Ikatan Jual Beli (PAIB) dan masa grace period selama dua belas (12) bulan , kecuali karena hal-hal yang disebabkan oleh peristiwa Force Majeur.
                    </li>	
                    <br/>
                    <li>Dalam hal Surat Persetujuan Pembelian menjadi batal atau dibatalkan sebagaimana diatur dalam Surat Persetujuan Pembelian ini, maka PJA dan PEMBELI sepakat untuk mengesampingkan pasal 1266 dan 1267 Kitab Undang-Undang Hukum Perdata (KUHPerdata) dan atas pembayaran yang telah dilakukan oleh PEMBELI akan dikenakan biaya administrasi sebesar 20% (dua puluh persen) dari nilai transaksi ditambah kewajiban-kewajiban terhutang (jika ada) atau jika pembayaran belum mencapai 20% (dua puluh persen) maka seluruh pembayaran yang telah dilakukan tidak dapat dikembalikan. Proses pengembalian dilakukan selambat-lambatnya dalam waktu 30 (Tiga puluh) hari sejak Para Pihak menyelesaikan dokumen pembatalan. Pajak dan bea yang sudah dibayarkan tidak dapat dikembalikan dan PEMBELI membebaskan PJA dari segala macam kewajiban pembayaran ganti rugi, bunga ataupun biaya-biaya lainnya.
                    </li>	
                    <br/>
                    <li>Alamat PEMBELI di atas adalah benar dan segala administrasi surat-menyurat mempergunakan alamat dan nomor telepon di atas.Perubahan alamat wajib diinformasikan kepada PJA melalui Bagian Penagihan Unit Pemasaran, selambat-lambatnya 3 (tiga) hari sejak perubahan alamat tersebut dilakukan. Segala akibat yang timbul atas kelalaian memberikan informasi tentang perubahan alamat tersebut menjadi tanggung jawab PEMBELI termasuk tapi tidak terbatas pada dapat dibatalkannya secara sepihak Surat Persetujuan Pembelian ini oleh PJA.</li>
                    <br/>
                    <li>Transaksi pada butir 1 di atas belum termasuk biaya Akta Jual Beli (AJB), Biaya Balik Nama (BBN), Bea Perolehan Hak Atas Tanah dan Bangunan BPHTB) serta biaya lainnya sesuai dengan peraturan yang berlaku. Segala kekurangan biaya antara lain, AJB, BBN dan BPHTB serta pajak-pajak dan biaya lainnya yang mengalami perubahan dan/atau penyesuaian akibat peraturan yang saat ini berlaku maupun yang timbul di kemudian hari harus dilunasi selambat-lambatnya 30 (tiga puluh) hari sebelum AJB ditandatangani.
                    </li>	
                    <br/>	
                    <li>Transaksi pada butir 1 di atas belum termasuk biaya Akta Jual Beli (AJB), Biaya Balik Nama (BBN), Bea Perolehan Hak Atas Tanah dan Bangunan BPHTB) serta biaya lainnya sesuai dengan peraturan yang berlaku. Segala kekurangan biaya antara lain, AJB, BBN dan BPHTB serta pajak-pajak dan biaya lainnya yang mengalami perubahan dan/atau penyesuaian akibat peraturan yang saat ini berlaku maupun yang timbul di kemudian hari harus dilunasi selambat-lambatnya 30 (tiga puluh) hari sebelum AJB ditandatangani.</li>
                    <br/>
                    <li>Terhitung sejak tanggal dilakukannya penandatanganan Surat Persetujuan Pembelian, maka segala pajak, iuran, dan beban lain yang terhutang atas Satuan Rumah Susun yang dipungut oleh instansi yang berwenang dan/atau oleh PJA, termasuk tapi tidak terbatas pada Pajak Bumi dan Bangunan (PBB) menjadi beban dan tanggung jawab PEMBELI sepenuhnya. Khusus Iuran Pengelolaan Gedung/Service Charge dan Shinking Fund, sebelum terbentuknya Perhimpunan Pemilik dan Penghuni Satuan Rumah Susun (PPPSRS), maka akan ditentukan dan dipungut oleh PJA dan wajib dibayarkan oleh PEMBELI kepada PJA sejak serah terima unit Satuan Rumah Susun antara PJA dengan PEMBELI.
                    </li>
                    <br/>
                    <li>Terhitung sejak tanggal penandatanganan Surat Persetujuan Pembelian ini, PEMBELI bersedia memenuhi biaya dan kewajiban sesuai dengan peraturan yang dikeluarkan oleh PJA berkaitan dengan unit Satuan Rumah Susun yang dibeli oleh PEMBELI.

                    </li>
                    <br/>	
                </ol>
            </div>
        </div>
    </body>
</html>
