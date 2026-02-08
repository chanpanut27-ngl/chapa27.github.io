<table id="example" class="table table-hover table-bordered">
    <thead>
        <?php
        $arrth = ['No', 'No.Registrasi', 'Nama pengirim', 'Tgl & Jam pengambilan spesimen/sampel', 'Tgl & Jam permintaan', ''];
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
                <td><?= $row['nama_pengirim']; ?></td>
                <td style="text-align: center;"><?= date('d-m-Y', strtotime($row['tgl_ambil_sampel'])).' '.date('H:i', strtotime($row['jam_ambil_sampel'])); ?></td>
                <td><?= date('d-m-Y H:i', strtotime($row['created_at'])) ?></td>
                <td>
                    <div class="d-flex justify-content-start">
                        <a href="<?= base_url('pelayanan-sampel/permintaan-pemeriksaan/index/'.$row['no_reg']) ?>" class="btn btn-primary rounded btn-sm" title="Tambah pemeriksaan" style="padding:initial; font-size:13px;">
                            <span class="fa-solid fa-arrow-circle-right"></span> Tambah pemeriksaan
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