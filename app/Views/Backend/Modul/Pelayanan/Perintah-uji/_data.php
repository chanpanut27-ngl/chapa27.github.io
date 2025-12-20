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
                       <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary btn-sm rounded btn-tambah" data-id="<?= $row['id_instalasi']; ?>" data-kode="<?= $row['kode_pengantar'];?>">
                            <span class="pc-micon"><span class="fa-solid fa-plus-circle"></span></span>
                        </button>
                    </div>
                </td>
            </tr>
        <?php endforeach;?>
    </tbody>
</table>
<script>
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

    $(".btn-tambah").click(function(e) {
        e.preventDefault();
        var id_instalasi = $(this).data("id");
        var kode_pengantar = $(this).data('kode');
        $.ajax({
            url: "<?= site_url('pelayanan/perintah-uji-sampel/add-data'); ?>",
            dataType: 'json',
            cache: false,
            data:{
                 id_instalasi:id_instalasi,
                 kode_pengantar:kode_pengantar
            },
            success: function(response) {
                $(".view-modal").html(response.data).show();
                $("#exampleModal").modal('show');
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        })
    })
    

    $(document).ready(function() {
        new DataTable('#example', {
            responsive: true
        });
    })
</script>