<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel"><i class="ti ti-square-plus fs-2"></i> <?= $title; ?></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('master-data/peraturan/create-data') ?>" class="form-data">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="peraturan" class="form-label h5">Peraturan</label>
                        <input type="text" name="peraturan" class="form-control" id="peraturan" autocomplete="off">
                        <div class="invalid-feedback errorPeraturan"></div>
                    </div>
                    <div class="mb-3">
                        <label for="keterangan" class="form-label h5">Keterangan</label>
                        <textarea name="keterangan" class="form-control" id="keterangan"></textarea>
                        <div class="invalid-feedback errorKeterangan"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm rounded btn-simpan"><i class="ti ti-device-floppy"></i> Simpan</button>
                    <button type="button" class="btn btn-secondary btn-sm rounded" data-bs-dismiss="modal"><i class="ti ti-x"></i> Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="<?= base_url('assets/js/Master/@save_peraturan.js') ?>"></script>
