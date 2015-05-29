<?php include "fungsi_tanggal.php";
//Format Tanggal Berbahasa Indonesia 

	// Array Hari
	$array_hari = array(1=>'Senin','Selasa','Rabu','Kamis','Jumat', 'Sabtu','Minggu');
	$hari = $array_hari[date('N')];

	//Format Tanggal 
	$tanggal = date ('j');

	//Array Bulan 
	$array_bulan = array(1=>'Januari','Februari','Maret', 'April', 'Mei', 'Juni','Juli','Agustus','September','Oktober', 'November','Desember'); 
	$bulan = $array_bulan[date('n')];
	 
	//Format Tahun 
	$tahun = date('Y');

?>
<?php include "terbilang.php"; ?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Data Pemesanan_<?php echo $pemesanan->nama_lengkap; ?>_<?php echo $pemesanan->no_va; ?>_<?php echo $data_unit->kode_unit; ?>_<?php echo $data_unit->nama_type; ?></title>
        <style type="text/css">
            body,td,th {
                font-size: 12px;
            }
            ul {
                margin-top:0px;
            }
            ul li {
                margin-left:-23px;
            }
            .header{
                text-align:center;
                font-weight:bold;

            }
            .ttd{
                float:right;

            }
            .kotak {
                border-style:solid;
                border-top-width:20px;
                border-color:rgb(225, 225, 225);}
            @page {
                size: A4;
                margin: 0;
            }
            @media screen, print{
                body {
                    font-family: verdana,sans-serif;
                    font-size: 14px;
                }
                pre {
                    font-family: verdana,sans-serif;
                    font-size: 14px;
                }
            }

        </style>
    </head>
    <body onLoad="window.print();"  bgcolor="#666666">
        <table cellpadding="0" cellspacing="0" width="275" height="28">
            <tbody>
                <tr>
                    <td width="66" height="28">
                        <table cellpadding="0" cellspacing="0" width="100%">
                            <tbody>
                                <tr>
                                    <td>
                                        <div>
                                            <p>
                                                PARAF
                                            </p>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <br/>
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="ttd">
            <p>
                Pembeli Koordinator
            </p>
            <p>
            <div class="kotak"><img src="" width="51" height="25"/></div>
            <div class="kotak"><img src="" width="51" height="25"/></div>
        </p>
        <p>
            Manager Pimpinan
        </p>
        <p>
        <div class="kotak"><img src="" width="51" height="27"/></div>
        <div class="kotak"><img src="" width="50" height="27"/></div>
    </p>
</div>
<div class="header">
    <p>
        SURAT PERSETUJUAN PEMBELIAN
    </p>
    <p>
        SATUAN RUMAH SUSUN
    </p>
    <p>
        JAYA ANCOL SEAFRONT
    </p>

    <p>
        <?php echo $pemesanan->nama_cluster; ?>
    </p>
    <p>
        Nomor : <?php echo $pemesanan->nomor_pemesanan; ?>
    </p>
</div>

<table>
    <tr>
        <td> Yang bertandatangan di bawah ini:</td>
    </tr>
    <tr>
        <td> Nama</td>
        <td> :</td>
        <td><?php echo $pemesanan->nama_lengkap; ?></td>
    </tr>
    <tr>
        <td>  Alamat KTP</td>
        <td> :</td>
        <td><?php echo $pemesanan->alamat_ktp; ?></td>
    </tr>
    <tr>
        <td> Alamat Surat Menyurat</td>
        <td> :</td>
        <td><?php echo $pemesanan->alamat_surat_menyurat; ?></td>
    </tr>
    <tr>
        <td> Nomor Telepon/HP</td>
        <td> :</td>
        <td><?php echo $pemesanan->telpon; ?> / <?php echo $pemesanan->hp; ?></td>
    </tr>
    <tr>
        <td> Nomor Virtual Account</td>
        <td> :</td>
        <td><?php echo $pemesanan->no_va; ?></td>
    </tr>
    <tr>
        <td>NPWP</td>
        <td> :</td>
        <td><?php echo $pemesanan->no_npwp; ?></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td>Untuk selanjutnya disebut <strong>"PEMBELI"</strong>.</td>
    </tr>

