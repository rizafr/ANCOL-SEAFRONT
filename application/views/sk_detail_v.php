<?php include "fungsi_tanggal.php"; ?>

<script type="text/javascript">
$(document).ready(function(){
	
		$(".header_unit").click(function(){
			
			$(".detail_unit").hide();
			var id_unit = $(this).attr("id");
			$("#det_" + id_unit).fadeIn();
		});
		
});
</script>

<div class="margin_center" style="width:1000px">		
	<div class="header_data">Detail sk</div>
	<div class="tombol_tambah">
		<a href="" onClick="javascript:list_data(<?php echo $posisi; ?>); return false;"><input type="button" value="&laquo; Kembali"></a>
	</div>
	
	<div class="frame_tabel radius transparent">
		<table width="500px" cellspacing="1px" cellpadding="2px" bgcolor="#CCCCCC">
			<tr bgcolor="#FFFFFF">
				<td width="150px" bgcolor="#999999" class="isi_tabel"><strong>Nama sk</strong></td>
				<td width="450px"><div class="isi_tabel"><?php echo $sk->nama_sk; ?></div></td>
			</tr>	
			<tr bgcolor="#FFFFFF">
				<td bgcolor="#999999"><div class="isi_tabel"><strong>Persentase Kenaikan</strong></div></td>
				<td><div class="isi_tabel"><?php echo $sk->persentase_kenaikan; ?></div></td>
			</tr>
			
			<tr bgcolor="#FFFFFF">
				<td bgcolor="#999999"><div class="isi_tabel"><strong>Persentase Penurunan</strong></div></td>
				<td><div class="isi_tabel"><?php echo $sk->persentase_penurunan; ?></div></td>
			</tr>	
			
			<tr bgcolor="#FFFFFF">
				<td bgcolor="#999999"><div class="isi_tabel"><strong>Rentang NUP</strong></div></td>
				<td><div class="isi_tabel"><?php echo $data_sk->nup_awal."-".$data_sk->nup_akhir; ?></div></td>
			</tr>			
			<tr bgcolor="#FFFFFF">
				<td bgcolor="#999999"><div class="isi_tabel"><strong>Status</strong></div></td>
				<td><div class="isi_tabel"><?php 
							if($sk->status == "1") 
							{
								echo "<font color='green'>Aktif</font>";
							}
							else if($sk->status == "0")
							{
								echo "<font color='red'>Tidak Aktif</font>";
							}
							?> </div></td>
			</tr>			
				
			<tr bgcolor="#FFFFFF">
				<td valign="top" bgcolor="#999999"><div class="isi_tabel"><strong>Deskripsi</strong></div></td>
				<td><div class="isi_tabel"><?php echo $sk->deskripsi; ?></div></td>
			</tr>
		</table>
	</div>
	
	<div class="clear" style="height:40px;"></div>
</div>