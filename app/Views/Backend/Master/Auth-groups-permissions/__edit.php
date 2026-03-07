<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel"><i class="ti ti-edit fs-2"></i> <?= $title; ?></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('master-data/auth-groups-permissions/update-data'); ?>" class="form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="id" value="<?= $items['id_groups_permissions']; ?>">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="group-id" class="form-label h5">Groups permissions</label>
                        <select class="form-select" name="group_id" aria-label="Default select example" id="group-id">
                            <?php foreach ($groupss as $row) : ?>
                             <option value="<?= $row['id'] ?>" <?= $items['group_id'] == $row['id'] ? 'selected' : '' ?>><?= $row['name'] ?></option>
                            <?php endforeach;?>
                        </select>
                        <div class="invalid-feedback errorGroupId"></div>
                    </div>
                    <div class="mb-3">
                        <label for="permission-id" class="form-label h5">Permissions</label>
                        <select class="form-select" name="permission_id" aria-label="Default select example" id="permission-id">
                            <?php foreach ($permissions as $row) : ?>
                             <option value="<?= $row['id'] ?>" <?= $items['permission_id'] == $row['id'] ? 'selected' : '' ?>><?= $row['name'] ?></option>
                            <?php endforeach;?>
                        </select>
                        <div class="invalid-feedback errorPermissionId"></div>
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
<script src="<?= base_url('assets/js/Master/@update_groups_permissions.js') ?>"></script>
