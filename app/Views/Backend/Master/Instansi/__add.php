<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel"><span class="fa-solid fa-plus-square"></span> <?= $title; ?></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('master-data/instansi/create-data'); ?>" class="form-data">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama-instansi" class="form-label h5">Instansi</label>
                        <input type="text" name="nama_instansi" class="form-control" id="nama-instansi" autocomplete="off">
                        <div class="invalid-feedback errorNamaInstansi"></div>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label h5">Alamat</label>
                        <textarea name="alamat" class="form-control" id="alamat"></textarea>
                        <div class="invalid-feedback errorAlamat"></div>
                    </div>
                    <div class="mb-3">
                        <label for="no-telp" class="form-label h5">No.Telp/Hp</label>
                        <input type="text" name="no_telp" class="form-control" id="no-telp">
                        <div class="invalid-feedback errorNoTelp"></div>
                    </div>
                    <div class="mb-3">
                        <label for="wilayah" class="form-label h5">Wilayah</label>
                        <input type="text" name="wilayah" class="form-control" id="wilayah">
                        <div class="invalid-feedback errorWilayah"></div>
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
<script src="<?= base_url('assets/js/Master/@save_instansi.js') ?>"></script>