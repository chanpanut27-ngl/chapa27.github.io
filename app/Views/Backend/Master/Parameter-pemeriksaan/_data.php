<table id="example" class="table table-hover table-bordered">
    <thead>
        <?php
        $arrth = ['No', 'Parameter', 'Metode', 'Harga per titik', 'Jenis sampel', 'Peraturan', 'Status', ''];
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
            <tr id="myId-<?= $row['id_parameter']; ?>" data-urut=<?= $no; ?>>
                <td><b><?= $no++; ?></b></td>
                <td><?= $row['parameter']; ?></td>
                <td><?= $row['metode']; ?></td>
                <td style="text-align: right;"><?= number_to_currency($row['harga_per_titik'], 'IDR', 'ID', 0); ?></td>
                <td><?= '('.$row['kode_sampel'].') '.$row['jenis_sampel']; ?></td>
                <td><?= $row['peraturan']; ?></td>
                <td><?= $row['active'] == 1 ? '<span class="badge bg-success rounded">Aktif</span>' : '<span class="badge bg-dark rounded">Tidak aktif</span>'; ?></td>
                <td>
                    <div class="d-flex justify-content-start gap-1">
                        <button type="button" class="btn btn-warning btn-sm rounded edit-data-<?= $row['id_parameter'] ?>" onclick="editData(<?= $row['id_parameter']; ?>)" title="Edit data">
                            <span class="fa-solid fa-edit"></span>
                        </button>
                        <button type="button" class="btn btn-danger btn-sm rounded" onclick="deleteData(<?= $row['id_parameter']; ?>)" title="Hapus data">
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
            url: '<?= site_url('master-data/parameter-pemeriksaan/edit-data/'); ?>' + id,
            dataType: 'json',
            cache: false,
            beforeSend: function() {
                $('.edit-data-'+id).attr('disable', 'disabled');
                $('.edit-data-'+id).html('<span class="fa-solid fa-spin fa-spinner"></span>');
                $('.invalid-feedback').html('<span class="fa-solid fa-spin fa-spinner"></span>');
            },
            complete: function() {
                $('.edit-data-'+id).removeAttr('disable');
                $('.edit-data-'+id).html('<span class="fa-solid fa-edit"></span>');
            },
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
                    url: '<?= site_url('master-data/parameter-pemeriksaan/delete-data/'); ?>' + id,
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