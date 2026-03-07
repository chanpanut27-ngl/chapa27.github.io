<?= $this->extend('Backend/Log-sampel/index'); ?>

<?= $this->section('content_log'); ?>

<div class="table-responsive">
    <table class="table table-hover" id="example">
        <thead>
            <tr>
                <th>#</th>
                <th>Pelanggan</th>
                <th>Instansi</th>
                <th>Tgl/jam & Penerima</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no=1;
            foreach ($items as $row) :
            ?>
            <tr>
                <td><?= $no++ ?></td>
                <td>
                    <div class="row">
                        <div class="col-auto">
                            <img src="<?= base_url('assets/images/user-1.jpg') ?>" alt="user-image" class="wid-40 rounded-circle">
                        </div>
                        <div class="col">
                            <h6 class="mb-0"><?= $row['kode_pelanggan'] ?></h6>
                            <h6 class="mb-0"><?= $row['nama_pengirim'] ?></h6>
                            <p class="text-muted f-12 mb-0"><?= $row['no_telp_pengirim'] ?></p>
                        </div>
                    </div>
                </td>
                <td><?= $row['instansi'] ?></td>
                <td>
                    <div class="row">
                        <div class="col">
                            <h6 class="mb-0"><?= date('d/m/Y', strtotime($row['created_at'])) ?></h6>
                            <p class="text-muted f-12 mb-0"><?= $row['created_by'] ?></p>
                        </div>
                    </div>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>

</div>
<?= $this->endSection(); ?>


