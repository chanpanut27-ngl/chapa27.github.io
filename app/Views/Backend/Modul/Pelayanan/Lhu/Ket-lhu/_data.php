<table id="example" class="table table-hover table-bordered">
    <?php if (!$items) {
       ?>
       <tbody style="font-family: arial;">
        <tr>
            <td style="width: 25%;"><b>Parameter tidak dapat di uji</b></td>
            <td>: </td>
        </tr>
         <tr>
            <td><b>Sub kontrak</b></td>
            <td>: </td>
        </tr>
        <tr>
            <td><b>Kontrak di ulang</b></td>
            <td>: </td>
        </tr>
        <tr>
            <td><b>Permintaan khusus</b></td>
            <td>: </td>
        </tr>
    </tbody>
       <?php
    } else { foreach ($items as $row) : ?>
    <button type="button" class="btn btn-warning btn-sm" onclick="editData(<?= $row['id']; ?>)" title="Edit data">
       <span class="fa-solid fa-edit"></span>
    </button>&nbsp;
    <button type="button" class="btn btn-danger btn-sm" onclick="deleteData(<?= $row['id']; ?>)" title="Hapus data">
       <span class="fa-solid fa-trash-alt"></span>
    </button>
    <tbody style="font-family: arial;" id="myId-<?= $row['id']; ?>">
        <tr>
            <td style="width: 25%;"><b>Parameter tidak dapat di uji</b></td>
            <td>: <?= $row['paramater_tidak_dapat_di_uji'] ?></td>
        </tr>
         <tr>
            <td><b>Sub kontrak</b></td>
            <td>: <?= $row['sub_kontrak'] ?></td>
        </tr>
        <tr>
            <td><b>Kontrak di ulang</b></td>
            <td>: <?= $row['kontrak_diulang'] ?></td>
        </tr>
        <tr>
            <td><b>Permintaan khusus</b></td>
            <td>: <?= $row['permintaan_khusus'] ?></td>
        </tr>
    </tbody>
    <?php endforeach; } ?>
</table>
<script>
    function editData(id) {
        $.ajax({
            type: 'get',
            url: '<?= site_url('pelayanan-pemeriksaan/keterangan-lhu/edit-data/'); ?>' + id,
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
        if (myElement) {
            myElement.addClass('bg bg-danger');
        }
        Swal.fire({
            title: "Yakin untuk menghapus data ?",
            text: `No.id : ` + id,
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
                    url: '<?= site_url('pelayanan-pemeriksaan/keterangan-lhu/delete-data/'); ?>' + id,
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