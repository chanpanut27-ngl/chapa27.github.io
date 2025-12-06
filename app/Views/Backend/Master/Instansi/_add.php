<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fs-3" id="exampleModalLabel" style="font-family: calibri;"><span class="fa-solid fa-plus-square"></span> <?= $title; ?></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('master-data/instansi/create-data'); ?>" class="form-data">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama-instansi" class="form-label h4">Instansi</label>
                        <input type="text" name="nama_instansi" class="form-control" id="nama-instansi" autocomplete="off">
                        <div class="invalid-feedback errorNamaInstansi"></div>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label h4">Alamat</label>
                        <textarea name="alamat" class="form-control" id="alamat"></textarea>
                        <div class="invalid-feedback errorAlamat"></div>
                    </div>
                    <div class="mb-3">
                        <label for="no-telp" class="form-label h4">No.Telp</label>
                        <input type="text" name="no_telp" class="form-control" id="no-telp">
                        <div class="invalid-feedback errorNoTelp"></div>
                    </div>
                    <div class="mb-3">
                        <label for="wilayah" class="form-label h4">Wilayah</label>
                        <input type="text" name="wilayah" class="form-control" id="wilayah">
                        <div class="invalid-feedback errorWilayah"></div>
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
                        if (err.nama_instansi) {
                            $('#nama-instansi').addClass('is-invalid');
                            $('.errorNamaInstansi').html(err.nama_instansi);
                        } else {
                            $('#nama-instansi').removeClass('is-invalid');
                            $('.errorNamaInstansi').html('');
                        }
                        if (err.wilayah) {
                            $('#wilayah').addClass('is-invalid');
                            $('.errorWilayah').html(err.wilayah);
                        } else {
                            $('#wilayah').removeClass('is-invalid');
                            $('.errorWilayah').html('');
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