<div class="margin_left" style="width:600px">	
	<div class="header_data"><?php echo $judul; ?></div>
	<div class="tombol_tambah">
		<a href="" onClick="javascript:list_data(<?php echo $posisi; ?>); return false;">
			<input type="button" value="&laquo; Kembali">
		</a>
	</div>
	<div class="frame_tabel radius transparent">
		<form id="form" name="form" method="post" action="<?php echo $action; ?>" onSubmit="return post(this, <?php echo $posisi; ?>);">
			<table width="600px" cellspacing="1px" cellpadding="2px" bgcolor="#CCCCCC">
				<tr bgcolor="#FFFFFF">
					<td width="150px" bgcolor="#999999"><div class="isi_tabel"><strong>Nama komisi<span class="required_star">*</span></strong></div></td>
					<td width="450px">
						<div class="isi_tabel">
							<input type="text" name="nama_komisi" id="nama_komisi" size="40" value="<?php echo $nama_komisi; ?>">
						</div>
					</td>
				</tr>	
				<tr bgcolor="#FFFFFF">
					<td bgcolor="#999999"><div class="isi_tabel"><strong>Persentase<span class="required_star">*</span></strong></div></td>
					<td>
						<div class="isi_tabel">
							<input type="text" name="persentase" value="<?php echo $persentase; ?>">
						</div>
					</td>
				</tr>			
				
				<tr bgcolor="#FFFFFF">
					<td valign="top" bgcolor="#999999"><div class="isi_tabel"><strong>Deskripsi<span class="required_star">*</span></strong></div></td>
					<td>
						<div class="isi_tabel">
							<textarea name="deskripsi" id="deskripsi" cols="50" rows="5"><?php echo $deskripsi; ?></textarea>
						</div>
					</td>
				</tr>
				<tr bgcolor="#FFFFFF">
					<td valign="top" bgcolor="#999999"><div class="isi_tabel">&nbsp;</div></td>
					<td>
						<div class="isi_tabel">
							<input type="hidden" name="id_komisi" id="id_komisi" value="<?php echo $id_komisi; ?>">
							<input type="submit" value="Simpan &#10003;">
						</div>
					</td>
				</tr>
				<tr bgcolor="#FFFFFF">
					<td colspan="2">
						<div class="isi_tabel"><span class="required_star">* Harus Diisi</span></div>
					</td>					
				</tr>	
			</table>
		</form>
	</div>
	
	<div class="clear"></div>
</div>