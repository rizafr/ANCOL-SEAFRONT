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
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script type="text/javascript">
		$.fn.infiniteScrollUp=function(){
			var self=this,kids=self.children()
			kids.slice(25).hide()
			setInterval(function(){
				kids.filter(':hidden').eq(0).slideDown("fast")
				kids.eq(0).slideUp(function(){
					$(this).appendTo(self)
					kids=self.children()
				})
			},3000) // 3 detik
			return this
		}
		function cvt(s){
			return function(){
				return $(s).html( $(this).html())
			}
		}
		$(function(){
			$('tbody').replaceWith(cvt('<section/>'))
			$('tr').replaceWith(cvt('<div/>'))
			$('td').replaceWith(cvt('<span/>'))
			$('th').replaceWith(cvt('<b/>'))
			$('section').infiniteScrollUp()
		})
	</script>
	<style type="text/css">
		span,b{
		width: 15.5%;
		display: inline-block;
		text-align: center;
		background-color : #bbdefb;
		border-bottom: 1px solid #00A9C6 ;
		padding-top: 10px ;
		padding-bottom: 10px ;
		color: #333;
		
		animation:fadeIn ease-in 1; /* call our keyframe named fadeIn, use animattion ease-in and repeat it only 1 time */
		animation-fill-mode:forwards;  /* this makes sure that after animation is done we remain at the last keyframe value (opacity: 1)*/
		
		animation-duration:1s;
		}
		
		/* make keyframes that tell the start state and the end state of our object */
		@-webkit-keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
		@-moz-keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
		@keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
		
		b{
		text-align:center;
		background-color : #006064;
		color: #FFFFF2;
		}
		span .danger{
		background-color: red;
		}
	</style>
</head>
<body>
    <div style="display: none;" class="se-pre-con"></div>
    <nav class="navbar navbar-fixed-top navbar-inverse">
		<div class="col-md-12">
			<div class="navbar-header">
				<a href="#" class="navbar-brand visible-lg visible-md">
					<img src="<?php echo base_url(); ?>assets/home/logo.png" style="width: 20px;display: inline-block;vertical-align: top;" alt="">
					<strong>E-MARKETING</strong> ·PT. Pembangunan Jaya Ancol Tbk
				</a>
				<a href="<?php echo base_url(); ?>admin/homes" class="navbar-brand visible-sm">
					<img src="<?php echo base_url(); ?>assets/home/logo.png" style="width: 20px;display: inline-block;vertical-align: top;" alt="">
					PT. Pembangunan Jaya Ancol Tbk
				</a>
				<a href="<?php echo base_url(); ?>admin/homes" class="navbar-brand visible-xs">
					<img src="<?php echo base_url(); ?>assets/home/logo.png" style="width: 30px;display: inline-block;vertical-align: middle;" alt="">
					<small><strong>E-MARKETING</strong></small>
				</a>
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse1">
					<i class="glyphicon glyphicon-search"></i>
				</button>
				
			</div>
			<div class="collapse navbar-collapse" id="navbar-collapse1">
				
			</div>
		</div>
	</nav>
	<div class="container" id="main">
		<!-- will be used to show any messages -->
		<div style="display: block;" class="row row-item">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 panel-item">
				<table border="0" width="100%">
					<colgroup><col /><col /><col /><col /><col /><col /></colgroup>
					<thead>
						<tr><th>Kategori</th><th>Tower</th><th>Unit</th><th>Type</th><th>Stok</th><th>Status</th>
						</tr>
					</thead>
					<tbody>
						<?php
							foreach($unit as $data_unit)
							{
							?>
							<tr class="danger" ><td><?php echo $data_unit->kategori; ?></td><td>A</td><td><?php echo $data_unit->kode_unit; ?></td><td><?php echo $data_unit->nama_type." ".$data_unit->posisi; ?></td><td><?php 
								if($data_unit->status_unit == "Promo")
								{
									echo "<font color='blue'>".$data_unit->status_unit."</font>"; 
								}
								else
								{
									echo $data_unit->status_unit;
								}
								?> </td><td><?php 
								if($data_unit->status_transaksi == "Booked")
								{
									echo "<font color='green'>".$data_unit->status_transaksi."</font>"; 
								}else
								{
									echo "<font color='red'> &nbsp;".$data_unit->status_transaksi."</font>";
								}
							?> 	</td></tr>
						<?php }?>	
					</tbody>
				</table>
			</div>
		</div>
		
	</div>
	
	<!--<script src="<?php echo base_url(); ?>files/antrian/jquery.js"></script>-->
	<script src="<?php echo base_url(); ?>files/antrian/bootstrap.js"></script>
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
