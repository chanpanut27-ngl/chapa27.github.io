<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel"><i class="ti ti-edit fs-2"></i> <?= $title; ?></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('master-data/auth-groups-users/update-data') ?>" class="form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="id" value="<?= $items['id_groups_users'] ?>">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="group-id" class="form-label h5">Groups users</label>
                        <select class="form-select" name="group_id" aria-label="Default select example" id="group-id">
                            <?php foreach ($groups_users as $row) : ?>
                             <option value="<?= $row['id'] ?>" <?= $items['group_id'] == $row['id'] ? 'selected' : '' ?>><?= $row['name'] ?></option>
                            <?php endforeach;?>
                        </select>
                        <div class="invalid-feedback errorGroupId"></div>
                    </div>
                    <div class="mb-3">
                        <label for="user-id" class="form-label h5">Username</label>
                    </div>
                    <div class="mb-3">
                        <select class="form-select" name="user_id" aria-label="Default select example" id="user-id" style="width: 100%;">
                            <?php foreach ($users as $row) : ?>
                             <option value="<?= $row['id'] ?>" <?= $items['user_id'] == $row['id'] ? 'selected' : '' ?>><?= $row['username'] ?></option>
                            <?php endforeach;?>
                        </select>
                        <div class="invalid-feedback errorUserId"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm rounded btn-simpan"><i class="ti ti-edit"></i> Ubah</button>
                    <button type="button" class="btn btn-secondary btn-sm rounded" data-bs-dismiss="modal"><i class="ti ti-x"></i> Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
     $('#user-id').select2({
        dropdownParent: $('#exampleModal')
    });
</script>
<script src="<?= base_url('assets/js/Master/@save_auth_groups_users.js') ?>"></script>