<table id="example" class="table table-hover table-bordered">
    <thead>
        <?php
        $arrth = ['No', 'No.Registrasi', 'Kode pelanggan', 'Nama pengirim', 'No.Telp/Hp Pengirim', 'Spesimen/Sampel', 'Tgl & Jam permintaan', ''];
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
            <tr id="myId-<?= $row['id']; ?>" data-urut=<?= $no; ?>>
                <td><b><?= $no++; ?></b></td>
                <td><?= $row['no_reg']; ?></td>
                <td><?= $row['kode_pelanggan']; ?></td>
                <td><?= $row['nama_pengirim']; ?></td>
                <td><?= $row['no_telp_pengirim']; ?></td>
                <td><?= $row['spesimen_atau_sampel']; ?></td>
                <td><?= date('d-m-Y H:i', strtotime($row['created_at'])); ?></td>
                <td>
                    <div class="d-flex justify-content-start gap-1">
                        <button type="button" class="btn btn-warning btn-sm rounded btn-edit-<?= $row['id'] ?>" onclick="editData(<?= $row['id'] ?>)" title="Edit data">
                            <span class="fa-solid fa-edit"></span>
                        </button>
                        <button type="button" class="btn btn-danger btn-sm rounded" onclick="deleteData(<?= $row['id'] ?>)" title="Hapus data">
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
            url: '<?= site_url('pelanggan/permintaan-pelanggan/edit-data/'); ?>' + id,
            dataType: 'json',
            cache: false,
            beforeSend: function() {
                $('.btn-edit-'+id).attr('disable', 'disabled');
                $('.btn-edit-'+id).html('<span class="fa-solid fa-spin fa-spinner"></span>');
            },
            complete: function() {
                $('.btn-edit-'+id).removeAttr('disable');
                $('.btn-edit-'+id).html('<span class="fa-solid fa-edit"></span>');
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
                    url: '<?= site_url('pelanggan/permintaan-pelanggan/delete-data/'); ?>' + id,
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