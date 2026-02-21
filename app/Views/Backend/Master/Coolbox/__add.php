<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel"><span class="fa-solid fa-plus-square"></span> <?= $title; ?></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('master-data/coolbox/create-data') ?>" class="form-data">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="mb-1">
                        <label for="id-instansi" class="form-label h5">Instansi</label>
                    </div>
                    <div class="mb-3">
                        <select name="id_instansi" class="form-select" id="id-instansi" aria-label="Default select example" style="width: 100%;">
                            <option value="">-- Pilih --</option>
                            <?php
                            foreach ($masterInstansi as $row) :
                            ?>
                                <option value="<?= $row['id'] ?>"><?= $row['nama_instansi'] ?></option>
                            <?php
                            endforeach;
                            ?>
                        </select>
                        <div class="invalid-feedback errorAsalInstansi"></div>
                    </div>
                    <div class="mb-3">
                        <label for="keterangan" class="form-label h5">Keterangan</label>
                        <textarea name="keterangan" class="form-control" id="keterangan"></textarea>
                        <div class="invalid-feedback errorKeterangan"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm btn-simpan rounded"><span class="fa-solid fa-save"></span> Simpan</button>
                    <button type="button" class="btn btn-secondary btn-sm rounded" data-bs-dismiss="modal"><span class="fa-solid fa-close"></span> Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $('#id-instansi').select2({
        dropdownParent: $('#exampleModal')
    });
</script>
<script src="<?= base_url('assets/js/Master/@save_coolbox.js') ?>"></script>
