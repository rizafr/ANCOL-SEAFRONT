<?php echo $header; ?>

<script type="text/javascript">

    function loading()
    {
        $('#frame_data').html('<div class="loading"></div>');
    }

    function tampilkan_list(posisi)
    {
        loading();
        $('#frame_data').load(base_url + 'report/regular_list/' + posisi);
    }

    function list_filter(posisi)
    {
        var filter = $('input:radio[name=filter]:checked').val();
        var kata_kunci = $('#nomor_pemesanan').val();
        var no_va = $('#no_va').val();
        var id_cluster = $('#nama_cluster').val();
        var kategori = encodeURI($('#nama_kategori').val());

        if (!filter)
        {
            alert("Anda belum memilih jenis pencarian");
        }
        else
        {
            if (filter == "nomor_pemesanan")
            {
                if (!kata_kunci)
                {
                    alert("Nomor pemesanan yang akan dicari masih kosong !");
                }
                else
                {
                    loading();
                    $('#frame_data').load(base_url + 'report/regular_cari_list/' + posisi + '/' + filter + '/0/0/' + kata_kunci);
                }
            }

            if (filter == "no_va")
            {
                if (!no_va)
                {
                    alert("Nomor Virtual Account yang akan dicari masih kosong !");
                }
                else
                {
                    loading();
                    $('#frame_data').load(base_url + 'report/regular_cari_list/' + posisi + '/' + filter + '/0/0/' + no_va);
                }
            }
            else if (filter == "cluster")
            {
                loading();
                $('#frame_data').load(base_url + 'report/regular_cari_list/' + posisi + '/' + filter + '/' + id_cluster + '/' + kategori + '/0');
            }
        }
    }

    function hapus_pemesanan(id_pemesanan, id_unit, posisi) {
        if (confirm("Yakin akan menghapus data?")) {
            $.post(base_url + 'report/regular_delete/' + id_pemesanan + '/' + id_unit, function () {
                tampilkan_list(posisi);
            });
        }
        return false;
    }

    function verify(id_pemesanan)
    {
        if (confirm("Data Customer Sudah Benar?")) {
            $.post(base_url + 'resepsionis/kehadiran/' + id_pemesanan, function (result)
            {

                alert("sukses");
                var status = result.split("|");
                $("#status_kehadiran_" + id_pemesanan).html("<font color='red'>" + status[0] + "</font>");
                $("#waktu_kehadiran_" + id_pemesanan).html("<font color='green'>" + status[1] + "</font>");
                $("#jumlah_hadir").html("<font color='black'>" + status[2] + "</font>");
                $("#jumlah_belum_hadir").html("<font color='black'>" + status[3] + "</font>");
                $("#kehadiran_" + id_pemesanan).hide();
                $("#transaksi_" + id_pemesanan).show();

            });

        }
        return false;
    }

    function transaksi(id_pemesanan, kata_kunci)
    {
        $.post(base_url + 'resepsionis/transaksi/' + id_pemesanan, function (result)
        {

            alert("sukses");
            var status = result.split("|");
            $("#status_transaksi_" + id_pemesanan).html("<font color='red'>" + status[0] + "</font>");
            var posisi = 0;
            var filter = 'nomor_pemesanan';
            $('#frame_data').load(base_url + 'report/regular_cari_list/' + posisi + '/' + filter + '/0/0/' + kata_kunci);

        });


    }

    function refund(id_pemesanan)
    {
        if (confirm("Yakin akan data ini akan refund?")) {
            $.post(base_url + 'report/refund/' + id_pemesanan, function (result)
            {
                var status = result.split("|");
                $("#status_pemesanan_" + id_pemesanan).html("<font color='red'>" + status[0] + "</font>");
                $("#status_verify_" + id_pemesanan).html("<font color='green'>" + status[1] + "</font>");

            });
        }
        return false;
    }

    function interval_timeout()
    {
        window.setInterval(function () {
            scheduler_timeout();
        }, 5000);
    }

    function scheduler_timeout() {
        $.ajax({url: base_url + 'scheduler/timeout', success: function (result) {
                if (result == "found")
                {
                    tampilkan_list(0);
                }
            }});
    }

    scheduler_timeout();
    interval_timeout();

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
        $(document).ready(function () {
            $('#frame_data').load(base_url + 'resepsionis/resepsionis_list/0');
        })
    </script>

</body>
</html>