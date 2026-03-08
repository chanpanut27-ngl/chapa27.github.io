<!-- Modal -->
<div class="modal fade" id="permintaanSampelModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel"><i class="ti ti-edit fs-2"></i> <?= $title; ?></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('master-data/instansi/update-data') ?>" class="form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="id" value="">
                <div class="modal-body">
                    <div class="mb-3">
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

