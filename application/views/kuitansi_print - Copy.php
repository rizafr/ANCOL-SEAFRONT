<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<style type="text/css">
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
	
	<body onload="window.print()">
		<table>
			<tr>
				<td>No. Dok.</td><td>: <?php echo $nomor ?></td>
			</tr>
			<tr>
				<td>Rev.</td><td>: 0</td>
			</tr>
			</table>
		<table width=500>
						
			<tr>
				<td colspan=2>## <?php echo strtoupper($sejumlah) ?> ##</td>
			</tr>
			<tr>
				<td colspan=2><pre><?php echo $keterangan; ?></pre></td>
			</tr>
			<tr>
				<td>## Rp. <?php echo number_format($jumlah,0); ?> ##</td><td align="right">Jakarta,<?php echo $tanggal; ?><br />PT. PEMBANGUNAN JAYA ANCOL TBK</td>
			</tr>
			<tr>
				<td><br><br><br><br>
				<td align="right"><br><br><br><br><?php echo $nama_pejabat; ?></td>
			</tr>
			</table>
		</body>
	</html>
	

