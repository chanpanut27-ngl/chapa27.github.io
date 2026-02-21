<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fs-3" id="exampleModalLabel" style="font-family: calibri;"><span class="fa-solid fa-upload"></span> <?= $title; ?></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('coolbox/posisi-coolbox/upload-foto'); ?>" class="form-upload" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="id" value="<?= $items['id']; ?>">
                <input type="hidden" name="status" value="<?= $items['status']; ?>">
                <div class="modal-body">
                    <input type="hidden" name="id" readonly value="<?= $items['id']; ?>" class="form-control" id="id">
                    <input type="hidden" name="file_old" readonly value="<?= $items['foto']; ?>" class="form-control" id="file-old">
                    <div class="mb-3">
                        <label for="" class="form-label h5">Kode Coolbox</label>
                            <input type="text" name="kode_coolbox" class="form-control" value="<?= $coolbox['kode_coolbox']; ?>" readonly>
                        <div class="invalid-feedback errorFile"></div>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label h5">Keterangan</label>
                        <textarea name="keterangan" class="form-control" id="keterangan"><?= $items['keterangan']; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="upload-foto" class="form-label h5">Upload Foto</label>
                        <input type="file" name="upload_foto" class="form-control" id="upload-foto" accept="image/png, image/jpg, image/jpeg">
                        <div class="invalid-feedback errorFile"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm rounded btn-upload"><span class="fa-solid fa-upload"></span> Upload</button>
                    <button type="button" class="btn btn-secondary rounded btn-sm" data-bs-dismiss="modal"><span class="fa-solid fa-close"></span> Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="<?= base_url('assets/js/Coolbox/@upload_foto.js') ?>"></script>
