<table id="example" class="table table-hover table-bordered">
    <thead>
        <?php
        $arrth = ['No', 'Parameter', 'Harga per titik', 'Pemeriksaan', 'Peraturan', 'Laboratorium', 'Tgl & Jam', ''];
        echo '<tr>';
        foreach ($arrth as $th) :
            echo '<th>' . $th . '</th>';
        endforeach;
        echo '</tr>';
        ?>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($items as $row) :
        ?>
            <tr id="myId-<?= $row['id_permintaan_pemeriksaan']; ?>" data-urut=<?= $no; ?>>
                <td><b><?= $no++; ?></b></td>
                <td><?= $row['parameter']; ?></td>
                <td style="text-align: right;"><?= number_to_currency($row['harga_per_titik'], 'IDR', 'ID', 0); ?></td>
                <td><?= $row['jenis_sampel']; ?></td>
                <td><?= $row['peraturan']; ?></td>
                <td><?= $row['nama_lab']; ?></td>
                <td><?= date('d-m-Y H:i', strtotime($row['tgl_entry'])); ?></td>
                <td>
                    <div class="d-flex justify-content-start">
                        <button type="button" class="btn btn-danger btn-sm rounded" onclick="deleteData(<?= $row['id_permintaan_pemeriksaan']; ?>)" title="Hapus data">
                            <span class="fa-solid fa-trash-alt"></span>
                        </button>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<script>
    function editData(id) {
        $.ajax({
            type: 'get',
            url: '<?= site_url('master-data/instansi/edit-data/'); ?>' + id,
            dataType: 'json',
            success: function(response) {
                if (response.sukses) {
                    $(".view-modal").html(response.sukses).show();
                    $("#exampleModal").modal('show');
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + ' ' + xhr.responseText + ' ' + thrownError);
            }
        })
    }


    function deleteData(id) {
        var myElement = $('#myId-' + id);
        if (myElement.data('urut')) {
            myElement.addClass('bg bg-danger');
        }
        Swal.fire({
            title: "Yakin untuk menghapus data ?",
            text: `No.urut : ` + myElement.data('urut'),
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, Hapus!",
            cancelButtonText: "Tidak",
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: 'delete',
                    url: '<?= site_url('pelanggan/list-pemeriksaan/delete-data/'); ?>' + id,
                    dataType: 'json',
                    success: function(response) {
                        if (response.sukses) {
                            Swal.fire({
                                title: "Hapus Data !",
                                text: response.sukses,
                                icon: "success"
                            });
                            listData();
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        alert(xhr.status + ' ' + xhr.responseText + ' ' + thrownError);
                    }
                })
            } else {
                myElement.removeClass('bg bg-danger');
            }
        });
    }

    $(document).ready(function() {
        new DataTable('#example', {
            responsive: true
        });
    })
</script>