</table>

<p>
    Dengan ini menyetujui untuk membeli 1 (satu) unit Satuan Rumah Susun di Jaya Ancol Seafront, Marina Coast Boulevard Kav C.1H, Ancol Barat, Jakarta Utara:
</p>
<?php 
	
	$kode_unit = explode("/",$data_unit->kode_unit );
	$kode_unit_split = explode("-",$kode_unit[1] );
	$lantai = $kode_unit_split[0];
?>
<p>
    Lantai : <?php echo $lantai ?>
</p>
<p>
    Hadap : Utara / <?php echo $data_unit->nama_type; ?>
</p>
<p>
    No Unit : <?php echo $kode_unit_split[1]; ?>
</p>
<p>
    Luas Unit (Semi Gross) : <?php echo $data_unit->luas_tanah; ?> m² ( <strong><?php echo ucwords(Terbilang($data_unit->luas_tanah)); ?> meter persegi</strong>)
</p>
<table border="0" cellpadding="0" cellspacing="0" width="524">
    <tbody>
        <tr>
            <td valign="top" width="337">
                <p>
                    Jumlah Harga Unit
                </p>
            </td>
            <td valign="top" width="50">
                <p align="center">
                    : Rp.
                </p>
            </td>
            <td valign="top" width="137">
                <p align="right">
                    <?php echo number_format(round($pemesanan->harga_jual), 0); ?>
                </p>
            </td>
        </tr>

        <tr>
            <td valign="top" width="337">
                <p>
                    Potongan 0 %
                </p>
            </td>
            <td valign="top" width="50">
                <p align="center">
                    : Rp.
                </p>
            </td>
            <td valign="top" width="137">
                <p align="center">
                    0-
                </p>
            </td>
        </tr>
        <tr>
            <td valign="top" width="337">
            </td>
            <td valign="top" width="50">
            </td>
            <td valign="top" width="137">
            </td>
        </tr>
        <tr>
            <td valign="top" width="337">
                <p align="right">
                    <strong>Jumlah</strong>
                </p>
            </td>
            <td valign="top" width="50">
                <p align="center">
                    : Rp.
                </p>
            </td>
            <td valign="top" width="137">
                <p align="right">
                    <?php echo number_format(round($pemesanan->harga_jual), 0); ?>
                </p>
            </td>
        </tr>
    </tbody>
</table>
<p>
    Untuk pembelian tersebut di atas, maka PEMBELI menyetujui untuk selanjutnya bersedia mengikatkan diri terhadap PT Pembangunan Jaya Ancol Tbk (PJA) dengan
    syarat-syarat dan ketentuan berikut :
</p>
<p>
    1. Pembayaran harga Satuan Rumah Susun tersebut di atas, setuju dilaksanakan dengan cara sebagai berikut:
