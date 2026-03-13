<table id="example" class="table table-hover table-bordered">
    <thead>
        <?php
        $arrth = ['#', 'No.Registrasi', 'Kode pelanggan', 'Nama', 'No.Telp/Hp pengirim', 'Instansi', 'Tgl & jam permintaan', 'Actions'];
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
            <tr id="myId-<?= $row['id'] ?>" data-urut=<?= $no; ?>>
                <td class="text-center">
                    <b><?= $no++; ?></b>
                </td>
                <td><?= $row['no_reg'] ?></td>
                <td><?= $row['kode_pelanggan'] ?></td>
                <td><?= $row['nama_pengirim'] ?></td>
                <td><?= $row['no_telp_pengirim'] ?></td>
                <td><?= $row['instansi'] ?></td>
                <td><?= date('d-m-Y H:i', strtotime($row['created_at'])); ?></td>
                <td>
                    <div class="d-flex justify-content-start gap-1">
                        <a href="<?= base_url('pelayanan/penawaran/detail/'.$row['no_reg']) ?>" class="btn btn-info rounded btn-sm" title="Lihat penawaran">
                            Lihat penawaran
                        </a>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script>
    $(document).ready(function() {
        new DataTable('#example', {
            responsive: true
        });
    })
</script>