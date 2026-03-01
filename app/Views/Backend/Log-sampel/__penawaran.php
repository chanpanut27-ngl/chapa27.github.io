<?= $this->extend('Backend/Log-sampel/index'); ?>

<?= $this->section('content_log'); ?>
<div class="table-responsive">
    <table class="table table-hover" id="pc-dt-simple">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama pelanggan</th>
                <th>Instansi</th>
                <th>Status</th>
                <th>Tanggal & User terima</th>
                <th class="text-center">Actions</th>
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
                <td><span class="badge bg-light-success rounded-pill f-12"><?= $row['status'] ?></span> </td>
                <td>
                    <div class="row">
                        <div class="col">
                            <h6 class="mb-0"><?= $row['created_at'] ?></h6>
                            <p class="text-muted f-12 mb-0"><?= $row['created_by'] ?></p>
                        </div>
                    </div>
                </td>
                <td class="text-center">
                    <ul class="list-inline me-auto mb-0">
                        <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" title="View">
                            <a href="#" class="avtar avtar-xs btn-link-secondary btn-pc-default" data-bs-toggle="modal"
                            data-bs-target="#customer-modal">
                            <i class="ti ti-eye f-18"></i>
                            </a>
                        </li>
                        <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" title="Edit">
                            <a href="#" class="avtar avtar-xs btn-link-success btn-pc-default" data-bs-toggle="modal"
                            data-bs-target="#customer-edit_add-modal">
                            <i class="ti ti-edit-circle f-18"></i>
                            </a>
                        </li>
                    </ul>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>
<script>
    $(document).ready(function() {
        new DataTable('#pc-dt-simple', {
            responsive: true
        });
    })
</script>
<?= $this->endSection(); ?>