</p>
<table border="0" cellpadding="0" cellspacing="0" width="573">
    <tbody>
        <tr>
            <td valign="top" width="349">
                <p>
                    - Harga
                </p>
            </td>
            <td valign="top" width="50">
                <p>
                    : Rp.
                </p>
            </td>
            <td valign="top" width="175">
                <p align="right">
                   <?php echo number_format(round($pemesanan->harga_jual), 0); ?>
                </p>
            </td>
        </tr>
        <tr>
            <td valign="top" width="349">
                <p>
                    - PPN
                </p>
            </td>
            <td valign="top" width="50">
                <p>
                    : Rp.
                </p>
            </td>
            <td valign="top" width="175">
                <p align="right">
                   0
                </p>
            </td>
        </tr>
        <tr>
            <td valign="top" width="349">
                <p align="right">
                    Total Harga
                </p>
            </td>
            <td valign="top" width="50">
                <p>
                    : Rp.
                </p>
            </td>
            <td valign="top" width="175">
                <p align="right">
                    <?php echo number_format(round($pemesanan->harga_jual), 0); ?>
                </p>
            </td>
        </tr>
        <tr>
            <td valign="top" width="349">
                <p align="left">
                    - Penandatanganan KPA Tanggal «tgl_rencana_kpr»
                </p>
            </td>
            <td valign="top" width="50">
                <p>
                    : Rp.
                </p>
            </td>
            <td valign="top" width="175">
                <p align="right">
                    «nilai_kpr»
                </p>
            </td>
        </tr>
        <tr>
            <td valign="top" width="349">
                <p align="right">
                    Sisa
                </p>
            </td>
            <td valign="top" width="50">
                <p>
                    : Rp.
                </p>
            </td>
            <td valign="top" width="175">
                <p align="right">
                    «sisa_1»
                </p>
            </td>
        </tr>
        <tr>
            <td valign="top" width="349">
                <p align="left">
                    - Pembayaran Tanda Jadi, Tanggal <?php echo ubah_format_tanggal($pemesanan->tanggal_tanda_jadi, "H:i:s"); ?>
                </p>
            </td>
            <td valign="top" width="50">
                <p>
                    : Rp.
                </p>
            </td>
            <td valign="top" width="175">
                <p align="right">
                    «tanda_jadi»<?php echo number_format(round($pemesanan->booking_fee), 0); ?>
                </p>
            </td>
        </tr>
        <tr>
            <td valign="top" width="349">
                <p align="right">
                    Sisa
                </p>
            </td>
            <td valign="top" width="50">
                <p>
                    : Rp.
                </p>
            </td>
            <td valign="top" width="175">
                <p align="right">
                    «sisa_2»
                </p>
            </td>
        </tr>
    </tbody>
</table>
<p>
    Rincian Pembayaran Uang Muka/Pelunasan:
</p>
<table border="1" cellpadding="0" cellspacing="0">
    <tbody>
        <tr>
            <td valign="top" width="144">
                <p align="center">
                    Angsuran Ke-
                </p>
            </td>
            <td valign="top" width="115">
                <p align="center">
                    Bulan
                </p>
            </td>
            <td valign="top" width="151">
                <p align="center">
                    Jumlah Rupiah
                </p>
            </td>

            <td valign="top" width="151">
                <p align="center">
                    Tipe Pembayaran
                </p>
            </td>
            <td valign="top" width="161">
                <p align="center">
                    Keterangan
                </p>
            </td>
        </tr>
        <?php
        if ($rencana != "") {
            $i = 1;
            foreach ($rencana as $data_rencana) {
                ?>

                <tr bgcolor="#FFFFFF">
                    <td><div class="isi_tabel"> <?php echo $i; ?> </div></td>
                    <td><div class="isi_tabel"> <?php echo $data_rencana->tanggal_rencana; ?> </div></td>
                    <td><div class="isi_tabel"> <?php echo number_format(round($data_rencana->nilai), 0); ?> </div></td>
                    <td><div class="isi_tabel"> <?php echo $data_rencana->tipe_pembayaran; ?> </div></td>
                    <td><div class="isi_tabel"> <?php echo $data_rencana->keterangan; ?> </div></td>
                </tr>
                <?php
                $i++;
            }
        }
        ?>
    </tbody>
</table>
<p>
    Catatan : 
</p>
<p>
    
</p>
        
<ol>
    <li>Pembayaran harga Satuan Rumah susun diatas dibayarkan melalui rekening sebagai berikut:</li>
</ol>
&nbsp;

Bank                       : BCA

&nbsp;

No. Rekening               : 6350040780

&nbsp;

Atas Nama               : PT.Pembangunan Jaya Ancol

&nbsp;


Keterangan               : Lantai : <?php echo $lantai ?> No.Unit : <?php echo $kode_unit_split[1]; ?> Cicilan ke: 01

Contoh                     : Lantai : 01 No Unit : 01 Cicilan ke : 01

&nbsp;

&nbsp;

Atau rekening bank lain yang akan diberitahukan kemudian melalui surat tertulis oleh PT. PEMBANGUNAN JAYA ANCOL TBK. (PJA).

