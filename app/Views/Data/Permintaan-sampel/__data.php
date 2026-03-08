
<style>
    .swal2-container {
    z-index: 99999 !important; /* Set angka sangat tinggi */
}
</style>
<table id="examples" class="table table-bordered">
    <thead>
        <tr>
            <th class="fw-bold">#</th>
            <th class="fw-bold text-center">Jenis sampel</th>
            <th class="fw-bold text-center">Peraturan</th>
            <th class="fw-bold text-center">Parameter</th>
            <th class="fw-bold text-center">Lab. pemeriksaan</th>
            <th class="fw-bold text-center">Jumlah sampel</th>
            <th class="fw-bold text-center">Harga</th>
            <th class="fw-bold text-center">Jumlah biaya</th>
            <th class="fw-bold text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php
        use App\Models\ParameterModel;
        $no = 1; 
        $m_parameter = new ParameterModel();
        $parameter = $m_parameter->get_data();
    
        foreach ($items as $row) :
    ?>
        <tr id="myIndex-<?= $row['id_permintaan_sampel'] ?>" data-urut=<?= $no; ?>>
            <td class="text-center"><?= $no++; ?></td>
            <td><?= $row['jenis_sampel'] ?></td>
            <td><?= $row['peraturan'] ?></td>
            <td>
                <?php
                $imp = '';
                $arr_parameter = [];
                foreach ($parameter as $key) {

                    if ($row['id_jenis_sampel'] == $key['id_jenis_sampel']) 
                    {
                        $arr_parameter[] = $key['parameter'];
                    }

                }
                $imp = implode(', ', $arr_parameter);
                echo $imp;
                ?>
            </td>
            <td><?= $row['nama_lab'] ?></td>
            <td style="text-align: center;"><?= $row['jumlah_sampel'] ?></td>
            <td style="text-align: right;"><?= number_to_currency($row['pnbp'], 'IDR', 'ID', 0); ?></td>
            <td style="text-align: right;"><?= number_to_currency($row['jumlah_biaya'], 'IDR', 'ID', 0); ?></td>
            <td>
                <div class="d-flex justify-content-start gap-1">
                    <button type="button" class="btn btn-warning border-0 btn-sm rounded btn-edit-<?= $row['id_permintaan_sampel'] ?>" onclick="editData(<?= $row['id_permintaan_sampel'] ?>)" title="Edit data">
                        <i class="ti ti-edit"></i>
                    </button>
                    <button type="button" class="btn btn-danger border-0 btn-sm rounded" onclick="deleteData(<?= $row['id_permintaan_sampel'] ?>)" title="Hapus data">
                        <i class="ti ti-trash"></i>
                    </button>
                </div>
            </td>
        </tr>
    <?php endforeach;?>
</tbody>
</table>
<div class="view-modal" style="display: none;"></div>

<script>
    function editData(id) {
        $.ajax({
            type: 'get',
            url: '<?= site_url('pemeriksaan/permintaan-sampel/edit-data/'); ?>' + id,
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
                    $(".view-modals").html(response.sukses).show();
                    $("#permintaanSampelModal").modal('show');
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + ' ' + xhr.responseText + ' ' + thrownError);
            }
        })
    }

     function deleteData(id) {
        var myElement = $('#myIndex-' + id);
        if (myElement.data('urut')) {
            myElement.addClass('bg bg-danger');
        }
        Swal.fire({
            title: "Yakin untuk menghapus data ?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, Hapus!",
            cancelButtonText: "Tidak",
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: 'get',
                    url: '<?= site_url('pemeriksaan/permintaan-sampel/delete-data/'); ?>' + id,
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

    $(document).ready(function() {
         new DataTable('#examples', {
            responsive: true
        });
    })
</script>