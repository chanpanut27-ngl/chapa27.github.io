<table id="example" class="table table-hover table-bordered">
    <thead>
        <?php
        $arrth = ['#', 'Kode pengantar', 'Pelanggan', 'Alamat', 'No. Telp/Hp', 'Tanggal', 'Status', 'Actions'];
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
            <tr id="myId-<?= $row['id_pengantar']; ?>" data-urut=<?= $no; ?>>
                <td><b><?= $no++; ?></b></td>
                <td><?= $row['kode_pengantar']; ?></td>
                <td><?= $row['nama_pengirim']; ?></td>
                <td><?= $row['alamat']; ?></td>
                <td><?= $row['no_telp_pengirim']; ?></td>
                <td><?= date('d/m/Y', strtotime($row['tanggal'])); ?></td>
                <td><?= $row['is_active'] == 1 ? '<span class="badge bg-success rounded">Aktif</span>' : '<span class="badge bg-secondary rounded">Tidak aktif</span>'; ?></td>
                <td>
                    <div class="d-flex justify-content-start gap-1">
                        <button type="button" class="btn btn-warning border-0 btn-sm rounded btn-edit-<?= $row['id_pengantar'] ?>" onclick="editData(<?= $row['id_pengantar'] ?>)" title="Edit data">
                            <i class="ti ti-edit"></i>
                        </button>
                       <button type="button" class="btn btn-danger border-0 btn-sm rounded" onclick="deleteData(<?= $row['id_pengantar']; ?>)" title="Hapus data">
                            <i class="ti ti-trash"></i>
                        </button>
                        <a href="<?= base_url('pelayanan/laboratorium-tujuan/index/'.strtolower($row['kode_pengantar'])); ?>" class="btn btn-primary border-0 rounded btn-sm" title="Laboratorium tujuan">
                            <i class="ti ti-flask"></i>
                        </a>
                        <a href="<?= base_url('pelayanan/pengantar-lab/proses/index/'.strtolower($row['kode_pengantar'])); ?>" class="btn btn-info border-0 rounded btn-sm" title="Proses pengantar">
                            Pengantar
                        </a>
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
            url: '<?= site_url('pelayanan/pengantar-lab/edit-data/'); ?>' + id,
            dataType: 'json',
            cache: false,
            beforeSend: function() {
                $('.btn-edit-'+id).attr('disable', 'disabled');
                $('.btn-edit-'+id).html('<span class="fa-solid fa-spin fa-spinner"></span>');
            },
            complete: function() {
                $('.btn-edit-'+id).removeAttr('disable');
                $('.btn-edit-'+id).html('<i class="ti ti-edit"></i>');
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

    function addLabTujuan(id) {
       $.ajax({
            type: 'get',
            url: '<?= site_url('laboratorium-tujuan/index'); ?>' + id,
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
                    url: '<?= site_url('pelayanan/pengantar-lab/delete-data/'); ?>' + id,
                    dataType: 'json',
                    success: function(response) {
                        if (response.error) {
                            Swal.fire({
                                title: "Gagal!",
                                text: response.error,
                                icon: "error"
                            });
                            myElement.removeClass('bg bg-danger');
                        } else {
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