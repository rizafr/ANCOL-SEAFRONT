<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Antrian Pendaftaran</title>
<script type="text/javascript">
	function awal()
	{
		a = 0;
		document.getElementById('tampil_f1').value = a;
		document.getElementById('tampil_f2').value = a;
		document.getElementById('tampil_f3').value = a;
	}
	
	function call_f1()
	{
		var b = document.getElementById('tampil_f1').value
		var c = parseInt(b);
		var d = document.getElementById('tampil_f2').value
		var e = parseInt(d);
		var f = document.getElementById('tampil_f3').value
		var g = parseInt(f);
		
		if(c == 0)
		{
			if(c == 0)
			{
			var hasil = c + 1;
				document.getElementById('tampil_f1').value = hasil;
			}
			if(e == 1)
			{
			var hasil = e + 1;
				document.getElementById('tampil_f1').value = hasil;
			}
			if(g == 1)
			{
			var hasil = g + 1;
				document.getElementById('tampil_f1').value = hasil;
			}
		}
		
		if(c > g & c < e)
		{
			var hasil = e + 1;
			document.getElementById('tampil_f1').value = hasil;
		}
		
		if(c < g & c > e)
		{
			var hasil = g + 1;
			document.getElementById('tampil_f1').value = hasil;
		}
		
		if(c < e & c < g & g > e)
		{
			var hasil = g + 1;
			document.getElementById('tampil_f1').value = hasil;	
		}
		
		if(c < e & c < g & e > g)
		{
			var hasil = e + 1;
			document.getElementById('tampil_f1').value = hasil;
		}
		
		if(c > e & c > g)
		{
			var hasil = c + 1;
			document.getElementById('tampil_f1').value = hasil;
		}
		
		
	}
	function call_f2()
	{
		var b = document.getElementById('tampil_f1').value
		var c = parseInt(b);
		var d = document.getElementById('tampil_f2').value
		var e = parseInt(d);
		var f = document.getElementById('tampil_f3').value
		var g = parseInt(f);
		
		if(e == 0)
		{
			if(e == 0)
			{
			var hasil = c + 1;
				document.getElementById('tampil_f2').value = hasil;
			}
			if(c == 1)
			{
			var hasil = c + 1;
				document.getElementById('tampil_f2').value = hasil;
			}
			if(g == 1)
			{
			var hasil = g + 1;
				document.getElementById('tampil_f2').value = hasil;
			}
			
		}
		
		if(e < c & e < g & g > c)
		{
			var hasil = g + 1;
			document.getElementById('tampil_f2').value = hasil;
		}
		
		if(e < c & e < g & c > g)
		{
			var hasil = c + 1;
			document.getElementById('tampil_f2').value = hasil;
		}
		
		if(e < c & e > g)
		{
			var hasil = c + 1;
			document.getElementById('tampil_f2').value = hasil;
		}
		
		if(e > c & c < g)
		{
			var hasil = g + 1;
			document.getElementById('tampil_f2').value = hasil;
		}
		
		if(e > c & e > g)
		{
			var hasil = e + 1;
			document.getElementById('tampil_f2').value = hasil;
		}
		
	}
	
	function call_f3()
	{
		var b = document.getElementById('tampil_f1').value
		var c = parseInt(b);
		var d = document.getElementById('tampil_f2').value
		var e = parseInt(d);
		var f = document.getElementById('tampil_f3').value
		var g = parseInt(f);
		
		if(g == 0)
		{
			if(g == 0)
			{
				var hasil = g + 1;
				document.getElementById('tampil_f3').value = hasil;
			}
			if(c == 1)
			{
				var hasil = c + 1;
				document.getElementById('tampil_f3').value = hasil;
			}
			if(e == 1)
			{
				var hasil = e + 1;
				document.getElementById('tampil_f3').value = hasil;
			}
			
		}
		if(g < c & g < e & c > e)
		{
			var hasil = c + 1;
			document.getElementById('tampil_f3').value = hasil;
		}
		if(g < c & g < e & e > c)
		{
			var hasil = e + 1;
			document.getElementById('tampil_f3').value = hasil;
		}
		if(g < c & g > e)
		{
			var hasil = c + 1;
			document.getElementById('tampil_f3').value = hasil;
		}
		
		if(g > c & g < e)
		{
			var hasil = e + 1;
			document.getElementById('tampil_f3').value = hasil;
		}
		if(g > c & g > e)
		{
			var hasil = g + 1;
			document.getElementById('tampil_f3').value = hasil;
		}
		
	}
	
</script>
</head>

<body onload="awal()">
<h1 align="center" style="color:#F90">NOMOR ANTRIAN PEDAFTARAN</h1>
<div align="center">
	<div style="width:750px; height:auto; margin-top:40px;">
    	<div style="width:250px; height:auto; float:left">
        <table align="center">
        	<tr>
            <td><font size="5">No Antrian</font></td>
            </tr>
            <tr>
        	<td><input type="text" id="tampil_f1" disabled="disabled" style="width:180px; height:140px; background:#F00; border:none; color:#FFF; text-align:center; vertical-align:middle; font-size:90px;" />
</td>    
            </tr>
            <tr height="50">
        	<td align="center"><button onclick="call_f1()">Panggil</button></td>	    
            </tr>
            <tr>
            <td align="center"><font size="+3">Meja 1</font></td>
            </tr>
        </table>
        </div>
        <div style="width:250px; height:auto; float:left">
        <table align="center">
        	<tr>
            <td><font size="5">No Antrian</font></td>
            </tr>
            <tr>
            <td><input type="text" id="tampil_f2" disabled="disabled" style="width:180px; height:140px; background:#009; border:none; color:#FFF; text-align:center; vertical-align:middle; font-size:90px;" />
</td>
            </tr>
            <tr height="50">
        	<td align="center"><button onclick="call_f2()">Panggil</button></td>    
            </tr>
            <tr>
            <td align="center"><font size="+3">Meja 2</font></td>
            </tr>
        </table>
        </div>
        <div style="width:250px; height:auto; float:left">
        <table align="center">
        	<tr>
            <td><font size="5">No Antrian</font></td>
            </tr>
        	<tr>
            <td><input type="text" id="tampil_f3" disabled="disabled" style="width:180px; height:140px; background:#0F0; border:none; color:#FFF; text-align:center; vertical-align:middle; font-size:90px;" />
</td>
            </tr>
            <tr height="50">
            <td align="center"><button onclick="call_f3()">Panggil</button></td>
            </tr>
            <tr>
            <td align="center"><font size="+3">Meja 3</font></td>
            </tr>
        </table>
        </div>
    </div>
</div>
<div align="center">
<?php include "table2.php"?>
</div>
</body>
</html>
