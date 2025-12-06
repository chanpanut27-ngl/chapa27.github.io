<table id="example" class="table table-hover table-bordered">
    <thead style="font-family: calibri;">
        <?php

use App\Models\MappSettingLabModel;

        $arrth = ['No', 'Kode Pengantar', 'Pelanggan', 'Alamat', 'No.Telp', 'Tanggal', 'Tahun', 'Status', ''];
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
            <tr id="myId-<?= $row['id_pengantar']; ?>" data-urut=<?= $no; ?>>
                <td><b><?= $no++; ?></b></td>
                <td><?= $row['kode_pengantar']; ?></td>
                <td><?= $row['nama']; ?></td>
                <td><?= $row['alamat']; ?></td>
                <td><?= $row['no_telp']; ?></td>
                <td><?= date('d/m/Y', strtotime($row['tanggal'])); ?></td>
                <td><?= $row['tahun']; ?></td>
                <td><?= $row['is_active'] == 1 ? '<span class="badge bg-success rounded">Aktif</span>' : '<span class="badge bg-secondary rounded">Tidak aktif</span>'; ?></td>
                <td>
                    <div class="d-flex justify-content-start gap-1">
                       <button type="button" class="btn btn-danger btn-sm rounded" onclick="deleteData(<?= $row['id_pengantar']; ?>)" title="Hapus data">
                            <i class="fa-solid fa-trash-alt"></i>
                        </button>
                        <button type="button" class="btn btn-primary btn-sm rounded" onclick="addLabTujuan(<?= $row['id_pengantar']; ?>)" title="Tambah laboratorium tujuan">
                            <i class="fa-solid fa-circle-plus"></i>
                        </button>
                         <a href="<?= base_url('pelayanan-pemeriksaan/proses-lhu/index/'.strtolower($row['kode_pengantar'])); ?>" class="btn btn-secondary btn-sm" title="Proses LHU">
                            <i class="fa-solid fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<script>
    function addLabTujuan(id) {
       $.ajax({
            type: 'get',
            url: '<?= site_url('laboratorium-tujuan/add-data/'); ?>' + id,
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
                    url: '<?= site_url('pelayanan-pemeriksaan/pengantar-lhu/delete-data/'); ?>' + id,
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