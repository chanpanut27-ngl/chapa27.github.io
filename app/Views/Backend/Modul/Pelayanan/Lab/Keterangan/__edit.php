<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel"><i class="ti ti-edit fs-2"></i> <?= $title; ?></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('pelayanan/pengantar-lab/keterangan/update-data'); ?>" class="form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="id" value="<?= $items['id']; ?>">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="keterangan" class="form-label h5">Keterangan</label>
                        <textarea name="keterangan" class="form-control" id="keterangan"><?= $items['keterangan'] ?></textarea>
                        <div class="invalid-feedback errorKeterangan"></div>
                    </div>
                    <div class="mb-3">
                        <label for="parameter" class="form-label h5">Parameter tidak dapat di uji</label>
                        <textarea name="parameter_tidak_dapat_di_uji" class="form-control" id="parameter"><?= $items['parameter_tidak_dapat_di_uji'] ?></textarea>
                        <div class="invalid-feedback errorParameter"></div>
                    </div>
                    <div class="mb-3">
                        <label for="sub-kontrak" class="form-label h5">Sub kontrak</label>
                        <textarea name="sub_kontrak" class="form-control" id="sub-kontrak"><?= $items['sub_kontrak'] ?></textarea>
                        <div class="invalid-feedback errorSubKontrak"></div>
                    </div>
                    <div class="mb-3">
                        <label for="kontrak-diulang" class="form-label h5">Kontrak di ulang</label>
                        <textarea name="kontrak_diulang" class="form-control" id="kontrak-diulang"><?= $items['kontrak_diulang'] ?></textarea>
                        <div class="invalid-feedback errorKontrakDiulang"></div>
                    </div>
                    <div class="mb-3">
                        <label for="permintaan-khusus" class="form-label h5">Permintaan khusus</label>
                        <textarea name="permintaan_khusus" class="form-control" id="permintaan-khusus"><?= $items['permintaan_khusus'] ?></textarea>
                        <div class="invalid-feedback errorPermintaanKhusus"></div>
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
<script src="<?= base_url('assets/js/Pelayanan/@update_ket_plab.js') ?>"></script>
