<!DOCTYPE html>
<html lang="en"><head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>
        E-MARKETING | ·PT. Pembangunan Jaya Ancol Tbk
	</title>
    <meta charset="UTF-8">
	<link rel="icon" href="">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">    
	<link rel="stylesheet" href="<?php echo base_url(); ?>files/antrian/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>files/antrian/frontend.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>files/antrian/font-awesome.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>files/antrian/hover-min.css">
	<script type="text/javascript" src="<?php echo base_url(); ?>files/antrian/jquery-1.11.3.min.js"></script>
	<script src="<?php echo base_url(); ?>files/antrian/bootstrap.js"></script>
	
	<style type="text/css">
		
		
		/* make keyframes that tell the start state and the end state of our object */
		@-webkit-keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
		@-moz-keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
		@keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
		
		b{
		text-align:center;
		background-color : #006064;
		color: #FFFFF2;
		}
		
		td{
		padding-right: 2px!important; text-align: center !important;
		vertical-align: middle  !important;
		line-height: 10px  !important;  
		font-size: 14px;
		border: 1px solid !important;}

	</style>
</head>
<body>   
    
	<!-- will be used to show any messages -->
	
	<?php
		$data_sort =  array();
		for($a=0;$a<=36;$a++){
			$data_sort[$a]= array();
			for($b=0;$b<=22;$b++){
				$data_sort[$a][$b] = 'x';
			}
		}

		$limitPerLine = 22;
		$currentData = 0;
		
		foreach($unit as $data_unit)
		{								
			$kode_unit = explode("/",$data_unit->kode_unit );
			$kode_unit_split = explode("-",$kode_unit[1] );
			$lantai = $kode_unit_split[0];
			$unit = $kode_unit_split[1];
			if(empty($data_unit->status_transaksi)){
				$data_sort[$lantai][$unit] = 'Avail';
			}
			else {
				$data_sort[$lantai][$unit] = $data_unit->status_transaksi;
			}
		}
	?>
<div class="row">
	<div class="col-md-6">
		<table class="table" >					
			<tbody >
				<?php
					echo "<tr><td class = 'active' colspan='10'>Ancol View</td>";
					echo "<tr><td class = 'active'>LT</td>";

					for($b=22;$b>=1;$b-=2){
							if($b==13||$b==14||$b==4){
								continue;
							}
							echo "<td class='active'>$b</td>";
					}

					for($a=36;$a>0;$a--){
						if($a==13||$a==4||$a==14||$a==24||$a==34){
							continue;
						}
						echo "<tr><td class='active'>$a</td>";
						for($b=22;$b>=1;$b-=2){
							if($b==13||$b==14||$b==4){
								continue;
							}
							if($data_sort[$a][$b]=='Sold'){
								echo "<td class = 'danger'>A/$a-$b</td>";	
								}
							else if($data_sort[$a][$b]=='Avail'){
								echo "<td class = 'success'>A/$a-$b</td>";
							}
							else if($data_sort[$a][$b]=='Booked'){
								echo "<td class = 'danger'>A/$a-$b</td>";
							}
							else{
								if($a>=2){
									if($data_sort[$a-1][$b]=='x'){
										echo "<td class = 'active'>Void</td>";
									}
									else{
										echo "<td class = 'active'>Garden</td>";
									}
								}
								else{
									echo "<td class = 'active'>Garden</td>";
								}
							}
						}
						echo "</tr>";
					}
				?>
			</tbody>
		</table>	
	</div>

	<div class="col-md-6">
		<table class="table" >					
			<tbody >
				<?php
					echo "<tr><td class = 'active' colspan='11'>Sea View</td>";
					echo "<tr><td class = 'active'>LT</td>";

					for($b=21;$b>=1;$b-=2){
							if($b==13){
								continue;
							}
							echo "<td class='active'>$b</td>";
					}

					for($a=36;$a>0;$a--){
						if($a==13||$a==14||$a==4||$a==24||$a==34){
							continue;
						}
						echo "<tr>
								<td class='active'>$a</td>";
						for($b=21;$b>=1;$b-=2){
							if($b==13||$b==14||$b==4){
								continue;
							}
							if($data_sort[$a][$b]=='Sold'){
								echo "<td class = 'danger'>A/$a-$b</td>";	
								}
							else if($data_sort[$a][$b]=='Avail'){
								echo "<td class = 'success'>A/$a-$b</td>";
							}
							else if($data_sort[$a][$b]=='Booked'){
								echo "<td class = 'danger'>A/$a-$b</td>";
							}
							else{
								if($a>=2){
									if($data_sort[$a-1][$b]=='x'){
										echo "<td class = 'active'>Void</td>";
									}
									else{
										echo "<td class = 'active'>Garden</td>";
									}
								}
								else{
									echo "<td class = 'active'>Garden</td>";
								}
							}
						}
						echo "</tr>";
					}
				?>
			</tbody>
		</table>
	</div>
</div>

<!--<script src="<?php echo base_url(); ?>files/antrian/jquery.js"></script>-->
<script>
	/* Preloader */
	//paste this code under head tag or in a seperate js file.
	// Wait for window load
	$(window).load(function() {
		// Animate loader off screen
		$(".se-pre-con").fadeOut("slow");
		$('.row-item').fadeIn("slow");
	});
	
	function calcHeight()
	{
		//find the height of the internal page
		var the_height=
		document.getElementById('the_iframe').contentWindow.
		document.body.scrollHeight;
		
		//change the height of the iframe
		document.getElementById('the_iframe').height=
		the_height;
	}
	
	
	/* jQuery toggle layout */
	$('#btnToggle').click(function(){
		if ($(this).hasClass('on')) {
			$('#main .col-md-6').addClass('col-md-4').removeClass('col-md-6');
			$(this).removeClass('on');
		}
		else {
			$('#main .col-md-4').addClass('col-md-6').removeClass('col-md-4');
			$(this).addClass('on');
		}
	});
</script>


</body>
</html>
