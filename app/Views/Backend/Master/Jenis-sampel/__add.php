<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel"><i class="ti ti-square-plus fs-2"></i> <?= $title; ?></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('master-data/jenis-sampel/create-data'); ?>" class="form-data">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="mb-1">
                        <label for="id-peraturan" class="form-label h5">Peraturan</label>
                    </div>
                    <div class="mb-3">
                        <select name="id_peraturan" class="form-control" id="id-peraturan" style="width: 100%;" aria-label="Default select example">
                            <option value="">-- Pilih --</option>
                            <?php 
                            foreach ($masterPeraturan as $row) :
                            ?>
                            <option value="<?= $row['id'] ?>"><?= $row['peraturan']; ?> <?= $row['keterangan']; ?></option>
                            <?php endforeach;?>
                        </select>
                        <div class="invalid-feedback errorIdPeraturan"></div>
                    </div>
                    <div class="mb-3">
                        <label for="jenis-sampel" class="form-label h5">Jenis sampel</label>
                        <input type="text" name="jenis_sampel" class="form-control" id="jenis-sampel" autocomplete="off">
                        <div class="invalid-feedback errorJenisSampel"></div>
                    </div>
                    <div class="mb-3">
                        <label for="pnbp" class="form-label h5">PNBP (Rp)</label>
                        <input type="text" name="pnbp" class="form-control" id="pnbp" autocomplete="off">
                        <div class="invalid-feedback errorPnbp"></div>
                    </div>
                    <div class="mb-3">
                        <label for="keterangan" class="form-label h5">Keterangan</label>
                        <input type="text" name="keterangan" class="form-control" id="keterangan" autocomplete="off">
                        <div class="invalid-feedback errorPnbp"></div>
                    </div>
                    <div class="mb-3">
                        <label for="id-lab" class="form-label h5">Laboratorium</label>
                        <select name="id_lab" class="form-select" id="id-lab" aria-label="Default select example">
                            <option value="">-- Pilih --</option>
                            <?php
                            foreach ($masterLab as $row) :
                            ?>
                                <option value="<?= $row['id']; ?>"><?= $row['nama_lab']; ?></option>
                            <?php
                            endforeach;
                            ?>
                        </select>
                        <div class="invalid-feedback errorIdLab"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm rounded btn-simpan"><i class="ti ti-device-floppy"></i> Simpan</button>
                    <button type="button" class="btn btn-secondary btn-sm rounded" data-bs-dismiss="modal"><i class="ti ti-x"></i> Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $('#id-peraturan').select2({
        dropdownParent: $('#exampleModal')
    });
</script>
<script src="<?= base_url('assets/js/Master/@save_jenis_sampel.js') ?>"></script>
