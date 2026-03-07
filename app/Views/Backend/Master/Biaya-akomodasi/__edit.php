<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel"><i class="ti ti-edit fs-2"></i> <?= $title; ?></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('master-data/biaya-akomodasi/update-data'); ?>" class="form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="id" value="<?= $items['id'] ?>">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="uraian" class="form-label h5">Uraian</label>
                        <input type="text" name="uraian" value="<?= $items['uraian']; ?>" class="form-control" id="uraian" autocomplete="off">
                        <div class="invalid-feedback errorUraian"></div>
                    </div>
                    <div class="mb-3">
                        <label for="transport" class="form-label h5">Transport</label>
                        <input type="text" name="transport" value="<?= $items['transport'] ?>" class="form-control" id="transport" autocomplete="off">
                        <div class="invalid-feedback errorTransport"></div>
                    </div>
                    <div class="mb-3">
                        <label for="uang-harian" class="form-label h5">Uang harian</label>
                        <input type="text" name="uang_harian" value="<?= $items['uang_harian'] ?>" class="form-control" id="uang-harian" autocomplete="off">
                        <div class="invalid-feedback errorUangHarian"></div>
                    </div>
                    <div class="mb-3">
                        <label for="is-active" class="form-label h5">Is_active</label>
                        <select name="is_active" class="form-select" id="is-active" aria-label="Default select example">
                            <?php
                            $_isActive = [
                                '1' => 'Aktif', '0' => 'Tidak aktif'
                            ];
                            foreach ($_isActive as $r => $s) :
                            ?>
                                <option value="<?= $r; ?>" <?= $items['is_active'] == $r ? 'selected' : ''; ?>><?= $s; ?></option>
                            <?php
                            endforeach;
                            ?>
                        </select>
                        <div class="invalid-feedback errorIsActive"></div>
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

<script src="<?= base_url('assets/js/Master/@update_biaya_akomodasi.js') ?>"></script>
