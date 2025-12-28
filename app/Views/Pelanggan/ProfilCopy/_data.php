
<form action="<?= base_url('pelanggan/profil/update-data'); ?>" class="form-data">
    <?= csrf_field(); ?>
    <?php foreach ($profil as $rows) : ?>
    <input type="hidden" name="id" value="<?= @$rows['id']; ?>">
    <div class="mb-3">
        <label for="nama-instansi" class="form-label h5">Instansi</label>
        <input type="text" name="instansi" value="<?= set_value('instansi', $rows['instansi']) ?>" class="form-control" id="nama-instansi" placeholder="Isi nama instansi ..." autocomplete="off">
        <div class="invalid-feedback errorNamaInstansi"></div>
    </div>
    <div class="mb-3">
        <label for="alamat" class="form-label h5">Alamat</label>
        <textarea name="alamat" class="form-control" id="alamat" placeholder="Isi alamat instansi ..."><?= set_value('instansi', @$rows['alamat']) ?></textarea>
        <div class="invalid-feedback errorAlamat"></div>
    </div>
    <div class="mb-3">
        <label for="no-telp" class="form-label h5">No.Telp</label>
        <input type="text" name="no_telp" value="<?= set_value('no_telp', @$rows['no_telp']) ?>" class="form-control" id="no-telp" placeholder="Isi nomor telepon instansi ...">
        <div class="invalid-feedback errorNoTelp"></div>
    </div>
    <div class="card-footer bg-light">
        <button type="submit" class="btn btn-primary btn-sm rounded btn-ubah"><span class="fa-solid fa-edit"></span> Ubah</button>
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
                    if (err.instansi) {
                        $('#nama-instansi').addClass('is-invalid');
                        $('.errorNamaInstansi').html(err.instansi);
                    } else {
                        $('#nama-instansi').removeClass('is-invalid');
                        $('.errorNamaInstansi').html('');
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
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + ' ' + xhr.responseText + ' ' + thrownError);
            }
        })
    })

</script>
