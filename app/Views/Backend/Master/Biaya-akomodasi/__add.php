<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel"><span class="fa-solid fa-plus-square"></span> <?= $title; ?></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('master-data/biaya-akomodasi/create-data') ?>" class="form-data">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="uraian" class="form-label h5">Uraian</label>
                        <input type="text" name="uraian" class="form-control" id="uraian" autocomplete="off">
                        <div class="invalid-feedback errorUraian"></div>
                    </div>
                    <div class="mb-3">
                        <label for="transport" class="form-label h5">Transport</label>
                        <input type="text" name="transport" class="form-control" id="transport" autocomplete="off">
                        <div class="invalid-feedback errorTransport"></div>
                    </div>
                    <div class="mb-3">
                        <label for="uang-harian" class="form-label h5">Uang harian</label>
                        <input type="text" name="uang_harian" class="form-control" id="uang-harian" autocomplete="off">
                        <div class="invalid-feedback errorUangHarian"></div>
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
<script src="<?= base_url('assets/js/Master/@save_biaya_akomodasi.js') ?>"></script>
