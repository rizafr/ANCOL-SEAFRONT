<?php include "fungsi_tanggal.php"; ?>

<div class="margin_center" style="width:1000px">		
	<div class="header_data">Data komisi</div>
	<div class="tombol_tambah">
		<?php
		if ($this->access_lib->_if("adm,stk"))
		{
			?>
			<a href="" onClick="javascript:add(<?php echo $posisi; ?>); return false;"><input type="button" value="Tambah Data &#43;"></a>
			<?php
		}
		?>
		
	</div>
	<div class="frame_tabel radius transparent">
		<table width="1000px" cellspacing="1px" cellpadding="2px" bgcolor="#CCCCCC">
			<tr bgcolor="#FFFFFF">
				<td width="350px" class="header_tabel">Nama komisi </td>
				<td width="200px" class="header_tabel">Persentase </td>
				<td colspan="4"  class="header_tabel">Action</td>
			</tr>
			
			<?php
			foreach($komisi as $data_komisi)
			{
				?>
				<tr id="tr_<?php echo $data_komisi->id_komisi; ?>" class="hover">
					<td><div class="isi_tabel"> <?php echo $data_komisi->nama_komisi; ?> </div></td>
					<td><div class="isi_tabel"> <?php echo $data_komisi->persentase; ?> % </div></td>
					<td align="center">
						<a href="" title="Detail" onClick="javascript:detail(<?php echo $data_komisi->id_komisi.", ".$posisi; ?>); return false;">
							<div class="isi_tabel">
								<img src="<?php echo base_url(); ?>files/images/view.png">
							</div>
						</a>
					</td>
					
					<?php
					if ($this->access_lib->_if("adm,stk"))
					{
						?>
						
						<td align="center">
							<a href="" title="Ubah" onClick="javascript:edit(<?php echo $data_komisi->id_komisi.", ".$posisi; ?>); return false;">
								<div class="isi_tabel">
									<img src="<?php echo base_url(); ?>files/images/update.png">
								</div>
							</a>
						</td>
						<td align="center">
							<a href="" title="Hapus" onClick="javascript:hapus(<?php echo $data_komisi->id_komisi; ?>); return false;">
								<div class="isi_tabel">
									<img src="<?php echo base_url(); ?>files/images/delete.png">
								</div>
							</a>
						</td>
						<?php
					}
					?>
					
				</tr>
				<?php
			}
			?>
			
		</table>
	</div>
	
	<div class="clear"></div>
	
	<div id="frame_pagging" class="shadow radius">
	
		<?php
		if($next < $total_komisi){
		?>
		
		<a href="" onClick="javascript:list_data(<?php echo $akhir; ?>); return false;">
			<div id="tombol_navigasi">Terakhir</div>
		</a>
		<a href="" onClick="javascript:list_data(<?php echo $next; ?>); return false;">
			<div id="tombol_navigasi">Berikutnya</div>
		</a>
		
		<?php
		}
		?>
		
		<div class="data_nav">
			Data ke <?php if($posisi == 0 AND count($komisi) == 0){ echo "0"; }else if(count($komisi) > 0){ echo $posisi+1; } ?> 
			sampai <?php echo count($komisi)+$posisi; ?>
		</div>
		
		<?php
		if($prev >= 0){
		?>
		
		<a href="" onClick="javascript:list_data(<?php echo $prev; ?>); return false;">
			<div id="tombol_navigasi">Sebelumnya</div>
		</a>
		<a href="" onClick="javascript:list_data(0); return false;">
			<div id="tombol_navigasi">Pertama</div>
		</a>
		
		<?php
		}
		?>
	
		<div class="info_data">Total <?php echo $total_komisi; ?> Data</div>
	</div>
</div>
