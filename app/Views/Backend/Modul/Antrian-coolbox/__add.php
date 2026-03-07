<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel"><span class="fa-solid fa-plus-square"></span> <?= $title; ?></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('coolbox/antrian-coolbox/create-data'); ?>" class="form-data">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="id-coolbox" class="form-label h5">Kode coolbox</label>
                    </div>
                    <div class="mb-3">
                        <select name="id_coolbox" class="form-select" id="id-coolbox" aria-label="Default select example" style="width: 100%;">
                            <option value="">-- Pilih --</option>
                            <?php
                            foreach ($masterCoolbox as $row) :
                            ?>
                                <option value="<?= $row['id_coolbox'] ?>"><?= $row['kode_coolbox'].'_'.$row['nama_instansi'] ?></option>
                            <?php
                            endforeach;
                            ?>
                        </select>
                        <div class="invalid-feedback errorIdCoolbox"></div>
                    </div>
                    <div class="mb-3">
                        <label for="tgl-terima-coolbox" class="form-label h5">Tanggal</label>
                        <input type="date" name="tgl_terima_coolbox" class="form-control w-50" id="tgl-terima-coolbox" autocomplete="off">
                        <div class="invalid-feedback errorTglTerimaCoolbox"></div>
                    </div>
                    <div class="mb-3">
                        <label for="jam-terima-coolbox" class="form-label h5">Jam</label>
                        <input type="time" name="jam_terima_coolbox" class="form-control w-50" id="jam-terima-coolbox" autocomplete="off">
                        <div class="invalid-feedback errorJamTerimaCoolbox"></div>
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
<script src="<?= base_url('assets/js/Coolbox/@save_antrian_coolbox.js') ?>"></script>