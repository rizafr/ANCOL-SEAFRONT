<?php include "fungsi_tanggal.php"; ?>
<?php echo $header; ?>



</head>
<body>

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
                        <td colspan="6" class="header_tabel_cust"><div style="color:#FFF; text-align:center;">KPR (Asumsi Suku Bunga <?php echo $data_unit->suku_bunga; ?>%)</div></td>
                    </tr>
                    <tr bgcolor="#FFFFFF">
                        <td width="70" rowspan="2" class="header_tabel_cust"><div style="color:#FFF; text-align: center;">Tanda Jadi</div></td>
                        <td width="70" rowspan="2" class="header_tabel_cust"><div style="color:#FFF; text-align: center;">Uang Muka</div></td>
                        <td width="70" rowspan="2" class="header_tabel_cust"><div style="color:#FFF; text-align: center;">Plafon KPR</div></td>
                        <td width="70" colspan="3" class="header_tabel_cust"><div style="color:#FFF; text-align: center;">Angsuran</div></td>
                    </tr>
                    <tr bgcolor="#FFFFFF">
                        <td width="40" class="header_tabel_cust"><div style="color:#FFF; text-align: center;">Tanah</div></td>
                        <td width="40" class="header_tabel_cust"><div style="color:#FFF; text-align: center;">Bangunan</div></td>
                        <td width="70" class="header_tabel_cust"><div style="color:#FFF; text-align: center;">CB 36X</div></td>
                        <td width="" class="header_tabel_cust"><div style="color:#FFF; text-align: center;">CB 48X</div></td>
                    </tr>			

                    <tr class="hover">
                        <td><div class="isi_tabel"> <?php echo $data_unit->kategori; ?> </div></td>
                        <td><div class="isi_tabel nowrap"> <?php echo $data_unit->kode_unit; ?> </div></td>
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

                            </div>					</td>
                        <td align="center"><div class="isi_tabel"> <?php echo $data_unit->luas_tanah; ?> </div></td>
                        <td align="center"><div class="isi_tabel"> <?php echo $data_unit->luas_bangunan; ?> </div></td>
                        <td align="right"><div class="isi_tabel"> <?php echo number_format(round($pemesanan->harga_jual), 0); ?> </div></td>
                        <td align="right"><div class="isi_tabel"> <?php echo number_format(round($data_unit->harga_jual_inc_ppn), 0); ?> </div></td>
                        <td align="right"><div class="isi_tabel"> <?php echo number_format(round($data_unit->tanda_jadi), 0); ?> </div></td>
                        <td align="right"><div class="isi_tabel"> <?php echo number_format(round($data_unit->uang_muka), 0); ?> </div></td>
                        <td align="right"><div class="isi_tabel"> <?php echo number_format(round($data_unit->plafon_kpr), 0); ?> </div></td>
                        <td align="right"><div class="isi_tabel"> <?php echo number_format(round($data_unit->kpr_5_tahun), 0); ?> </div></td>
                        <td align="right"><div class="isi_tabel"> <?php echo number_format(round($data_unit->kpr_10_tahun), 0); ?> </div></td>
                    </tr>

                   

                </table>
            </div>
            <div class="clear" style="height:40px;"></div>

            <div class="header_data">Rencana</div>
            <div class="tombol_tambah">
                <a href="<?php echo base_url(); ?>report/regular_detail/<?php echo $id_unit . "/" . $pemesanan->id_kartu_keluarga . "/" . $id_pemesanan; ?>"><input type="button" value="&laquo; Kembali"></a>
                <a href="<?php echo base_url(); ?>booking/print_form/0/<?php echo $id_unit . "/" . $pemesanan->id_kartu_keluarga . "/" . $id_pemesanan; ?>" target="_blank"><input type="button" value="Print &#9113;"></a>
<?php if ($jumlah_rencana > 1) {
    
} else { ?><a href="<?php echo base_url(); ?>booking/rencana/<?php echo $id_unit . "/" . $id_pemesanan; ?>"><input type="button" value="Tambah Rencana"></a><?php } ?>
            </div>	

            <style type="text/css">
                #td-height td { height:19px; }
            </style>

            <div class="frame_tabel radius transparent" style="width:1002px" id="td-height">		
                <table width="100%" cellspacing="1px" cellpadding="2px" bgcolor="#CCCCCC" style="float:left">				

                    <tr bgcolor="#FFFFFF">
                        <td bgcolor="#999999"><div class="isi_tabel"><strong>Angsuran Ke-</strong></div></td>
                        <td bgcolor="#999999"><div class="isi_tabel"><strong>Tanggal Jatuh Tempo</strong></div></td>
                        <td bgcolor="#999999"><div class="isi_tabel"><strong>Besar Cicilan</strong></div></td>
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
                            </tr>
                            <?php
                            $i++;
                        }
                    }
                    ?>
                </table>


            </div>
            <div class="clear" style="height:40px;"></div>



        </div>
    </div>
    <div class="clear" style="height:40px;"></div>
</div>

</body>
</html>

<script type="text/javascript">
    $(function () {
        $("#datepicker1").datepicker();
    });

</script>			