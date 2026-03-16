<table id="example" class="table table-hover table-bordered">
    <thead>
        <?php
        $arrth = ['#', 'Nama Lab', 'Jenis sampel'];
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
        var_dump($nama_lab);
        foreach ($nama_lab as $row) :
        ?>
            <tr>
                <td><b><?= $no++; ?></b></td>
                <td><?= $row['nama_lab'] ?></td>
                <td><?= $row['jenis_sampel'] ?></td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2">
                    <table class="table">
                        <tbody>
                    <?php
                    foreach ($items as $lhu) :
                        if ($row['id_lab'] == $lhu['id_lab']) {
                    ?>
                    <tr>
                        <td><?= $lhu['parameter'] ?></td>
                        <td>
                            <input type="text" class="form-control w-50">
                        </td>
                    </tr>
                    <?php } endforeach;?>
                        </tbody>
                    </table>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<script>
    function editData(id) {
        $.ajax({
            type: 'get',
            url: '<?= site_url('master-data/instansi/edit-data/'); ?>' + id,
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

    function deleteData(id) 
    {
        var myElement = $('#myId-' + id);
        if (myElement.data('urut')) {
            myElement.addClass('bg bg-danger');
        }
        Swal.fire({
            title: "Yakin untuk menghapus data ?",
            text: `No : ` + myElement.data('urut'),
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
                    url: '<?= site_url('master-data/instansi/delete-data/'); ?>' + id,
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