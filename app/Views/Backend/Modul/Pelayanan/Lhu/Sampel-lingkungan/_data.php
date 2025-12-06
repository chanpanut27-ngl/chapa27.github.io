<table id="example" class="table table-responsive table-hover table-bordered">
    <thead style="font-family: calibri;">
        <?php
        $arrth = [
            'No', 'Kode sampel', 'Jenis sampel', 'Lokasi pengambilan sampel', 
            'Tanggal/Jam pengambilan sampel', 'Peraturan/Baku mutu', 'Metode pemeriksaan', 'Volume/Berat', 'Jenis wadah', 'Jenis pengawet', ' '];
        echo '<tr>';
        foreach ($arrth as $th) :
            echo '<th>' . ucwords($th) . '</th>';
        endforeach;
        echo '</tr>';
        ?>
    </thead>
    <tbody style="font-family: arial;">
        <?php
        $no = 1;
        foreach ($items as $row) :
        ?>
            <tr id="myId-<?= $row['id_psl']; ?>" data-urut=<?= $no; ?>>
                <td><b><?= $no++; ?></b></td>
                <td><?= $row['kode_sampel']; ?></td>
                <td><?= explode(', ', $row['jenis_sampel'])[0]; ?></td>
                <td><?= $row['lokasi_pengambilan_sampel']; ?></td>
                <td><?= date('d/m/Y', strtotime($row['tgl_ambil_sampel'])).' '. date('H:i', strtotime($row['jam_ambil_sampel'])); ?></td>
                <td><?= explode(', ', $row['jenis_sampel'])[0]; ?></td>
                <td><?= $row['metode_pemeriksaan']; ?></td>
                <td><?= $row['volume_atau_berat']; ?></td>
                <td><?= $row['jenis_wadah']; ?></td>
                <td><?= $row['jenis_pengawet']; ?></td>
                <td>
                    <div class="d-flex justify-content-start gap-1">
                        <button type="button" class="btn btn-warning btn-sm" onclick="editData(<?= $row['id_psl']; ?>)" title="Edit data">
                            <i class="fa-solid fa-edit"></i>
                        </button>
                        <button type="button" class="btn btn-danger btn-sm" onclick="deleteData(<?= $row['id_psl']; ?>)" title="Hapus data">
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
            url: '<?= site_url('pelayanan-pemeriksaan/lhu/sampel-lingkungan/edit-data/'); ?>' + id,
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
                    url: '<?= site_url('pelayanan-pemeriksaan/lhu/sampel-lingkungan/delete-data/'); ?>' + id,
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