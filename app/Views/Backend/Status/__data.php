<style>
    .swal2-container {
    z-index: 99999 !important; /* Set angka sangat tinggi */
}
</style>
<table id="example1" class="table table-hover table-bordered">
    <thead>
        <?php
        $arrth = ['No', 'Nama pelanggan', 'Status', 'Keterangan', ''];
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
            <tr id="myIdSts-<?= $row['id_status'] ?>" data-urut=<?= $no; ?>>
                <td><b><?= $no++; ?></b></td>
                <td><?= $row['nama_pengirim'] ?></td>
                <td><?= $row['status'] ?></td>
                <td><?= $row['keterangan'] ?></td>
                <td class="text-center">
                    <div class="d-flex justify-content-start">
                        <button type="button" class="btn btn-danger rounded btn-sm" onclick="deleteStatus(<?= $row['id_status'] ?>)" title="Hapus data">
                            <i class="ti ti-trash"></i>
                        </button>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<script>
    function deleteStatus(id) {
        var myElement = $('#myIdSts-' + id);
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
                    url: '<?= site_url('pelayanan/status-layanan/delete-data/'); ?>' + id,
                    dataType: 'json',
                    success: function(response) {
                        if (response.sukses) {
                            Swal.fire({
                                title: "Hapus Data !",
                                text: response.sukses,
                                icon: "success",
                                timer: 2000,
                                width: '400px',
                                padding: '1em',
                                showConfirmButton: false
                            }).then((result) => {
                                if (result.dismiss === Swal.DismissReason.timer) {
                                    listData();
                                    $(".btn-refresh").trigger('click');
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
   
    $(document).ready(function() {
        new DataTable('#example1', {
            responsive: true,
        });
    })

</script>