<table id="example" class="table table-hover table-bordered">
    <thead style="font-family: calibri;">
        <?php
        $arrth = ['No', 'Penyakit', 'Status', ''];
        echo '<tr>';
        foreach ($arrth as $th) :
            echo '<th>' . $th . '</th>';
        endforeach;
        echo '</tr>';
        ?>
    </thead>
    <tbody style="font-family: arial;">
        <?php
        $no = 1;
        foreach ($items as $row) :
        ?>
            <tr id="myId-<?= $row['id']; ?>" data-urut=<?= $no; ?>>
                <td><b><?= $no++; ?></b></td>
                <td><?= $row['penyakit']; ?></td>
                <td><?= $row['is_active'] == 1 ? '<span class="badge bg-success">Aktif</span>' : '<span class="badge bg-secondary">Tidak aktif</span>'; ?></td>
                <td>
                    <div class="d-flex justify-content-start gap-1">
                        <button type="button" class="btn btn-warning btn-sm" onclick="editData(<?= $row['id']; ?>)" title="Edit data">
                            <i class="fa-solid fa-edit"></i>
                        </button>
                        <button type="button" class="btn btn-danger btn-sm" onclick="deleteData(<?= $row['id']; ?>)" title="Hapus data">
                            <i class="fa-solid fa-trash-alt"></i>
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
            url: '<?= site_url('master-data/penyakit/edit-data/'); ?>' + id,
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
                    url: '<?= site_url('master-data/penyakit/delete-data/'); ?>' + id,
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