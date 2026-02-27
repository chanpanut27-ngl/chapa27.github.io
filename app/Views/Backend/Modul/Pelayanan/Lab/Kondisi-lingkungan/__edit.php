<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel"><span class="fa-solid fa-edit"></span> <?= $title; ?></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('pelayanan/pengantar-lab/kondisi-lingkungan/update-data'); ?>" class="form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="id" value="<?= $items['id']; ?>">
                <div class="modal-body">
                   <div class="mb-3">
                        <label for="nama-lab" class="form-label h5">Kondisi Lingkungan Sekitar Sampel</label>
                        <textarea name="kondisi_lingkungan_sekitar_sampel" class="form-control"><?= $items['kondisi_lingkungan_sekitar_sampel']; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="nama-lab" class="form-label h5">Catatan Abnormalitas</label>
                        <textarea name="catatan_abnormalitas" class="form-control"><?= $items['catatan_abnormalitas']; ?></textarea>
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

<script src="<?= base_url('assets/js/Pelayanan/@update_koling_plab.js') ?>"></script>
