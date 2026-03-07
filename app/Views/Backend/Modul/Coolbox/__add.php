<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel"><i class="ti ti-square-plus fs-2"></i> <?= $title; ?></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('coolbox/posisi-coolbox/create-data'); ?>" class="form-data">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="mb-2">
                        <label for="id-coolbox" class="form-label h5">Kode coolbox</label>
                    </div>
                    <div class="mb-3">
                        <select name="id_coolbox" class="form-select" id="id-coolbox" aria-label="Default select example" style="width: 100%;">
                            <option value="">-- Pilih --</option>
                            <?php
                            foreach ($coolbox as $row) :
                            ?>
                                <option value="<?= $row['id_coolbox']; ?>"><?= $row['kode_coolbox'].' _ '.$row['nama_instansi']; ?></option>
                            <?php
                            endforeach;
                            ?>
                        </select>
                        <div class="invalid-feedback errorIdCoolbox"></div>
                    </div>
                    <div class="mb-3">
                        <label for="status-coolbox" class="form-label h5">Status</label>
                        <select name="status" class="form-select" id="status-coolbox" aria-label="Default select example">
                            <option value="">-- Pilih --</option>
                            <option value="1">1.Masuk</option>
                            <option value="2">2.Dititip</option>
                            <option value="3">3.Keluar</option>
                        </select>
                        <div class="invalid-feedback errorStatusCoolbox"></div>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal" class="form-label h5">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" id="tanggal" autocomplete="off">
                        <div class="invalid-feedback errorTanggal"></div>
                    </div>
                    <div class="mb-3">
                        <label for="jam" class="form-label h5">Jam</label>
                        <input type="time" name="jam" class="form-control" id="jam" autocomplete="off">
                        <div class="invalid-feedback errorJam"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm btn-simpan rounded"><i class="ti ti-device-floppy"></i> Simpan</button>
                    <button type="button" class="btn btn-secondary btn-sm rounded" data-bs-dismiss="modal"><i class="ti ti-x"></i> Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $('#id-coolbox').select2({
        dropdownParent: $('#exampleModal')
    });
</script>
<script src="<?= base_url('assets/js/Coolbox/@save_posisi_coolbox.js') ?>"></script>
