<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel"><span class="fa-solid fa-edit"></span> <?= $title; ?></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('pelanggan/pelayanan/permintaan/update-data'); ?>" class="form-data">
                <?= csrf_field(); ?>
                <?= form_hidden('id', $items['id'] ?? null) ?>
                 <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama-pengirim" class="form-label h5">Nama pengirim</label>
                        <input type="text" name="nama_pengirim" value="<?= $items['nama_pengirim'] ?>" class="form-control" id="nama-pengirim" autocomplete="off">
                        <div class="invalid-feedback errorNamaPengirim"></div>
                    </div>
                    <div class="mb-3">
                        <label for="no-telp-pengirim" class="form-label h5">No.Telp/Hp</label>
                        <input type="text" name="no_telp_pengirim" value="<?= $items['no_telp_pengirim'] ?>" class="form-control" id="no-telp-pengirim" autocomplete="off">
                        <div class="invalid-feedback errorTelpPengirim"></div>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label h5">Spesimen/Sampel</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="spesimen_atau_sampel" value="Rujukan / Kiriman" id="flexRadioDefault1" <?= $items['spesimen_atau_sampel'] == 'Rujukan / Kiriman' ? 'checked' : '' ?>>
                            <label class="form-check-label" for="flexRadioDefault1">
                                Rujukan / Kiriman
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="spesimen_atau_sampel" value="Diambil oleh Petugas BBLKM Jakarta" id="flexRadioDefault2" <?= $items['spesimen_atau_sampel'] == 'Diambil oleh Petugas BBLKM Jakarta' ? 'checked' : '' ?>>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Diambil oleh Petugas BBLKM Jakarta
                            </label>
                        </div>
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
<script src="<?= base_url('assets/js/pelanggan/@update_permintaan.js') ?>"></script>