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
                <td><?= $row['no_reg'] ?></td>
                <td><?= $row['kode_pelanggan'] ?></td>
                <td><?= $row['nama_pengirim']; ?></td>
                <td><?= date('d-m-Y H:i', strtotime($row['created_at'])) ?></td>
                <td>
                    <div class="d-flex justify-content-end">
                        <a href="<?= site_url('pelanggan/pelayanan/list-pemeriksaan/index/'.$row['no_reg']) ?>" class="btn btn-primary btn-xs"><i class="ti ti-arrow-right-circle"></i>Tambah Pemeriksaan</a>
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