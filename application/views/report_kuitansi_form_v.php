<?php
$disabled = '';
if (!$this->access_lib->_if("adm,mgr")) {
    $disabled = 'disabled="disabled"';
}
?>
<?php include "fungsi_tanggal.php"; ?>
<?php echo $header; ?>


<script type="text/javascript">

    $(document).ready(function ()
    {
        $(function () {
            $("#datepicker").datepicker({dateFormat: 'dd-mm-yy'})
        });

        var cssObj = {'box-shadow': '#888 5px 10px 10px',
            '-webkit-box-shadow': '#888 5px 10px 10px',
            '-moz-box-shadow': '#888 5px 10px 10px'};
        $("#suggestions").css(cssObj);

        $("input").blur(function () {
            $('#suggestions').fadeOut();
        });

        // otomatis keterangan
        $('#jumlah').on('keyup', function (e) {

            // e.preventDefault();
            jumlah = document.getElementById('jumlah').value;
            jumlah = jumlah.replace(/[^0-9.]/g, '');
            jumlah = (jumlah == '') ? 0 : parseFloat(jumlah);
            sejumlah = terbilang(jumlah);
            document.getElementById('sejumlah').value = terbilang(jumlah);
            ;

            kode_unit = "<?php echo $data_unit->kode_unit ?>";
            lantai_split = kode_unit.split("/");
            lantai = lantai_split[1].split("-");
            hadap = "<?php echo $data_unit->nama_type ?>";
            tipe = "<?php echo $data_unit->kategori ?> ";
            tower = lantai_split[0];

            keterangan = 'Booking Fee Oseana Condominium Jaya Ancol Seafront \nTower '
                    + tower + ' Lantai ' + lantai[0] + ' Nomor ' + lantai[1] + ' Hadap ' + hadap + ' Blok ' + kode_unit + ' (TYPE ' + tipe + ') \nRp. '
                    + tandaPemisahTitik(jumlah) + ',-' +
                    '\nPPN : Rp. ,-';
            document.getElementById('keterangan').value = keterangan;
            return false;
        });

    });


    function keterangan() {
        // $('#jumlah').on('load', function(e) {

        // e.preventDefault();
        jumlah = document.getElementById('jumlah').value;
        jumlah = jumlah.replace(/[^0-9.]/g, '');
        jumlah = (jumlah == '') ? 0 : parseFloat(jumlah);
        sejumlah = terbilang(jumlah);
        document.getElementById('sejumlah').value = terbilang(jumlah);
        ;

        kode_unit = "<?php echo $data_unit->kode_unit ?>";
        lantai_split = kode_unit.split("/");
        lantai = lantai_split[1].split("-");
        hadap = "<?php echo $data_unit->nama_type ?>";
        tipe = "<?php echo $data_unit->kategori ?> ";
        tower = lantai_split[0];

        keterangan = 'Booking Fee Oseana Condominium Jaya Ancol Seafront \nTower '
                + tower + ' Lantai ' + lantai[0] + ' Nomor ' + lantai[1] + ' Hadap ' + hadap + ' Blok ' + kode_unit + ' (TYPE ' + tipe + ') \nRp. '
                + tandaPemisahTitik(jumlah) + ',-' +
                '\nPPN : Rp. ,-';
        document.getElementById('keterangan').value = keterangan;
        // return false;
        // });
    }
    function lookup(inputString) {
        if (inputString.length == 0) {
            $('#suggestions').fadeOut();
        } else {
            $.post("<?php echo base_url(); ?>booking/get_data_by_no_ktp/" + inputString, function (data) {
                $('#suggestions').fadeIn();
                $('#suggestions').html(data);
            });
        }
    }

    function select_suggest(id)
    {
        $('#suggestions').fadeOut();
        $.post(base_url + 'booking/get_data_customer/' + id, function (data) {
            var obj = JSON.parse(data);

            $('#nama_lengkap').val(obj[0].nama_lengkap);
            $('#no_ktp').val(obj[0].no_ktp);
            $('#no_npwp').val(obj[0].no_npwp);
            $('#alamat_npwp').val(obj[0].alamat_npwp);
            $('#telpon').val(obj[0].telpon);
            $('#hp').val(obj[0].hp);
            $('#email').val(obj[0].email);
            $('#alamat_ktp').val(obj[0].alamat_ktp);
            $('#alamat_surat_menyurat').val(obj[0].alamat_surat_menyurat);
            $('#no_kartu_keluarga').val(obj[0].no_kartu_keluarga);
        });
    }


    function isNumberKey(evt)
    {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
        {
            return false;
        }

        return true;
    }