&nbsp;
<ol start="2">
    <li>Pembayaran dengan cek dan giro baru berlaku sah apabila dana telah efektif diterima oleh rekening PJA dan PJA telah menerima tanda bukti transfer dari PEMBELI dan telah menerbitkan kuitansi yang sah atas penerimaan uang atas nama PEMBELI yang tercantum dalam Surat Persetujuan Pembelian ini. Pembayaran ke rekening PJA dengan menyebutkan Nomor Unit Satuan Rumah Susun.</li>
</ol>
&nbsp;

Segala pembayaran tunai atau ke nomor rekening lain yang bukan atas nama PJA adalah tidak diakui dan tidak berharga. Oleh karena itu segala akibat dari pembayaran yang dilakukan secara tunai atau dilakukan ke nomor rekening yang bukan atas nama PJA dan/atau pembayaran yang tidak menyebutkan nama PEMBELI dan Nomor Unit, dinyatakan tidak berlaku dan tidak mengikat terhadap PJA serta menjadi tanggungan PEMBELI sepenuhnya.

&nbsp;
<ol start="3">
    <li>Setiap keterlambatan pembayaran atas butir 1 di atas, maka atas tiap-tiap hari keterlambatan, PEMBELI setuju untuk dikenakan denda 1‰ (satu permil) per hari dari jumlah kewajiban yang harus dibayar, denda mana akan dihitung dari setiap pembayaran yang telah jatuh tempo hingga denda maksimal mencapai 3% (tiga persen). Dalam hal keterlambatan pembayaran telah mencapai denda maksimal dan PEMBELI belum melakukan kewajiban pembayaran berikut denda-dendanya, maka Surat Persetujuan Pembelian ini menjadi batal demi hukum.</li>
</ol>
&nbsp;
<ol start="4">
    <li>PEMBELI bersedia dan mengikatkan diri kepada PJA untuk menandatangani Perjanjian Pengikatan Jual Beli (PPJB) Satuan Rumah Susun selambat-lambatnya dalam waktu 14 (empat belas) hari setelah tanggal undangan penandatanganan PPJB. Dalam hal PEMBELI tidak atau belum menandatangani Perjanjian Pengikatan Jual Beli Satuan Rumah Susun dalam waktu yang ditetapkan, maka PJA dapat membatalkan Surat Persetujuan Pembelian ini.</li>
</ol>
&nbsp;
<ol start="5">
    <li>Surat Persetujuan Pembelian ini bukan merupakan surat berharga ataupun surat bukti kepemilikan atas Satuan Rumah Susun, sehingga PEMBELI dilarang untuk mengalihkan, menghibahkan, memperjualbelikan, dan/atau menjaminkan Surat Persetujuan Pembelian ini atau hak atas Satuan Rumah Susun ini kepada pihak manapun dan dengan cara apapun. Dalam hal PEMBELI melakukannya, maka Surat Persetujuan Pembelian ini menjadi batal demi hukum.</li>
</ol>
&nbsp;
<ol start="6">
    <li>Apabila PEMBELI dalam membayar harga Satuan Rumah Susun tersebut mempergunakan fasilitas Kredit Pemilikan Apartemen (KPA), maka wajib menggunakan fasilitas KPA dari Bank rekanan PJA dan untuk itu PEMBELI wajib melengkapi persyaratan KPA dan memperoleh Surat Persetujuan Kredit (SPK) dari Bank tersebut selambat-lambatnya 30 (tiga puluh) hari sebelum tanggal jatuh tempo penandatanganan KPA. Bila PEMBELI gagal melengkapi persyaratan KPA dalam waktu yang telah ditetapkan yang berakibat tidak diperolehnya Surat Persetujuan Kredit (SPK) dari Bank dan/atau proses permohonan KPA tersebut ditolak oleh pihak Bank dan PEMBELI tidak dapat melakukan pembayaran secara tunai kepada PJA, maka Surat Persetujuan Pembelian ini menjadi batal dan akan dikenakan biaya administrasi sebesar 3% (tiga persen) dari total harga transaksi sebelum PPN. Pajak dan bea yang sudah dibayarkan tidak dapat dikembalikan dan PEMBELI membebaskan PJA dari segala macam kewajiban pembayaran ganti rugi, bunga ataupun biaya-biaya</li>
