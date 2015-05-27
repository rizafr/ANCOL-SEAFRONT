<?php echo $header; ?>

<script type="text/javascript">
	
	function loading()
	{
		$('#frame_data').html('<div class="loading"></div>');
	}

	function list_data(posisi)
	{
		loading();
		$('#frame_data').load(base_url+'komisi/list_data/'+posisi);
	}
	
	function list_data_unit_komisi(id_komisi, posisi)
	{
		loading();
		$('#frame_data').load(base_url+'komisi/list_data_unit_komisi/'+id_komisi+'/'+posisi);
	}
	
	function add(posisi)
	{
		loading();
		$('#frame_data').load(base_url+'komisi/form_data_komisi/add/0/'+posisi);
	}
	
	function edit(id_komisi, posisi)
	{
		loading();
		$('#frame_data').load(base_url+'komisi/form_data_komisi/edit/'+id_komisi+'/'+posisi);
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
						alert("Data komisi berhasil ditambahkan.");
					}
					else if(result == "ok-edit")
					{
						alert("Data komisi berhasil diubah.");
					}
					
					list_data(posisi);
				}
			});
		}
		
		return false;
	}
	
	function detail(id_komisi, posisi)
	{
		loading();
		$('#frame_data').load(base_url+'komisi/detail/'+id_komisi+'/'+posisi);
	}
	
	function hapus(id_komisi){
		if(confirm("Yakin akan menghapus data?")){
			$.post(base_url+'komisi/delete/'+id_komisi, function(result){
				if (result == "ok")
				{
					$("#tr_" + id_komisi).fadeOut();
				}
				
			});
		}
		
		return false;
	}

	function validasi()
	{
		var nama_komisi	= $('#nama_komisi').val();
		var persentase	= $('#persentase').val();
		var deskripsi	= $('#deskripsi').val();

		if(nama_komisi == "")
		{
			alert("Nama Komisi harus diisi !");
			$('#nama_komisi').focus();
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
			alert("Deskripsi Komisi harus diisi !");
			$('#deskripsi').focus();
			return false;
		}		
		else
		{
			return true;
		}
	}
	
function interval_komisi()
{
	window.setInterval(function(){
		scheduler_komisi();
	}, 5000);
}

function scheduler_komisi(){
	$.ajax({url: base_url+'scheduler/komisi', success:function(result){
		if(result == "found")
		{
			list_data(0);
		}
	}});
}
	
scheduler_komisi();
interval_komisi();
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