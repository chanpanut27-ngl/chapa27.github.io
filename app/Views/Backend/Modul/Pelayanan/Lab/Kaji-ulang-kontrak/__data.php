<?php
$array_result = [];
$row = null;

foreach ($items as $row) {
    $array_result[] = $row;
}

if ($row) {
   ?>
   <button type="button" class="btn btn-warning btn-sm rounded btn-edit" onclick="editData(<?= $row['id']; ?>)" title="Edit data">
       <i class="ti ti-edit"></i>
    </button>&nbsp;
    <button type="button" class="btn btn-danger btn-sm rounded" onclick="deleteData(<?= $row['id']; ?>)" title="Hapus data">
       <i class="ti ti-trash"></i>
    </button>
   <?php
}
?>
<table class="table table-hover table-bordered">
    <tbody id="myId-<?= $row['id'] ?? null; ?>">
        <tr>
            <td style="width: 25%;"><b>Alat utama</b></td>
            <td>: <?= $row['alat_utama'] ?? '' ?></td>
        </tr>
         <tr>
            <td><b>Alat pendukung</b></td>
            <td>: <?= $row['alat_pendukung'] ?? '' ?></td>
        </tr>
        <tr>
            <td><b>Personil laboratorium</b></td>
            <td>: <?= $row['personil_lab'] ?? '' ?></td>
        </tr>
        <tr>
            <td><b>Metode pemeriksaan</b></td>
            <td>: <?= $row['metode_pemeriksaan'] ?? '' ?></td>
        </tr>
        <tr>
            <td><b>Uji mutu (Quality control)</b></td>
            <td>: <?= $row['uji_mutu'] ?? '' ?></td>
        </tr>
        <tr>
            <td><b>Reagensa dan media</b></td>
            <td>: <?= $row['reagensa_dan_media'] ?? '' ?></td>
        </tr>
    </tbody>
</table>
<script>
    function editData(id) {
        $.ajax({
            type: 'get',
            url: '<?= site_url('pelayanan/pengantar-lab/kaji-ulang-kontrak/edit-data/'); ?>' + id,
            dataType: 'json',
            cache:false,
            beforeSend: function() {
                $('.btn-edit').attr('disable', 'disabled');
                $('.btn-edit').html('<span class="fa-solid fa-spin fa-spinner"></span>');
                $('.invalid-feedback').html('<span class="fa-solid fa-spin fa-spinner"></span>');
            },
            complete: function() {
                $('.btn-edit').removeAttr('disable');
                $('.btn-edit').html('<i class="ti ti-trash"></i>');
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
                    url: '<?= site_url('pelayanan/pengantar-lab/kaji-ulang-kontrak/delete-data/'); ?>' + id,
                    dataType: 'json',
                    success: function(response) {
                        if (response.sukses) {
                            Swal.fire({
                                title: "Hapus Data !",
                                text: response.sukses,
                                icon: "success",
                                timer: 2000,
                                width: '400px',
                                padding: '1em'
                            }).then((result) => {
                                if (result.dismiss === Swal.DismissReason.timer) {
                                   listData();
                                }
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
</script>