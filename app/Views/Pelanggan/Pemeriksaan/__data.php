<table id="example" class="table table-hover table-bordered">
    <thead>
        <?php
        $arrth = ['No', 'No.Registrasi', 'Kode pelanggan', 'Nama pengirim', 'Tgl & Jam permintaan', ''];
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
                <td><b><?= $no++; ?></b></td>
                <td class="text-center"><?= $row['no_reg'] ?></td>
                <td class="text-center"><?= $row['kode_pelanggan'] ?></td>
                <td><?= $row['nama_pengirim']; ?></td>
                <td class="text-center"><?= date('d/m/Y H:i', strtotime($row['created_at'])) ?></td>
                <td>
                    <div class="d-flex justify-content-end">
                        <a href="<?= site_url('pelanggan/pelayanan/list-pemeriksaan/index/'.$row['no_reg']) ?>" class="btn btn-primary btn-xs">Pemeriksaan</a>
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