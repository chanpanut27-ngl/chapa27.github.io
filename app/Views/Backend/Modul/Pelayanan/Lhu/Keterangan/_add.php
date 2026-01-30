<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel"><span class="fa-solid fa-plus-square"></span> <?= $title; ?></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?php
            if ($jumlah > 0) {
                        ?>
                        <div class="modal-body">
                            <div class="alert alert-danger fw-bold" role="alert">
                                Keterangan sudah di isi !
                            </div>
                        </div>
                        <?php
                    }else{
            ?>
            <form action="<?= base_url('pelayanan/pengantar-lhu/keterangan/create-data'); ?>" class="form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="kode_pengantar" value="<?= strtoupper($kode_pengantar); ?>">
                <input type="hidden" name="id_kat_lab" value="<?= $id_kat_lab ?>">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="keterangan" class="form-label h5">Keterangan</label>
                        <textarea name="keterangan" class="form-control" id="keterangan"></textarea>
                        <div class="invalid-feedback errorKeterangan"></div>
                    </div>
                    <div class="mb-3">
                        <label for="parameter" class="form-label h5">Parameter tidak dapat di uji</label>
                        <textarea name="paramater_tidak_dapat_di_uji" class="form-control" id="parameter"></textarea>
                        <div class="invalid-feedback errorParameter"></div>
                    </div>
                    <div class="mb-3">
                        <label for="sub-kontrak" class="form-label h5">Sub kontrak</label>
                        <textarea name="sub_kontrak" class="form-control" id="sub-kontrak"></textarea>
                        <div class="invalid-feedback errorSubKontrak"></div>
                    </div>
                    <div class="mb-3">
                        <label for="kontrak-diulang" class="form-label h5">Kontrak di ulang</label>
                        <textarea name="kontrak_diulang" class="form-control" id="kontrak-diulang"></textarea>
                        <div class="invalid-feedback errorKontrakDiulang"></div>
                    </div>
                    <div class="mb-3">
                        <label for="permintaan-khusus" class="form-label h5">Permintaan khusus</label>
                        <textarea name="permintaan_khusus" class="form-control" id="permintaan-khusus"></textarea>
                        <div class="invalid-feedback errorPermintaanKhusus"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm rounded btn-simpan"><span class="fa-solid fa-save"></span> Simpan</button>
                    <button type="button" class="btn btn-secondary btn-sm rounded " data-bs-dismiss="modal"><span class="fa-solid fa-close"></span> Tutup</button>
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
                    $('.btn-simpan').html('<span class="fa-solid fa-spin fa-spinner"></span>');
                    $('.invalid-feedback').html('<span class="fa-solid fa-spin fa-spinner"></span>');
                },
                complete: function() {
                    $('.btn-simpan').removeAttr('disable');
                    $('.btn-simpan').html('<span class="fa-solid fa-save"></span> Simpan');
                },
                success: function(response) {
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