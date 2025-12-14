
<form action="<?= base_url('user-pelanggan/profil/update-data'); ?>" class="form-data">
    <?= csrf_field(); ?>
    <div class="mb-3">
        <label for="nama-instansi" class="form-label h5">Instansi</label>
        <input type="text" name="instansi" value="<?= set_value('instansi', @$cek_data['instansi']) ?>" class="form-control" id="nama-instansi" placeholder="Isi nama instansi ..." autocomplete="off">
        <div class="invalid-feedback errorNamaInstansi"></div>
    </div>
    <div class="mb-3">
        <label for="alamat" class="form-label h5">Alamat</label>
        <textarea name="alamat" class="form-control" id="alamat" placeholder="Isi alamat instansi ..."><?= set_value('instansi', @$cek_data['alamat']) ?></textarea>
        <div class="invalid-feedback errorAlamat"></div>
    </div>
    <div class="mb-3">
        <label for="no-telp" class="form-label h5">No.Telp</label>
        <input type="text" name="no_telp" value="<?= set_value('no_telp', @$cek_data['no_telp']) ?>" class="form-control" id="no-telp" placeholder="Isi nomor telepon instansi ...">
        <div class="invalid-feedback errorNoTelp"></div>
    </div>
    <div class="card-footer bg-light">
        <button type="submit" class="btn btn-primary btn-sm rounded btn-ubah"><span class="fa-solid fa-edit"></span> Ubah</button>
        <button type="reset" class="btn btn-secondary btn-sm rounded" data-bs-dismiss="modal"><span class="fa-solid fa-refresh"></span> Batal</button>
    </div>
</form>