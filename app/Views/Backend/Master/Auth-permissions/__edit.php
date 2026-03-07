<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel"><i class="ti ti-edit fs-2"></i> <?= $title; ?></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('master-data/auth-permissions/update-data') ?>" class="form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="id" value="<?= $items['id'] ?>">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label h5">Group</label>
                        <input type="text" name="name" value="<?= $items['name'] ?>" class="form-control" id="name" autocomplete="off">
                        <div class="invalid-feedback errorName"></div>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label h5">Keterangan</label>
                        <input type="text" name="description" value="<?= $items['description'] ?>" class="form-control" id="description" autocomplete="off">
                        <div class="invalid-feedback errorDescription"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm rounded btn-ubah"><i class="ti ti-edit"></i> Ubah</button>
                    <button type="button" class="btn btn-secondary btn-sm rounded" data-bs-dismiss="modal"><i class="ti ti-x"></i> Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="<?= base_url('assets/js/Master/@update_auth_permissions.js') ?>"></script>
