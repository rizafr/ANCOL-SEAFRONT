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
                        <td width="70" rowspan="3" class="header_tabel_cust"><div style="color:#FFF; text-align: center;">Booking Fee</div></td>
                        <td width="70" rowspan="3" class="header_tabel_cust"><div style="color:#FFF; text-align: center;">CB 36X</div></td>
                        <td width=""  rowspan="3" class="header_tabel_cust"><div style="color:#FFF; text-align: center;">CB 48X</div></td>
                        <td width="70" rowspan="3" class="header_tabel_cust"><div style="color:#FFF; text-align: center;">KPA 24x 40% </div></td>
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
                        <td><div class="isi_tabel nowrap"><?php echo "<font color='blue'>" . $data_unit->kode_unit . "</font>"; ?></div></td>
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
                        <td align="right"><div class="isi_tabel"> <?php echo number_format(round($data_unit->kpr_15_tahun), 0); ?> </div></td>
                        <td align="right"><div class="isi_tabel"> <?php echo number_format(round($data_unit->kpr_10_tahun), 0); ?> </div></td>
                        <td align="right"><div class="isi_tabel"> <?php echo number_format(round($data_unit->plafon_kpr), 0); ?> </div></td>
                    </tr>
                </table>
            </div>
            <div class="clear" style="height:40px;"></div>

            <div class="header_data">Rencana</div>
            <div class="tombol_tambah">
                <a href="<?php echo base_url(); ?>booking/rencana_list/<?php echo $id_unit . "/" . $id_pemesanan; ?>"><input type="button" value="&laquo; Kembali"></a>
            </div>	

            <style type="text/css">
                #td-height td { height:19px; }
            </style>

            <div class="frame_tabel radius transparent" style="width:1002px" id="td-height">		
                <form id="form" name="form" method="post" action="<?php echo base_url(); ?>booking/save_rencana/<?php echo $id_unit . "/" . $id_pemesanan; ?>" onSubmit="return post(this, <?php echo $posisi; ?>);">
                    <table width="500px" cellspacing="1px" cellpadding="2px" bgcolor="#CCCCCC" style="float:left">				

                        <tr bgcolor="#FFFFFF">
                            <td bgcolor="#999999"><div class="isi_tabel"><strong>Total Harga</strong></div></td>
                            <td align="right">
                                <div class="isi_tabel">
                                    <input type="text" name="harga_pemesanan" value="<?php echo $pemesanan->harga_jual; ?>">
                                    <input type="hidden" name="plafon_kpr" value="<?php echo (round($data_unit->plafon_kpr)); ?>">
                                </div>
                            </td>
                        </tr>

                        <tr bgcolor="#FFFFFF">
                            <td bgcolor="#999999"><div class="isi_tabel"><strong>Booking Fee</strong></div></td>
                            <td align="right">
                                <div class="isi_tabel">
                                    <input type="text" name="booking_fee" value="20000000">
                                </div>
                            </td>
                        </tr>


                        <tr bgcolor="#FFFFFF">
                            <td width="200" bgcolor="#999999"><div class="isi_tabel"><strong></strong><strong>Cara Pembayaran<span class="required_star">*</span></strong></div></td>
                            <td>
                                <div class="isi_tabel">
                                    <input type="text" name="tipe_pembayaran" value="<?php echo $pemesanan->tipe_pembayaran; ?>" readonly="readonly">
                                    <input type="text" name="tahap_pembayaran" value="<?php echo $pemesanan->tahap_pembayaran; ?>" readonly="readonly">
                                </div>
                            </td>
                        </tr>

                        <tr bgcolor="#FFFFFF">
                            <td bgcolor="#999999"><div class="isi_tabel"><strong>Tanggal Rencana</strong></div></td>
                            <td align="right">
                                <div class="isi_tabel">
                                    <?php
                                    $tanggal = 15;                                  
                                    $tahun = date('Y');
                                    $tanggal_sekarang = date('d');
                                    
                                    if ($tanggal_sekarang > $tanggal) {
                                        $tambah_tanggal = mktime(0, 0, 0, date('m') + 1); // nambah 1 bulan dari tanggal sekarang
                                        $tambah = date('Y-m-d', $tambah_tanggal);
                                        $array1 = explode("-", $tambah);
                                       
                                        $bulan = $array1[1];
                                         $bulan = date('F',mktime(0,0,0,$bulan,10));
                                        $tanggal_rencana = "$bulan $tanggal $tahun";
                                    } else {
                                          $bulan = date('F');
                                        $tanggal_rencana = "$bulan $tanggal $tahun";
                                    }
                                    $d = strtotime($tanggal_rencana);
                                   
                                    ?>
                                    
                                    <input type="text" name="tanggal_rencana" id="datepicker1" value="<?php echo date("Y-m-d", $d); ?>">
                                </div>
                            </td>
                        </tr>

                        <tr bgcolor="#FFFFFF">
                            <td bgcolor="#999999"><div class="isi_tabel"><strong>Keterangan</strong></div></td>
                            <td align="right">
                                <div class="isi_tabel">
                                    <textarea name="keterangan"></textarea>
                                </div>
                            </td>
                        </tr>
                        <tr>	
                            <td>
                                <div class="isi_tabel">
                                    <input type="submit" name="submit" value="Simpan &#10003;">
                                </div>
                            </td>
                        </tr>
                    </table>
                </form>


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