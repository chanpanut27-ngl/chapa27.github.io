<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel"><span class="fa-solid fa-edit"></span> <?= $title; ?></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('master-data/parameter/update-data') ?>" class="form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="id" value="<?= $items['id'] ?>">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="parameter" class="form-label h5">Parameter</label>
                        <input type="text" name="parameter" value="<?= $items['parameter'] ?>" class="form-control" id="parameter">
                        <div class="invalid-feedback errorParameter"></div>
                    </div>
                    <div class="mb-3">
                        <label for="metode" class="form-label h5">Metode</label>
                        <input type="text" name="metode" value="<?= $items['metode'] ?>" class="form-control" id="metode">
                        <div class="invalid-feedback errorMetode"></div>
                    </div>
                    <div class="mb-3">
                        <label for="harga-per-titik" class="form-label h5">Harga per titik</label>
                        <input type="text" name="harga_per_titik" value="<?= $items['harga_per_titik'] ?>" class="form-control" id="harga-per-titik">
                        <div class="invalid-feedback errorHargaPertitik"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm rounded btn-ubah"><span class="fas fa-edit"></span> Ubah</button>
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
                    $('.btn-ubah').attr('disable', 'disabled');
                    $('.btn-ubah').html('<i class="fa fa-spin fa-spinner"></i>');
                },
                complete: function() {
                    $('.btn-ubah').removeAttr('disable');
                    $('.btn-ubah').html('<span class="fa-solid fa-edit"></span> Ubah');
                },
                success: function(response) {
                    if (response.error) {
                        if (response.error.parameter) {
                            $('#parameter').addClass('is-invalid');
                            $('.errorParameter').html(response.error.parameter);
                        } else {
                            $('#parameter').removeClass('is-invalid');
                            $('.errorParameter').html('');
                        }
                        if (response.error.metode) {
                            $('#metode').addClass('is-invalid');
                            $('.errorMetode').html(response.error.metode);
                        } else {
                            $('#metode').removeClass('is-invalid');
                            $('.errorMetode').html('');
                        }
                        if (response.error.harga_per_titik) {
                            $('#harga-per-titik').addClass('is-invalid');
                            $('.errorHargaPertitik').html(response.error.harga_per_titik);
                        } else {
                            $('#harga-per-titik').removeClass('is-invalid');
                            $('.errorHargaPertitik').html('');
                        }
                    } else {
                        Swal.fire({
                            title: "Berhasil",
                            text: response.sukses,
                            icon: "success",
                            timer: 3000
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