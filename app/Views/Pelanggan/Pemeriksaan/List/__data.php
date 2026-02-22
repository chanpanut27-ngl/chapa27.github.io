<table id="example" class="table table-hover table-bordered">
    <thead>
        <?php
        $arrth = ['No', 'Parameter', 'Harga per titik', 'Pemeriksaan', 'Peraturan', 'Laboratorium', 'Tgl & Jam', ''];
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
            <tr id="myId-<?= $row['id_permintaan_pemeriksaan']; ?>" data-urut=<?= $no; ?>>
                <td><b><?= $no++; ?></b></td>
                <td><?= $row['parameter']; ?></td>
                <td style="text-align: right;"><?= number_to_currency($row['harga_per_titik'], 'IDR', 'ID', 0); ?></td>
                <td><?= $row['jenis_sampel']; ?></td>
                <td><?= $row['peraturan']; ?></td>
                <td><?= $row['nama_lab']; ?></td>
                <td><?= date('d-m-Y H:i', strtotime($row['tgl_entry'])); ?></td>
                
                <td>
                    <div class="d-flex justify-content-start gap-1">
                        <?php 
                        if ($row['ket_peraturan'] == 'Tidak lengkap') : 
                        echo '<span class="badge text-bg-dark">Tanpa peraturan</span>'; 
                        ?>
                        <button type="button" class="btn btn-danger btn-sm rounded btn-delete-pemeriksaan" onclick="deleteData(<?= $row['id_permintaan_pemeriksaan'] ?>)" data-id="<?= $row['id_permintaan_pemeriksaan']; ?>" title="Hapus data">
                            <i class="ti ti-trash"></i>
                        </button>
                        <?php 
                        else : 
                        echo '<span class="badge text-bg-success">Sesuai peraturan</span>'; 
                        ?>
                        <button type="button" class="btn btn-danger btn-sm rounded btn-delete-pemeriksaan" onclick="deleteData(<?= $row['id_permintaan_pemeriksaan'] ?>)" data-id="<?= $row['id_permintaan_pemeriksaan']; ?>" title="Hapus data">
                            <i class="ti ti-trash"></i>
                        </button>
                        <?php
                        endif;?>
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
            url: '<?= site_url('master-data/instansi/edit-data/'); ?>' + id,
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
                    url: '<?= site_url('pelanggan/pelayanan/list-pemeriksaan/delete-data/'); ?>' + id,
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
        new DataTable('#example', {
            responsive: true
        });
    })
</script>