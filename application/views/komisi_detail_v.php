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
	<div class="header_data">Detail komisi</div>
	<div class="tombol_tambah">
		<a href="" onClick="javascript:list_data(<?php echo $posisi; ?>); return false;"><input type="button" value="&laquo; Kembali"></a>
	</div>
	
	<div class="frame_tabel radius transparent">
		<table width="500px" cellspacing="1px" cellpadding="2px" bgcolor="#CCCCCC">
			<tr bgcolor="#FFFFFF">
				<td width="150px" bgcolor="#999999" class="isi_tabel"><strong>Nama komisi</strong></td>
				<td width="450px"><div class="isi_tabel"><?php echo $komisi->nama_komisi; ?></div></td>
			</tr>	
			<tr bgcolor="#FFFFFF">
				<td bgcolor="#999999"><div class="isi_tabel"><strong>Persentase</strong></div></td>
				<td><div class="isi_tabel"><?php echo $komisi->persentase; ?></div></td>
			</tr>			
				
			<tr bgcolor="#FFFFFF">
				<td valign="top" bgcolor="#999999"><div class="isi_tabel"><strong>Deskripsi</strong></div></td>
				<td><div class="isi_tabel"><?php echo $komisi->deskripsi; ?></div></td>
			</tr>
		</table>
	</div>
	
	<div class="clear" style="height:40px;"></div>
</div>