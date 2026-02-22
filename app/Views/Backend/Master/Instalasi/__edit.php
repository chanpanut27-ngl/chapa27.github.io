<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel"><span class="fa-solid fa-edit"></span> <?= $title; ?></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('master-data/instalasi/update-data') ?>" class="form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="id" value="<?= $items['id'] ?>">
                 <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama-instalasi" class="form-label h5">Nama instalasi</label>
                        <input type="text" name="nama_instalasi" value="<?= $items['nama_instalasi'] ?>" class="form-control" id="nama-instalasi" autocomplete="off">
                        <div class="invalid-feedback errorNamaInstalasi"></div>
                    </div>
                    <div class="mb-3">
                        <label for="kategori" class="form-label h5">Kategori</label>
                        <select name="id_kat_lab" class="form-select" id="kategori" aria-label="Default select example">
                            <option value="">-- pilih --</option>
                            <?php foreach ($masterKategoriLab as $key) : ?>
                                <?php
                                if ($items['id_kat_lab'] == $key['id']) {
                                    $selected = 'selected';
                                } else {
                                    $selected = '';
                                }
                                ?>
                                <option value="<?= $key['id'] ?>" <?= $selected ?>><?= $key['kategori'] ?></option>
                            <?php endforeach;?>
                        </select>
                        <div class="invalid-feedback errorKategori"></div>
                    </div>
                    <div class="mb-3">
                        <label for="is-active" class="form-label h5">Is_active</label>
                        <select name="is_active" class="form-select" id="is-active" aria-label="Default select example">
                            <?php
                            $_isActive = [
                                '1' => 'Aktif', '0' => 'Tidak aktif'
                            ];
                            foreach ($_isActive as $r => $s) :
                            ?>
                                <option value="<?= $r; ?>" <?= $items['is_active'] == $r ? 'selected' : ''; ?>><?= $s; ?></option>
                            <?php
                            endforeach;
                            ?>
                        </select>
                        <div class="invalid-feedback errorIsActive"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm rounded btn-ubah"><i class="fas fa-edit"></i> Ubah</button>
                    <button type="button" class="btn btn-secondary rounded btn-sm" data-bs-dismiss="modal"><i class="fa-solid fa-close"></i> Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="<?= base_url('assets/js/Master/@update_instalasi.js') ?>"></script>
