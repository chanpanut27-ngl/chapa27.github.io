<!-- Modal -->
<div class="modal fade" id="permintaanSampelModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel"><i class="ti ti-edit fs-2"></i> <?= $title; ?></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('pemeriksaan/permintaan-sampel/update-data') ?>" class="form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="id" value="<?= $items['id'] ?>">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="jumlah-sampel" class="form-label h5">Jumlah sampel</label>
                        <input type="text" name="jumlah_sampel" value="<?=  $items['jumlah_sampel'] ?>" class="form-control w-50" id="jumlah-sampel" autocomplete="off">
                        <div class="invalid-feedback errorJumlahSampel"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm rounded btn-ubah"><i class="ti ti-edit"></i> Ubah</button>
                    <button type="button" class="btn btn-secondary btn-sm rounded" data-bs-dismiss="modal"><i class="ti ti-x"></i> Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    
    $(document).ready(function () {

    $(".form-data").submit(function (e) {
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: $(this).attr('action'),
            data: $(this).serialize(),
            dataType: 'json',
            cache: false,
            beforeSend: function() {
                $('.btn-ubah').attr('disable', 'disabled');
                $('.btn-ubah').html('<span class="fa-solid fa-spin fa-spinner"></span>');
            },
            success: function(response) {
                var error = response.error;

                if (error) {

                        Swal.fire({
                            title: "Gagal",
                            text: response.errorMessage,
                            icon: "error",
                            timer: 2000,
                            width: '400px',
                            padding: '1em'
                        }).then((result) => {
                            if (result.dismiss === Swal.DismissReason.timer) {
                                listData();
                            }
                        });

                } else {
                    
                    Swal.fire({
                        title: "Berhasil",
                        text: response.sukses,
                        icon: "success",
                        timer: 2000,
                        width: '400px',
                        padding: '1em'
                    }).then((result) => {
                        if (result.dismiss === Swal.DismissReason.timer) {
                            listData();
                        }
                    });

                    // $("#exampleModal").modal('hide');
                    listData();
                }
            },
            complete: function() {
                $('.btn-simpan').removeAttr('disable');
                $('.btn-simpan').html('<span class="fa-solid fa-save"></span> Simpan');
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError + "\n" + ajaxOptions);
            }
        })

    })
})
</script>
