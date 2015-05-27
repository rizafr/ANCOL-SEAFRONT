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
					<td width="150px" bgcolor="#999999"><div class="isi_tabel"><strong>Nama sk<span class="required_star">*</span></strong></div></td>
					<td width="450px">
						<div class="isi_tabel">
							<input type="text" name="nama_sk" id="nama_sk" size="40" value="<?php echo $nama_sk; ?>">
						</div>
					</td>
				</tr>	
				<tr bgcolor="#FFFFFF">
					<td bgcolor="#999999"><div class="isi_tabel"><strong>Persentase Kenaikan<span class="required_star">*</span></strong></div></td>
					<td>
						<div class="isi_tabel">
							<input type="text" name="persentase_kenaikan" value="<?php echo $persentase_kenaikan; ?>">
						</div>
					</td>
				</tr>
				
				<tr bgcolor="#FFFFFF">
					<td bgcolor="#999999"><div class="isi_tabel"><strong>Persentase Penurunan<span class="required_star">*</span></strong></div></td>
					<td>
						<div class="isi_tabel">
							<input type="text" name="persentase_penurunan" value="<?php echo $persentase_penurunan; ?>">
						</div>
					</td>
				</tr>
				
				<tr bgcolor="#FFFFFF">
					<td bgcolor="#999999"><div class="isi_tabel"><strong>NUP AWAL<span class="required_star">*</span></strong></div></td>
					<td>
						<div class="isi_tabel">
							<input type="text" name="nup_awal" value="<?php echo $nup_awal; ?>">
						</div>
					</td>
				</tr>	
				
				<tr bgcolor="#FFFFFF">
					<td bgcolor="#999999"><div class="isi_tabel"><strong>NUP AKHIR<span class="required_star">*</span></strong></div></td>
					<td>
						<div class="isi_tabel">
							<input type="text" name="nup_akhir" value="<?php echo $nup_akhir; ?>">
						</div>
					</td>
				</tr>		
				
				<tr bgcolor="#FFFFFF">
					<td width="200px" bgcolor="#999999"><div class="isi_tabel"><b>Status SK<span class="required_star">*</span></b></div></td>
					<td width="400px">
						<div class="isi_tabel">
							<select name="status" id="status">
								<option value=""> -- Pilih Status SK -- </option>
								<option value="1" <?php echo $status == "1" ? "Selected" : ""; ?>>Aktif</option>
								<option value="0" <?php echo $status == "0" ? "Selected" : ""; ?>>Tidak Aktif</option>
							</select>
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
							<input type="hidden" name="id_sk" id="id_sk" value="<?php echo $id_sk; ?>">
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