<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fs-3" id="exampleModalLabel" style="font-family: arial;"><span class="fa-solid fa-plus-square"></span> <?= $title; ?></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('master-data/pelanggan/create-data'); ?>" class="form-data">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama-pelanggan" class="form-label h5">Pelanggan</label>
                        <input type="text" name="nama" class="form-control" id="nama-pelanggan" autocomplete="off">
                        <div class="invalid-feedback errorNamaPelanggan"></div>
                    </div>
                    <div class="mb-3">
                        <label for="alamat-pelanggan" class="form-label h5">Alamat</label>
                        <textarea name="alamat" id="alamat-pelanggan" class="form-control"></textarea>
                        <div class="invalid-feedback errorAlamatPelanggan"></div>
                    </div>
                    <div class="mb-3">
                        <label for="no-telp" class="form-label h5">No.Telepon</label>
                        <input type="text" name="no_telp" class="form-control" id="no-telp" autocomplete="off">
                        <div class="invalid-feedback errorNoTelp"></div>
                    </div>
                    <div class="mb-3">
                        <label for="nama-pjb" class="form-label h5">Nama PJ</label>
                        <input type="text" name="nama_pjb" class="form-control" id="nama-pjb">
                        <div class="invalid-feedback errorNamaPjb"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm rounded btn-simpan"><span class="fa-solid fa-save"></span> Simpan</button>
                    <button type="button" class="btn btn-secondary btn-sm rounded" data-bs-dismiss="modal"><span class="fa-solid fa-close"></span> Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $(".form-data").submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "post",
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: 'json',
                cache: false,
                beforeSend: function() {
                    $('.btn-simpan').attr('disable', 'disabled');
                    $('.btn-simpan').html('<i class="fa fa-spin fa-spinner"></i>');
                    $('.invalid-feedback').html('<i class="fa fa-spin fa-spinner"></i>');
                },
                complete: function() {
                    $('.btn-simpan').removeAttr('disable');
                    $('.btn-simpan').html('<i class="fas fa-save"></i> Simpan');
                },
                success: function(response) {
                    var err = response.error
                    if (err) {
                        if (err.nama) {
                            $('#nama-pelanggan').addClass('is-invalid');
                            $('.errorNamaPelanggan').html(err.nama);
                        } else {
                            $('#nama-pelanggan').removeClass('is-invalid');
                            $('.errorNamaPelanggan').html('');
                        }
                        if (err.alamat) {
                            $('#alamat-pelanggan').addClass('is-invalid');
                            $('.errorAlamatPelanggan').html(err.alamat);
                        } else {
                            $('#alamat-pelanggan').removeClass('is-invalid');
                            $('.errorAlamatPelanggan').html('');
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

                        $("#exampleModal").modal('hide');
                        listData();
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + ' ' + xhr.responseText + ' ' + thrownError);
                }
            })
        })
    })
</script>