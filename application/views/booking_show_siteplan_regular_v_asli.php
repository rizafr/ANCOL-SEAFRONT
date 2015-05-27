<script type="text/javascript">
	
	$(document).ready(function(){
	
		$("#filter_cluster").change(function(){
		
			$('#filter_type').html('<option value=""> -- Type -- </option>');
			var nama_cluster = $('#filter_cluster').val();
			
			if(nama_cluster != "" )
			{
				$('#filter_type').load(base_url+'ajax/list_option_type_filter_tower/'+nama_cluster);
			}
		});
	
	});
	
	function isNumberKey(evt)
	{
		var charCode = (evt.which) ? evt.which : event.keyCode
		if (charCode > 31 && (charCode < 48 || charCode > 57))
		{
			return false;
		}
		
		return true;
	}
	
</script>

<?php echo $header; ?>

<style type="text/css">

#each_siteplan
{
	margin:20px; 
	border:1px #607D8B solid; 
	width: 435px; 
	height:auto; 
	padding:10px; 	
	background: #607D8B !important; 
	float:left;
}

#each_siteplan:hover
{

	-webkit-box-shadow: 3px 0px 15px rgba(78, 101, 153, 1);
	-moz-box-shadow: 3px 0px 15px rgba(78, 101, 153, 1);
	box-shadow: 3px 0px 15px rgba(78, 101, 153, 1);
	-webkit-transition: all .3s linear;
  -o-transition: all .3s linear;
  transition: all .3s linear;
} 

</style>

</head>
<body>

<?php
# Load profile
$this->load->view('top_profile_v');

# Load menu dashboard
$this->load->view('menu_v');
?>

<div id="frame_data" style="margin-left: 100px;">
	<div class="header_data">Booking Regular</div>
	<select name="filter_cluster" id="filter_cluster">
		<option value=""> -- Tower -- </option>

		<?php
		$sel = '';
		foreach($cluster as $data_cluster)
		{
			if($data_cluster->id_cluster == $filter_cluster)
			{
				$sel = 'selected="true"';
			}
			
			echo '<option value="'.$data_cluster->nama_cluster.'" '.$sel.'>'.$data_cluster->nama_cluster.' ('.$data_cluster->kode_cluster.')</option>';
			
			$sel = '';
		}
		?>

	</select>
	
	<?php
	foreach($siteplan as $data_siteplan)
	{
		$jua = $this->siteplan_m->get_total_unit_regular_available($data_siteplan->id_siteplan);
	?>

	<a href="<?php echo base_url(); ?>booking/siteplan_detail/<?php echo $data_siteplan->id_siteplan; ?>" style="text-decoration: none;">
		<div id="each_siteplan">
			<div class="frame_tabel radius transparent">
				<img src="<?php echo base_url();?>files/siteplan/thumbnail/<?php echo $data_siteplan->image; ?>" width="150px" height="105px">
			</div>
			<div style="color:#FFF; width:250px; position:absolute; margin:0 0 0 170px;">
				<span style="display: inline-block; margin-bottom:7px; font-weight: bold; font-size: 12px;"><?php echo $data_siteplan->nama_siteplan; ?></span><br />
				<span style="display: inline-block; width:120px; font-size: 10px; padding-left:30px;">Jumlah Unit</span><span style="font-size: 10px; text-align:right;"> : <?php echo $jua->total; ?> Unit</span><br />
				<span style="display: inline-block; width:120px; font-size: 10px; padding-left:30px;">Available</span><span style="font-size: 10px; text-align:right;"> : <?php echo $jua->total_available; ?> Unit</span><br />
				<span style="display: inline-block; width:120px; font-size: 10px; padding-left:30px;">Booked</span><span style="font-size: 10px; text-align:right;"> : <?php echo $jua->total_booked; ?> Unit</span><br />
				<span style="display: inline-block; width:120px; font-size: 10px; padding-left:30px;">Sold</span><span style="font-size: 10px; text-align:right;"> : <?php echo $jua->total_sold; ?> Unit</span>
			</div>
		</div>
	</a>

	<?php
	}
	
	$jual = $this->siteplan_m->get_unit_regular_lainnya_available();
	?>

	<!-- Menampilkan tabel untuk unit yang tidak mempunyai siteplan -->
	<a href="<?php echo base_url(); ?>booking/unit_lainnya_detail_regular" style="text-decoration: none;">
		<div id="each_siteplan">
			<div class="frame_tabel radius transparent" style="width: 150px; height: 100px; background-color: #FFF;">				
			</div>
			<div style="color:#FFF; width:250px; position:absolute; margin:0 0 0 170px;">
				<span style="display: inline-block; margin-bottom:7px; font-weight: bold; font-size: 12px;">Unit Lainnya</span><br />
				<span style="display: inline-block; width:100px; font-size: 10px; padding-left:30px;">Jumlah Unit</span><span style="font-size: 10px; text-align:right;"> : <?php echo $jual->total; ?> Unit</span><br />
				<span style="display: inline-block; width:80px; font-size: 10px; padding-left:30px;">Available</span><span style="font-size: 10px; text-align:right;"> : <?php echo $jual->total_available; ?> Unit</span><br />
				<span style="display: inline-block; width:80px; font-size: 10px; padding-left:30px;">Booked</span><span style="font-size: 10px; text-align:right;"> : <?php echo $jual->total_booked; ?> Unit</span><br />
				<span style="display: inline-block; width:80px; font-size: 10px; padding-left:30px;">Sold</span><span style="font-size: 10px; text-align:right;"> : <?php echo $jual->total_sold; ?> Unit</span>
			</div>
		</div>
	</a>

</div>

</body>
</html>