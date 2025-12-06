<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fs-3" id="exampleModalLabel" style="font-family: calibri;"><i class="fa-solid fa-edit"></i> <?= $title; ?></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('pelayanan-pemeriksaan/keterangan-lhu/update-data'); ?>" class="form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="id" value="<?= $items['id']; ?>">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama-lab" class="form-label h5">Parameter tidak dapat di uji</label>
                        <input type="text" name="paramater_tidak_dapat_di_uji" value="<?= $items['paramater_tidak_dapat_di_uji']; ?>" class="form-control" id="nama-lab" autocomplete="off">
                        <div class="invalid-feedback errorNamaLab"></div>
                    </div>
                    <div class="mb-3">
                        <label for="nama-lab" class="form-label h5">Sub kontrak</label>
                        <input type="text" name="sub_kontrak" value="<?= $items['sub_kontrak']; ?>" class="form-control" id="nama-lab" autocomplete="off">
                        <div class="invalid-feedback errorNamaLab"></div>
                    </div>
                    <div class="mb-3">
                        <label for="nama-lab" class="form-label h5">Kontrak di ulang</label>
                        <input type="text" name="kontrak_diulang" value="<?= $items['kontrak_diulang']; ?>" class="form-control" id="nama-lab" autocomplete="off">
                        <div class="invalid-feedback errorNamaLab"></div>
                    </div>
                    <div class="mb-3">
                        <label for="permintaan-khusus" class="form-label h5">Permintaan khusus</label>
                        <input type="text" name="permintaan_khusus" value="<?= $items['permintaan_khusus']; ?>" class="form-control" id="permintaan-khusus" autocomplete="off">
                        <div class="invalid-feedback errorPermintaan"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm btn-ubah"><i class="fas fa-edit"></i> Ubah</button>
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><i class="fa-solid fa-close"></i> Tutup</button>
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
                    $('.btn-ubah').html('Ubah');
                },
                success: function(response) {
                    var err = response.error
                    Swal.fire({
                        title: "Berhasil",
                        text: response.sukses,
                        icon: "success"
                    });
                    $("#exampleModal").modal('hide');
                    listData();
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + ' ' + xhr.responseText + ' ' + thrownError);
                }
            })
        })
    })
</script>