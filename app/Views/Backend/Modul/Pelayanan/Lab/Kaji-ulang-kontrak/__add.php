<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel"><i class="ti ti-square-plus fs-2"></i> <?= $title; ?></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?php
            if ($jumlah > 0) {
                        ?>
                        <div class="modal-body">
                            <div class="alert alert-danger fw-bold" role="alert">
                                Kaji ulang permintaan & kontrak sudah di isi !
                            </div>
                        </div>
                        <?php
                    }else{
            ?>
            <form action="<?= base_url('pelayanan/pengantar-lab/kaji-ulang-kontrak/create-data'); ?>" class="form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="kode_pengantar" value="<?= strtoupper($kode_pengantar); ?>">
                <input type="hidden" name="id_kat_lab" value="<?= $id_kat_lab ?>">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="alat-utama" class="form-label h5">Alat utama</label>
                        <textarea name="alat_utama" class="form-control" id="alat-utama">Semua alat bagus</textarea>
                        <div class="invalid-feedback errorAlatUtama"></div>
                    </div>
                    <div class="mb-3">
                        <label for="alat-pendukung" class="form-label h5">Alat pendukung</label>
                        <textarea name="alat_pendukung" class="form-control" id="alat-pendukung">Lengkap</textarea>
                        <div class="invalid-feedback errorAlatPendukung"></div>
                    </div>
                    <div class="mb-3">
                        <label for="personil-lab" class="form-label h5">Personel laboratorium</label>
                        <textarea name="personil_lab" class="form-control" id="personil-lab">Tersedia</textarea>
                        <div class="invalid-feedback errorPersonilLab"></div>
                    </div>
                    <div class="mb-3">
                        <label for="metode-pemeriksaan" class="form-label h5">Metode pemeriksaan</label>
                        <textarea name="metode_pemeriksaan" class="form-control" id="metode-pemeriksaan">SNI, APHA, dan EPA</textarea>
                        <div class="invalid-feedback errorPermintaan"></div>
                    </div>
                    <div class="mb-3">
                        <label for="uji-mutu" class="form-label h5">Uji mutu (Quality control)</label>
                        <textarea name="uji_mutu" class="form-control" id="uji-mutu">Baik</textarea>
                        <div class="invalid-feedback errorUjiMutu"></div>
                    </div>
                    <div class="mb-3">
                        <label for="reagensa" class="form-label h5">Reagensa & media</label>
                        <textarea name="reagensa_dan_media" class="form-control" id="reagensa">Tersedia</textarea>
                        <div class="invalid-feedback errorReagensa"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm rounded btn-simpan"><i class="ti ti-device-floppy"></i> Simpan</button>
                    <button type="button" class="btn btn-secondary btn-sm rounded" data-bs-dismiss="modal"><i class="ti ti-x"></i> Tutup</button>
                </div>
            </form>
            <?php } ?>
        </div>
    </div>
</div>

<script src="<?= base_url('assets/js/Pelayanan/@save_kaji_ulang_plab.js') ?>"></script>