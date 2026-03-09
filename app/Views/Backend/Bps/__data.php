<style>
    .swal2-container {
    z-index: 99999 !important; /* Set angka sangat tinggi */
}
</style>
<table id="example1" class="table table-hover table-bordered">
    <thead>
        <?php
        $arrth = ['#', 'Jumlah orang', 'Jumlah hari', 'Biaya satuan', 'Jumlah biaya', 'Actions'];
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
        $jumlah_biaya = 0;
        foreach ($items as $row) :
            $jumlah_biaya = $row['jumlah_orang'] * $row['jumlah_hari'] * $row['biaya_satuan'];
        ?>
            <tr id="myIdBps-<?= $row['id'] ?>" data-urut=<?= $no; ?>>
                <td><b><?= $no++; ?></b></td>
                <td><?= $row['jumlah_orang'] ?></td>
                <td><?= $row['jumlah_hari'] ?></td>
                <td><?= $row['biaya_satuan'] ?></td>
                <td><?= $jumlah_biaya; ?></td>
                <td class="text-center">
                    <div class="d-flex justify-content-start">
                        <button type="button" class="btn btn-danger border-0 rounded btn-sm" onclick="deleteBps(<?= $row['id'] ?>)" title="Hapus data">
                            <i class="ti ti-trash"></i>
                        </button>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<script>
    function deleteBps(id) {
        var myElement = $('#myIdBps-' + id);
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
                    url: '<?= site_url('pelayanan/biaya-penyelenggara-sampling/delete-data/'); ?>' + id,
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