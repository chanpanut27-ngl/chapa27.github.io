<form action="<?= base_url('profil-pegawai/create-data'); ?>" class="form-data">
    <?= csrf_field(); ?>
    <input type="hidden" name="username" value="<?= $items['username'] ?>" class="form-control" id="username" readonly>
    <input type="hidden" name="email" value="<?= $items['email'] ?>" class="form-control" id="email" readonly>
    <input type="hidden" name="id_users" value="<?= $items['id'] ?>" class="form-control" id="idusers" readonly>
    <div class="mb-3">
        <label for="nama" class="form-label h5">Nama</label>
        <input type="text" name="nama" class="form-control" id="nama" placeholder="Isi nama ..." autocomplete="off">
        <div class="invalid-feedback errorNama"></div>
    </div>
    <div class="mb-3">
        <label for="nik" class="form-label h5">NIK</label>
        <input type="text" name="nik" class="form-control" id="nik" placeholder="Isi NIK ..." autocomplete="off">
        <div class="invalid-feedback errorNik"></div>
    </div>
    <div class="mb-3">
        <label for="nip" class="form-label h5">NIP</label>
        <input type="text" name="nip" class="form-control" id="nip" placeholder="Isi NIP ..." autocomplete="off">
        <div class="invalid-feedback errorNip"></div>
    </div>
    <div class="mb-3">
        <label for="alamat" class="form-label h5">Alamat</label>
        <textarea name="alamat" class="form-control" id="alamat" placeholder="Isi alamat ..."></textarea>
        <div class="invalid-feedback errorAlamat"></div>
    </div>
    <div class="mb-3">
        <label for="no-telp" class="form-label h5">No.Telp/Hp</label>
        <input type="text" name="no_telp" value="" class="form-control" id="no-telp" placeholder="Isi nomor telepon instansi ...">
        <div class="invalid-feedback errorNoTelp"></div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary btn-sm rounded btn-simpan"><span class="fa-solid fa-save"></span> Simpan</button>
        <button type="reset" class="btn btn-secondary btn-sm rounded" data-bs-dismiss="modal"><span class="fa-solid fa-refresh"></span> Batal</button>
    </div>
</form>