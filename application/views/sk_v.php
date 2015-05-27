<?php echo $header; ?>

<script type="text/javascript">
	
	function loading()
	{
		$('#frame_data').html('<div class="loading"></div>');
	}

	function list_data(posisi)
	{
		loading();
		$('#frame_data').load(base_url+'sk/list_data/'+posisi);
	}
	
	function list_data_unit_sk(id_sk, posisi)
	{
		loading();
		$('#frame_data').load(base_url+'sk/list_data_unit_sk/'+id_sk+'/'+posisi);
	}
	
	function add(posisi)
	{
		loading();
		$('#frame_data').load(base_url+'sk/form_data_sk/add/0/'+posisi);
	}
	
	function edit(id_sk, posisi)
	{
		loading();
		$('#frame_data').load(base_url+'sk/form_data_sk/edit/'+id_sk+'/'+posisi);
	}
	
	function post(ini, posisi)
	{
		if (validasi())
		{
			$.ajax({
				type: "POST",
				url: $(ini).attr("action"),
				data: $("#form").serialize(),
				success: function(result)
				{
					if(result == "ok-add")
					{
						alert("Data sk berhasil ditambahkan.");
					}
					else if(result == "ok-edit")
					{
						alert("Data sk berhasil diubah.");
					}
					
					list_data(posisi);
				}
			});
		}
		
		return false;
	}
	
	function detail(id_sk, posisi)
	{
		loading();
		$('#frame_data').load(base_url+'sk/detail/'+id_sk+'/'+posisi);
	}
	
	function hapus(id_sk){
		if(confirm("Yakin akan menghapus data?")){
			$.post(base_url+'sk/delete/'+id_sk, function(result){
				if (result == "ok")
				{
					$("#tr_" + id_sk).fadeOut();
				}
				
			});
		}
		
		return false;
	}

	function validasi()
	{
		var nama_sk	= $('#nama_sk').val();
		var persentase	= $('#persentase').val();
		var deskripsi	= $('#deskripsi').val();

		if(nama_sk == "")
		{
			alert("Nama sk harus diisi !");
			$('#nama_sk').focus();
			return false;
		}
		else if(persentase == "")
		{
			alert("persentase harus diisi !");
			$('#persentase').focus();
			return false;
		}
		
		else if(deskripsi == "")
		{
			alert("Deskripsi sk harus diisi !");
			$('#deskripsi').focus();
			return false;
		}		
		else
		{
			return true;
		}
	}
	
function interval_sk()
{
	window.setInterval(function(){
		scheduler_sk();
	}, 5000);
}

function scheduler_sk(){
	$.ajax({url: base_url+'scheduler/sk', success:function(result){
		if(result == "found")
		{
			list_data(0);
		}
	}});
}
	
scheduler_sk();
interval_sk();
</script>

</head>
<body>

<?php
# Load profile
$this->load->view('top_profile_v');

# Load menu dashboard
$this->load->view('menu_v');
?>

<div id="frame_data">
	<div class="loading"></div>
</div>

<script type="text/javascript">
$(document).ready(function() {
	
	list_data(0);

})
</script>


</body>
</html>