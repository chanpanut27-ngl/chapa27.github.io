<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel"><span class="fa-solid fa-edit"></span> <?= $title; ?></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('master-data/parameter/update-data') ?>" class="form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="id" value="<?= $items['id'] ?>">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="id-jenis-sampel" class="form-label h5">Jenis sampel</label>
                        <select name="id_jenis_sampel" class="form-select" id="id-jenis-sampel" style="width: 100%;" aria-label="Default select example">
                        </select>
                        <div class="invalid-feedback errorIdJenisSampel"></div>
                    </div>
                    <div class="mb-3">
                        <label for="parameter" class="form-label h5">Parameter</label>
                        <input type="text" name="parameter" value="<?= $items['parameter'] ?>" class="form-control" id="parameter">
                        <div class="invalid-feedback errorParameter"></div>
                    </div>
                    <div class="mb-3">
                        <label for="metode" class="form-label h5">Metode</label>
                        <input type="text" name="metode" value="<?= $items['metode'] ?>" class="form-control" id="metode">
                        <div class="invalid-feedback errorMetode"></div>
                    </div>
                    <div class="mb-3">
                        <label for="harga-per-titik" class="form-label h5">Harga per titik</label>
                        <input type="text" name="harga_per_titik" value="<?= $items['harga_per_titik'] ?>" class="form-control" id="harga-per-titik">
                        <div class="invalid-feedback errorHargaPertitik"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm rounded btn-ubah"><span class="fas fa-edit"></span> Ubah</button>
                    <button type="button" class="btn btn-secondary btn-sm rounded" data-bs-dismiss="modal"><span class="fa-solid fa-close"></span> Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="<?= base_url('assets/js/Master/@update_parameter.js') ?>"></script>
