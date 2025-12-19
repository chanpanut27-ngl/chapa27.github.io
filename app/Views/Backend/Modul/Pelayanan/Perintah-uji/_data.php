<table id="example" class="table table-hover table-bordered">
    <thead style="font-family: arial;">
        <?php
        $arrth = ['No', 'Kode Pengantar', 'Nama Lab', 'Instalasi', ''];
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
                <td><?= $row['nama_lab']; ?></td>
                <td><?= $row['nama_instalasi']; ?></td>
                <td>
                    <div class="d-flex justify-content-start">
                        <a href="<?= base_url('pelayanan/proses-perintah-uji/create-data/'.strtolower($row['kode_pengantar'])).'/'.$row['id_instalasi']; ?>" class="btn btn-primary rounded btn-sm btn-tambah" title="Proses pengantar LHU">
                            <span class="fa-solid fa-plus-circle"></span>
                        </a>
                    </div>
                </td>
            </tr>
        <?php endforeach;?>
    </tbody>
</table>
<script>
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
                    url: '<?= site_url('pelayanan/pengantar-lhu/delete-data/'); ?>' + id,
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