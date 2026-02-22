<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel"><span class="fa-solid fa-plus-square"></span> <?= $title; ?></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('master-data/auth-groups-permissions/create-data'); ?>" class="form-data">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="group-id" class="form-label h5">Groups permissions</label>
                        <select class="form-select" name="group_id" aria-label="Default select example" id="group-id">
                            <?php foreach ($groupss as $row) : ?>
                             <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                            <?php endforeach;?>
                        </select>
                        <div class="invalid-feedback errorGroupId"></div>
                    </div>
                    <div class="mb-3">
                        <label for="permission-id" class="form-label h5">Permissions</label>
                        <select class="form-select" name="permission_id" aria-label="Default select example" id="permission-id">
                            <?php foreach ($permissions as $row) : ?>
                             <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                            <?php endforeach;?>
                        </select>
                        <div class="invalid-feedback errorPermissionId"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm rounded btn-simpan"><span class="fa-solid fa-save"></span> Simpan</button>
                    <button type="button" class="btn btn-secondary btn-sm rounded" data-bs-dismiss="modal"><span class="fa-solid fa-close"></span> Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="<?= base_url('assets/js/Master/@save_groups_permissions.js') ?>"></script>