</ol>
&nbsp;

&nbsp;

&nbsp;
<ol start="7">
    <li>Apabila kemudian terjadi perubahan nilai KPA, maka PEMBELI bersedia membayar seluruh kekurangan nilai KPA selambat-lambatnya 14 (empat belas) hari sejak saat penyerahan SPK baru. Keterlambatan dalam pembayaran tersebut akan dikenakan denda 1‰ (satu permil) perhari hingga denda maksimal mencapai 3% (tiga persen). Dalam hal keterlambatan pembayaran telah mencapai denda maksimal dan PEMBELI belum melakukan kewajiban pembayaran berikut denda-dendanya, maka Surat Persetujuan Pembelian ini menjadi batal demi</li>
</ol>
<strong> </strong>
<ol start="8">
    <li>Luas unit Satuan Rumah Susun yang tercantum pada Surat Persetujuan ini dihitung dari garis sumbu dinding batas unit. Apabila terjadi perbedaan luas unit yang tercantum dalam sertipikat sarusun yang dibuat oleh Kantor Badan Pertanahan Nasional wilayah Jakarta Utara akibat adanya perbedaan metode perhitungan luas, maka PEMBELI tidak akan memperhitungkan kembali harga jual beli dan tidak akan saling mengadakan tuntutan dalam bentuk apapun kepada PJA.</li>
</ol>
<strong> </strong>
<ol start="9">
    <li>Perubahan ke tipe dan nomor unit lain hanya diperkenankan selambat-lambatnya 1 (satu) bulan sejak pembayaran tanda jadi dan hanya untuk perubahan kepada tipe dengan nilai yang lebih besar. Harga transaksi baru berlaku sesuai dengan harga pada saat perubahan tersebut dilaksanakan, pajak dan bea yang sudah dibayarkan untuk transaksi terdahulu tidak dapat diperhitungkan dan harus dibayarkan kembali.</li>
</ol>
<strong> </strong>
<ol start="10">
    <li>Penyelesaian Unit Satuan Rumah Susun selambat-lambatnya empat puluh delapan bulan (48) sejak ditandatanganinya Perjanjian Pengikatan Jual Beli (PPJB) dan masa grace period selama dua belas (12) bulan , kecuali karena hal-hal yang disebabkan oleh peristiwa Force</li>
</ol>
<strong> </strong>
<ol start="11">
    <li>Dalam hal Surat Persetujuan Pembelian menjadi batal atau dibatalkan sebagaimana diatur dalam Surat Persetujuan Pembelian ini, maka PJA dan PEMBELI sepakat untuk mengesampingkan pasal 1266 dan 1267 Kitab Undang-Undang Hukum Perdata (KUHPerdata) dan atas pembayaran yang telah dilakukan oleh PEMBELI akan dikenakan biaya administrasi sebesar 20% (dua puluh persen) dari nilai transaksi ditambah kewajiban-kewajiban terhutang (jika ada) atau jika pembayaran belum mencapai 20% (dua puluh persen) maka seluruh pembayaran yang telah dilakukan tidak dapat dikembalikan. Proses pengembalian dilakukan selambat-lambatnya dalam waktu 30 (Tiga puluh) hari sejak Para Pihak menyelesaikan dokumen pembatalan. Pajak dan bea yang sudah dibayarkan tidak dapat dikembalikan dan PEMBELI membebaskan PJA dari segala macam kewajiban pembayaran ganti rugi, bunga ataupun biaya-biaya lainnya.</li>
</ol>
<strong> </strong>
<ol start="12">
    <li>Alamat PEMBELI di atas adalah benar dan segala administrasi surat-menyurat mempergunakan alamat dan nomor telepon di atas. Perubahan alamat wajib diinformasikan kepada PJA melalui Bagian Penagihan Unit Pemasaran, selambat-lambatnya 3 (tiga) hari sejak perubahan alamat tersebut dilakukan. Segala akibat yang timbul atas kelalaian memberikan informasi tentang perubahan alamat tersebut menjadi tanggung jawab PEMBELI termasuk tapi tidak terbatas pada dapat dibatalkannya secara sepihak Surat Persetujuan Pembelian ini oleh PJA.</li>
