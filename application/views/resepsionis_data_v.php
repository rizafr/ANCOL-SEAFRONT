<?php include "fungsi_tanggal.php"; ?>
<link href="<?php echo base_url(); ?>files/advanced-datatable/media/css/jquery.dataTables_themeroller.css" rel="stylesheet" />
<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>files/advanced-datatable/media/js/jquery.dataTables.js"></script>


<div class="margin_center" style="width:85%;">
    <div class="header_data">Daftar Tamu</div>


    <div class="clear"></div>
    <div class="adv-table">

        <section id="unseen">
            <table id="example" class="display" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>NUP</th>
                        <th>Nama Pemesan</th>
                        <th>No. KTP</th>
                        <th>HP</th>
                        <th>eMail</th>
                        <th>Alamat</th>
                        <th>Status Kehadiran</th>
                        <?php
                        if ($this->access_lib->_if("adm,mgr,ksr")) {
                            echo "<th>Status Transaksi</th>";
                        }
                        ?>
                        <th>Waktu Kehadiran</th>
                        <?php
                        if ($this->access_lib->_if("adm,mgr,res")) {
                            echo "	<th>Verifikasi Kehadiran</th> ";
                        }
                        ?>
                        <?php
                        if ($this->access_lib->_if("adm,mgr,ksr")) {
                            echo "<th>Transaksi</th>";
                        }
                        ?>
                    </tr>
                </thead>

                <tfoot>
                    <tr>
                        <th>NUP</th>
                        <th>Nama Pemesan</th>
                        <th>No. KTP</th>
                        <th>HP</th>
                        <th>eMail</th>
                        <th>Alamat</th>
                        <th>Status Kehadiran</th>
                        <?php
                        if ($this->access_lib->_if("adm,mgr,ksr")) {
                            echo "<th>Status Transaksi</th>";
                        }
                        ?>
                        <th>Waktu Kehadiran</th>
                        <?php
                        if ($this->access_lib->_if("adm,mgr,res")) {
                            echo "	<th>Verifikasi Kehadiran</th> ";
                        }
                        ?>
                        <?php
                        if ($this->access_lib->_if("adm,mgr,ksr")) {
                            echo "<th>Transaksi</th>";
                        }
                        ?>

                    </tr>
                </tfoot>

                <tbody>
                    <?php
                    foreach ($pemesanan as $data_pemesanan) {
                        ?>

                        <tr>
                            <td> <?php echo $data_pemesanan->nomor_pemesanan; ?></td>
                            <td> <?php echo $data_pemesanan->nama_lengkap; ?></td>
                            <td> <?php echo $data_pemesanan->no_ktp; ?></td>
                            <td> <?php echo $data_pemesanan->hp; ?></td>
                            <td> <?php echo $data_pemesanan->email; ?></td>
                            <td> <?php echo substr($data_pemesanan->alamat_surat_menyurat, 0, 50); ?></td>		
                            <td>
                                <div id="status_kehadiran_<?php echo $data_pemesanan->nomor_pemesanan; ?>">
                                    <?php if ($data_pemesanan->status_kehadiran == '1') { ?>
                                        <img src="<?php echo base_url(); ?>files/images/ceklis.png">
                                        <?php
                                    } else {
                                        
                                    }
                                    ?>
                                </div>
                            </td>	
                            <?php
                            if ($this->access_lib->_if("adm,mgr,ksr")) {
                                ?>
                                <td>
                                    <div id="status_transaksi_<?php echo $data_pemesanan->nomor_pemesanan; ?>">
                                        <?php if ($data_pemesanan->status_transaksi == '1') { ?>
                                            <img src="<?php echo base_url(); ?>files/images/ceklis.png">
                                            <?php
                                        } else {
                                            
                                        }
                                        ?>
                                    </div>
                                </td>	
                            <?php } ?>
                            <td> 
                                <div id="waktu_kehadiran_<?php echo $data_pemesanan->nomor_pemesanan; ?>">
                                    <?php echo ubah_format_tanggal($data_pemesanan->waktu_kehadiran, "H:i:s"); ?>
                                </div>
                            </td>
                            <?php
                            if ($this->access_lib->_if("adm,mgr,res")) {
                                ?>
                                <td align="center">
                                    <?php if ($data_pemesanan->status_kehadiran == '0') { ?>
                                        <a href="javascript:void(0);" title="Verify" onClick="javascript:verify(<?php echo $data_pemesanan->nomor_pemesanan; ?>);
                                                            return false;">
                                            <div class="isi_tabel">
                                                <input type="button" id="kehadiran_<?php echo $data_pemesanan->nomor_pemesanan; ?>" value="OK">
                                            </div>
                                        </a>
                                        <?php
                                    } else {
                                        
                                    }
                                    ?>
                                </td>
                            <?php } ?>
                            <?php
                            if ($this->access_lib->_if("adm,mgr,ksr")) {
                                ?>
                                <td align="center">
                                    <?php if ($data_pemesanan->status_transaksi == '0') { ?>
                                        <a href="javascript:void(0);" title="transaksi"  onClick="javascript:transaksi(<?php echo $data_pemesanan->nomor_pemesanan; ?>,<?php echo $data_pemesanan->nomor_pemesanan; ?>);
                                                            return false;">
                                            <div class="isi_tabel">
                                                <input type="button" class="transaksi" id="transaksi_<?php echo $data_pemesanan->nomor_pemesanan; ?>"   value="OK">
                                            </div>
                                        </a>
                                        <?php
                                    } else {
                                        
                                    }
                                    ?>
                                </td>
                            <?php } ?>


                        </tr>
                        <?php
                    }
                    ?>
                </tbody>

            </table>
        </section>
    </div>
    <div class="clear"></div>


</div>


<script type="text/javascript" charset="utf-8">
    $(document).ready(function () {
        $('#example').dataTable({
            "aaSorting": [[0, "asc"]]
        });
    });
</script>	
