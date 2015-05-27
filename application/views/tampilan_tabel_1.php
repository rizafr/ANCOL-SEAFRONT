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
		
		foreach($unit as $data_unit)
		{
			$kode_unit = explode("/",$data_unit->kode_unit );
			$kode_unit_split = explode("-",$kode_unit[1] );
			$lantai = $kode_unit_split[0];
			$jumlah_lantai = count($unit);
		}
	?>
	
	
	<table class="table" >					
		
		<tbody >
			<?php
				$limitPerLine = 22;
				$currentData = 0;
				foreach($unit as $data_unit)
				{								
					++$currentData;
					
					if($currentData == 1) { ?>
					<tr>
					<?php  }
						$kode_unit = explode("/",$data_unit->kode_unit );
						$kode_unit_split = explode("-",$kode_unit[1] );
						$lantai = $kode_unit_split[0];
					?>
					<td <?php 
						if($data_unit->status_transaksi == "Booked"){
							echo "class='danger'";
							}elseif($data_unit->status_transaksi == "Sold"){
							echo "class='danger'";
							}else{
							echo "class='success'";
							}
						?>>
						<strong><?php echo  $data_unit->kode_unit?></strong>
				</td>
				
				
				<?php if($currentData == $limitPerLine) {
					$currentData = 0;
				?>
				</tr>
				<?php }
			}
		?>	
		
		
	</tbody>
	
</table>



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
