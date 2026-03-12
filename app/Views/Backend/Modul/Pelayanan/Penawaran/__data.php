<table id="example" class="table table-hover table-bordered">
    <thead>
        <?php
        $arrth = ['#', 'No. Reg', 'Kode pelanggan', 'Nama pelanggan', 'No. Telp/Hp pelanggan', 'Instansi', 'Tgl & jam permintaan', 'Actions'];
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
            <tr id="myId-<?= $row['id_pelanggan'] ?>" data-urut=<?= $no; ?>>
                <td class="text-center">
                    <b><?= $no++; ?></b>
                    <button type="button" class="btn bg-blue-500 text-light btn-sm rounded btn-bps-<?= $row['id_pelanggan']; ?>" onclick="biayaPygSampling(<?= $row['id_pelanggan']; ?>)" title="Biaya penyelenggara sampling">
                        <i class="ti ti-pencil f-18"></i>
                    </button>
                </td>
                <td><?= $row['no_reg'] ?></td>
                <td><?= $row['kode_pelanggan'] ?></td>
                <td><?= $row['nama_pengirim'] ?></td>
                <td><?= $row['no_telp_pengirim'] ?></td>
                <td><?= $row['instansi'] ?></td>
                <td><?= date('d-m-Y H:i', strtotime($row['created_at'])); ?></td>
                <td>
                    <div class="d-flex justify-content-start">
                        <a href="<?= base_url('pelayanan/penawaran/detail/'.$row['no_reg']) ?>" class="btn btn-info rounded btn-sm" title="Proses Penawaran">
                            Penawaran
                        </a>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script>
    function biayaPygSampling(id) 
    {
        $.ajax({
            type: 'get',
            url: '<?= site_url('pelayanan/biaya-penyelenggara-sampling/index/'); ?>' + id,
            dataType: 'json',
            cache: false,
            beforeSend: function() {
                $('.btn-bps-'+id).attr('disable', 'disabled');
                $('.btn-bps-'+id).html('<span class="fa-solid fa-spin fa-spinner"></span>');
            },
            complete: function() {
                $('.btn-bps-'+id).removeAttr('disable');
                $('.btn-bps-'+id).html('<i class="ti ti-pencil f-18"></i>');
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
    $(document).ready(function() {
        new DataTable('#example', {
            responsive: true
        });
    })
</script>