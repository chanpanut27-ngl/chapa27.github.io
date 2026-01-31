
<form action="<?= base_url('profil-pegawai/update-data'); ?>" class="form-data">
    <?= csrf_field(); ?>
    <?php foreach ($profil as $rows) : ?>
    <input type="hidden" name="id" value="<?= @$rows['id']; ?>">
    <div class="mb-3">
        <label for="nama" class="form-label h5">Nama</label>
        <input type="text" name="nama" value="<?= $rows['nama'] ?>" class="form-control" id="nama" placeholder="Isi nama ..." autocomplete="off">
        <div class="invalid-feedback errorNama"></div>
    </div>
    <div class="mb-3">
        <label for="nik" class="form-label h5">NIK</label>
        <input type="text" name="nik" value="<?= $rows['nik'] ?>" class="form-control" id="nik" placeholder="Isi NIK ..." autocomplete="off">
        <div class="invalid-feedback errorNik"></div>
    </div>
    <div class="mb-3">
        <label for="nip" class="form-label h5">NIP</label>
        <input type="text" name="nip" value="<?= $rows['nip'] ?>" class="form-control" id="nip" placeholder="Isi NIP ..." autocomplete="off">
        <div class="invalid-feedback errorNip"></div>
    </div>
    <div class="mb-3">
        <label for="alamat" class="form-label h5">Alamat</label>
        <textarea name="alamat" class="form-control" id="alamat" placeholder="Isi alamat ..."><?= $rows['alamat'] ?></textarea>
        <div class="invalid-feedback errorAlamat"></div>
    </div>
    <div class="mb-3">
        <label for="no-telp" class="form-label h5">No.Telp</label>
        <input type="text" name="no_telp" value="<?= $rows['no_telp'] ?>" class="form-control" id="no-telp" placeholder="Isi nomor telepon instansi ...">
        <div class="invalid-feedback errorNoTelp"></div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary btn-sm rounded btn-ubah"><span class="fa-solid fa-edit"></span> Ubah</button>
        <button type="reset" class="btn btn-secondary btn-sm rounded" data-bs-dismiss="modal"><span class="fa-solid fa-refresh"></span> Batal</button>
    </div>
    <?php endforeach;?>
</form>

<script>
    $(".form-data").submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "post",
            url: $(this).attr('action'),
            data: $(this).serialize(),
            dataType: 'json',
            cache: false,
            beforeSend: function() {
                $('.btn-ubah').attr('disable', 'disabled');
                $('.btn-ubah').html('<i class="fa fa-spin fa-spinner"></i>');
                $('.invalid-feedback').html('<i class="fa fa-spin fa-spinner"></i>');
            },
            complete: function() {
                $('.btn-ubah').removeAttr('disable');
                $('.btn-ubah').html('<i class="fas fa-edit"></i> Ubah');
            },
            success: function(response) {
                var err = response.error
                 if (err) {
                        if (err.nama) {
                            $('#nama').addClass('is-invalid');
                            $('.errorNama').html(err.nama);
                        } else {
                            $('#nama').removeClass('is-invalid');
                            $('.errorNama').html('');
                        }
                        if (err.nik) {
                            $('#nik').addClass('is-invalid');
                            $('.errorNik').html(err.nik);
                        } else {
                            $('#nik').removeClass('is-invalid');
                            $('.errorNik').html('');
                        }
                        if (err.nip) {
                            $('#nip').addClass('is-invalid');
                            $('.errorNip').html(err.nip);
                        } else {
                            $('#nip').removeClass('is-invalid');
                            $('.errorNip').html('');
                        }
                        if (err.alamat) {
                            $('#alamat').addClass('is-invalid');
                            $('.errorAlamat').html(err.alamat);
                        } else {
                            $('#alamat').removeClass('is-invalid');
                            $('.errorAlamat').html('');
                        }
                        if (err.no_telp) {
                            $('#no-telp').addClass('is-invalid');
                            $('.errorNoTelp').html(err.no_telp);
                        } else {
                            $('#no-telp').removeClass('is-invalid');
                            $('.errorNoTelp').html('');
                        }
                } else {
                    Swal.fire({
                        title: "Berhasil",
                        text: response.sukses,
                        icon: "success"
                    });
                    listData();
                    listFoto();
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + ' ' + xhr.responseText + ' ' + thrownError);
            }
        })
    })

</script>