</script>

<style type="text/css">
    #suggestions
    {
        position: absolute;
    }
    #list_suggestion
    {
        width: 250px;
        background-color: #FFF;
        cursor: pointer;
    }
    #list_suggestion:hover
    {
        background-color: #CAE4FA;
    }
    .suggestion_name
    {
        padding: 5px 5px 0 5px; 
        font-size: 12px; 
        color:#0B77D6; 
    }
    .suggestion_number
    {
        padding: 3px 5px 5px 5px; 
        font-size:11px; 
        border-bottom: 1px #DDD solid; 
    }

</style>


</head>
<body onload="keterangan()">

    <?php
    # Load profile
    $this->load->view('top_profile_v');

    # Load menu dashboard
    $this->load->view('menu_v');
    ?>

    <div id="frame_data">

        <div class="margin_center" style="width:1000px">
            <div class="header_data">Data Unit Dipesan</div>	
            <div class="frame_tabel radius transparent">	
               <table width="100%" cellspacing="1px" cellpadding="2px" bgcolor="#CCCCCC">
                    <tr bgcolor="#FFFFFF">
                        <td width="70" rowspan="3" class="header_tabel_cust"><div style="color:#FFF; text-align:center;">Kategori</div></td>
                        <td width="100" rowspan="3" class="header_tabel_cust"><div style="color:#FFF; text-align:center;">Unit</div></td>
                        <td width="100" rowspan="3" class="header_tabel_cust"><div style="color:#FFF; text-align:center;">Hadap</div></td>
                        <td width="60" rowspan="3" class="header_tabel_cust"><div style="color:#FFF; text-align:center;">Status</div></td>
                        <td rowspan="2" colspan="2"class="header_tabel_cust"><div style="color:#FFF; text-align:center;">Luas (M2)</div></td>
                        <td width="150" rowspan="3" class="header_tabel_cust"><div style="color:#FFF; text-align:center;">Harga Pemesanan</div></td>
                        <td width="150" rowspan="3" class="header_tabel_cust"><div style="color:#FFF; text-align:center;">Harga Cash Keras</div></td>
                         <td width="70" rowspan="3" class="header_tabel_cust"><div style="color:#FFF; text-align: center;">Booking Fee</div></td>
                           <td width="70" rowspan="3" class="header_tabel_cust"><div style="color:#FFF; text-align: center;">CB 36X</div></td>
                        <td width=""  rowspan="3" class="header_tabel_cust"><div style="color:#FFF; text-align: center;">CB 48X</div></td>
                         <td width="70" rowspan="3" class="header_tabel_cust"><div style="color:#FFF; text-align: center;">KPA 36x 40% </div></td>
                    </tr>
                    <tr bgcolor="#FFFFFF">
                       
                       
                       
                    </tr>
                    <tr bgcolor="#FFFFFF">
                        <td width="40" class="header_tabel_cust"><div style="color:#FFF; text-align: center;">Tanah</div></td>
                        <td width="40" class="header_tabel_cust"><div style="color:#FFF; text-align: center;">Bangunan</div></td>
                      
                    </tr>			

                    <tr class="hover">
                        <td><div class="isi_tabel"> <?php echo $data_unit->kategori; ?> </div></td>
                        <td><div class="isi_tabel nowrap"><?php echo "<font color='blue'>".  $data_unit->kode_unit. "</font>"; ?></div></td>
                        <td><div class="isi_tabel"> <?php echo $data_unit->nama_type . " " . $data_unit->posisi; ?> </div></td>
                        <td align="center">
                            <div class="isi_tabel"> 				

                                <?php
                                if ($data_unit->status_transaksi == "Booked") {
                                    echo "<font color='green'>" . $data_unit->status_transaksi . "</font>";
                                } else {
                                    echo "<font color='red'>" . $data_unit->status_transaksi . "</font>";
                                }
                                ?> 

                            </div>					
                        </td>
                        <td align="center"><div class="isi_tabel"> <?php echo $data_unit->luas_tanah; ?> </div></td>
                        <td align="center"><div class="isi_tabel"> <?php echo $data_unit->luas_bangunan; ?> </div></td>
                        <td align="right"><div class="isi_tabel"> <?php echo number_format(round($pemesanan->harga_jual), 0); ?> </div></td>
                        <td align="right"><div class="isi_tabel"> <?php echo number_format(round($data_unit->harga_jual_inc_ppn), 0); ?> </div></td>
                        <td align="right"><div class="isi_tabel"> <?php echo number_format(round($data_unit->tanda_jadi), 0); ?> </div></td>                        
                        <td align="right"><div class="isi_tabel"> <?php echo number_format(round($data_unit->kpr_5_tahun), 0); ?> </div></td>
                        <td align="right"><div class="isi_tabel"> <?php echo number_format(round($data_unit->kpr_10_tahun), 0); ?> </div></td>
                        <td align="right"><div class="isi_tabel"> <?php echo number_format(round($data_unit->plafon_kpr), 0); ?> </div></td>
                    </tr>
                </table>
            </div>
            <div class="clear" style="height:40px;"></div>

            <div class="header_data">Form Kuitansi</div>
            <div class="tombol_tambah">
                <a href="<?php echo base_url(); ?>report/regular"><input type="button" value="&laquo; Kembali"></a>
            </div>

            <style type="text/css">
                #td-height td { height:32px; }
            </style>

            <div class="frame_tabel radius transparent" style="width:1003px" id="td-height">
                <form action="<?php echo base_url(); ?>booking/cetak_kuitansi/<?php echo $pemesanan->id_pemesanan; ?>" target="_blank" method="post" id="form"  enctype="multipart/form-data" name="pemesanan">
                    <table class="t-popup">

                        <tr>
                            <td width="100">Nomor</td><td>:</td>
                            <td><input type="text" name="nomor" id="nomor" size="20" value="<?php echo $pemesanan->nomor_pemesanan; ?> / GL / V / 2015"></td>
                        </tr>
                        <tr>
                            <td>Telah Terima Dari</td><td>:</td>
                            <td colspan="2"><input type="text" name="nama" id="nama" size="50" value="<?php echo $pemesanan->nama_lengkap; ?>"></td>
                        </tr>
                        <tr>
                            <td>Sejumlah Uang</td><td>:</td>
                            <td colspan="2"><input type="text" name="sejumlah" id="sejumlah" size="98"  style="text-transform:uppercase" readonly="readonly"> </td>
                        </tr>
                        <tr>
                            <td>Untuk Pembayaran</td><td>:</td>
                            <td colspan="2"><textarea name="keterangan" id="keterangan" rows="6" cols="100" readonly="readonly"></textarea></td>
                        </tr>
                    </table>
                    <table class="t-popup">
                        <tr>
                            <td>Jumlah Rp. : <input type="text" name="jumlah" id="jumlah" size="15" value="<?php echo $pemesanan->booking_fee; ?>"></td>	
                            <td>Jakarta, <input  type="date" name="tanggal" id="datepicker" size="15" value="<?php echo date('d-m-Y') ?>"></td>
                            <td>Nama Pejabat <input id="nama_pejabat" type="text" name="nama_pejabat" size="25" value="<?php echo $this->session->userdata('nama_lengkap'); ?>"></td>
                        </tr>
                    </table>

                    <div class="clear"><br><br></div>

                    <table width="1000px" cellspacing="1px" cellpadding="2px" bgcolor="#CCCCCC" style="float:left">
                        <tr bgcolor="#FFFFFF">
                            <td bgcolor="#FFFFFF" align="right">
                                <span class="required_star" style="float:left;margin-top:5px;">* Harus Diisi</span>								
                                <input type="submit" id="print" value=" Print " onclick="return alert('Unit ini berhasil SOLD!');" >	
                            </td>
                        </tr>
                        </td>
                        </tr>
                    </table>

                </form>
            </div>
        </div>
        <div class="clear" style="height:40px;"></div>
    </div>

</body>
</html>		