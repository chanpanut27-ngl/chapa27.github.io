<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fs-4" id="exampleModalLabel" style="font-family: calibri;"><i class="fa-solid fa-plus-square"></i> <?= $title; ?></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?php
            if ($jumlah > 0) {
                        ?>
                        <div class="alert alert-danger fw-bold" role="alert">
                            Kondisi lingkungan sekitar sampel & Catatan Abnormalitas sudah di isi !
                        </div>
                        <?php
                    }else{
            ?>
            <form action="<?= base_url('pelayanan-pemeriksaan/kondisi-lingkungan-sekitar-sampel/create-data'); ?>" class="form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="kode_pengantar" value="<?= strtoupper($kode_pengantar); ?>">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama-lab" class="form-label h5">Kondisi Lingkungan Sekitar Sampel</label>
                        <textarea name="kondisi_lingkungan_sekitar_sampel" class="form-control"></textarea>
                        <div class="invalid-feedback errorNamaLab"></div>
                    </div>
                    <div class="mb-3">
                        <label for="nama-lab" class="form-label h5">Catatan Abnormalitas</label>
                        <textarea name="catatan_abnormalitas" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm btn-simpan"><i class="fas fa-save"></i> Simpan</button>
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><i class="fa-solid fa-close"></i> Tutup</button>
                </div>
            </form>
            <?php } ?>
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