</ol>
<strong> </strong>
<ol start="13">
    <li>Transaksi pada butir 1 di atas belum termasuk biaya Akta Jual Beli (AJB), Biaya Balik Nama (BBN), Bea Perolehan Hak Atas Tanah dan Bangunan (BPHTB) serta biaya lainnya sesuai dengan peraturan yang berlaku. Segala kekurangan biaya antara lain, AJB, BBN dan BPHTB serta pajak-pajak dan biaya lainnya yang mengalami perubahan dan/atau penyesuaian akibat peraturan yang saat ini berlaku maupun yang timbul di kemudian hari harus dilunasi selambat-lambatnya 30 (tiga puluh) hari sebelum AJB ditandatangani.</li>
</ol>
<strong> </strong>
<ol start="14">
    <li>Terhitung sejak tanggal dilakukannya penandatanganan Surat Persetujuan Pembelian, maka segala pajak, iuran, dan beban lain yang terhutang atas Satuan Rumah Susun yang dipungut oleh instansi yang berwenang dan/atau oleh PJA, termasuk tapi tidak terbatas pada Pajak Bumi dan Bangunan (PBB) menjadi beban dan tanggung jawab PEMBELI sepenuhnya. Khusus Iuran Pengelolaan Gedung/Service Charge dan Shinking Fund, sebelum terbentuknya Perhimpunan Pemilik dan Penghuni Satuan Rumah Susun (PPPSRS), maka akan ditentukan dan dipungut oleh PJA dan wajib dibayarkan oleh PEMBELI kepada PJA sejak serah terima unit Satuan Rumah Susun antara PJA dengan PEMBELI.</li>
</ol>
<strong> </strong>
<ol start="15">
    <li>Terhitung sejak tanggal penandatanganan Surat Persetujuan Pembelian ini, PEMBELI bersedia memenuhi biaya dan kewajiban sesuai dengan peraturan yang dikeluarkan oleh PJA berkaitan dengan unit Satuan Rumah Susun yang dibeli oleh PEMBELI.</li>
</ol>
<strong> </strong>
<ol start="16">
    <li>PJA dan PEMBELI sepakat untuk melakukan penandatanganan Surat Persetujuan Pembelian ini sebelum dilaksanakannya pembangunan Satuan Rumah Susun JAYA ANCOL SEAFRONT dan berjanji satu sama lain untuk tidak melakukan tuntutan dan/atau gugatan dalam bentuk apapun di kemudian hari berkaitan dengan penandatanganan Surat Persetujuan Pembelian ini.</li>
</ol>
<table style="height: 348px;" width="820">
<tbody>
<tr>
<td width="289">
<p style="text-align: center;"></p>
<p style="text-align: center;"></p>
<br />
<br />
<p style="text-align: center;">Menyetujui,</p>
<p style="text-align: center;">Pembeli</p>
</td>
<td width="289">
<p style="text-align: center;"><strong>Jakarta, </strong><strong><?php echo $tanggal ." ". $bulan ." ". $tahun;?></strong></p>
<p style="text-align: center;"> Mengetahui</p>
<p style="text-align: center;">PT. PEMBANGUNAN JAYA ANCOL TBK</p>
</td>
</tr>
<tr>
<td width="289"><strong> </strong>

<strong> </strong>

<strong> </strong>

<strong> </strong>

<strong> </strong>
<p style="text-align: center;">(<?php echo $pemesanan->nama_lengkap; ?>)</p>
<p style="text-align: center;"><strong> </strong></p>
</td>
<td width="289">&nbsp;

&nbsp;

&nbsp;
<p style="text-align: center;"> ( Roysan Aruan)</p>
<p style="text-align: center;">GM Property 1</p>
</td>
</tr>
</tbody>
</table>
</body>
</html>
