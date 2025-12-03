<table id="example" class="table table-hover table-bordered">
    <thead style="font-family: calibri;">
        <?php
        $arrth = ['No', 'Kode coolbox', 'Instansi', 'Status', 'Tgl & Jam', 'Keterangan', 'foto', ''];
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
            if ($row['status'] == 1) {
                $status = '<span class="badge bg-primary">Masuk</span>';
            }else if ($row['status'] == 2) {
                $status = '<span class="badge bg-success">Dititip</span>';
            }else{
                $status = '<span class="badge bg-danger">Keluar</span>';
            }
        ?>
            <tr id="myId-<?= $row['idx']; ?>" data-urut=<?= $no; ?>>
                <td><b><?= $no++; ?></b></td>
                <td><?= $row['kode_coolbox']; ?></td>
                <td><?= $row['nama_instansi']; ?></td>
                <td><?= $status; ?></td>
                <td><?= date('d/m/Y', strtotime($row['tanggal'])).' '. date('H:i', strtotime($row['jam'])); ?></td>
                <td><?= $row['keterangan']; ?></td>
                <td>
                    <button type="button" class="btn btn-default btn-sm" onclick="addFoto(<?= $row['idx']; ?>)" title="Input Foto">
                        <i class="fa-solid fa-image"></i>
                    </button>
                </td>
                <td>
                    <div class="d-flex justify-content-start gap-1">
                        <button type="button" class="btn btn-warning btn-sm" onclick="editData(<?= $row['idx']; ?>)" title="Edit data">
                            <i class="fa-solid fa-edit"></i>
                        </button>
                        <button type="button" class="btn btn-danger btn-sm" onclick="deleteData(<?= $row['idx']; ?>)" title="Hapus data">
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
            url: '<?= site_url('pengaturan-coolbox/cool-box/edit-data/'); ?>' + id,
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

     function addFoto(id) {
        $.ajax({
            type: 'get',
            url: '<?= site_url('pengaturan-coolbox/posisi-coolbox/add-foto/'); ?>' + id,
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
                    url: '<?= site_url('pengaturan-coolbox/posisi-coolbox/delete-data/'); ?>' + id,
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