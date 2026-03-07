<table id="example" class="table table-hover table-bordered">
    <thead>
        <?php
        $arrth = ['No', 'Nomor antrian', 'Kode coolbox', 'Instansi', 'Tanggal', 'Jam', ''];
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
            <tr id="myId-<?= $row['idx'] ?>" data-urut=<?= $no; ?>>
                <td><b><?= $no++; ?></b></td>
                <td><?= $row['no_antrian'] ?></td>
                <td><?= $row['kode_coolbox'] ?></td>
                <td><?= $row['nama_instansi'] ?></td>
                <td><?= date('d/m/Y', strtotime($row['tgl_terima_coolbox'])) ?></td>
                <td><?= date('H:i', strtotime($row['jam_terima_coolbox'])) ?></td>
                <td>
                    <div class="d-flex justify-content-start gap-1">
                        <button type="button" class="btn btn-danger btn-sm rounded" onclick="deleteData(<?= $row['idx'] ?>)" title="Hapus data">
                            <i class="ti ti-trash"></i>
                        </button>
                        <button class="btn btn-info rounded btn-sm" onclick="clickBtn(<?= $row['idx'];?>)" title="Lihat">
                            <i class="ti ti-eye"></i>
                        </button>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
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
                    url: '<?= site_url('coolbox/antrian-coolbox/delete-data/'); ?>' + id,
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

    function clickBtn(id) {
        var urls = 'coolbox/antrian-coolbox/cetak-label/'+id;
        var WinPrint = window.open('<?= site_url() ?>'+urls, '', 'left=0,top=0,width=1000,height=900,toolbar=0,scrollbars=0,status=0');
        WinPrint.document.write(prtContent.innerHTML);
        WinPrint.document.close();
        WinPrint.focus();
        WinPrint.print();
        WinPrint.close();
    }

    $(document).ready(function() {
        new DataTable('#example', {
            responsive: true
        });
    })
</script>