<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fs-3" id="exampleModalLabel" style="font-family: calibri;"><span class="fa-solid fa-plus-square"></span> <?= $title; ?></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?php
            if ($jumlah > 0) {
                        ?>
                        <div class="alert alert-danger fw-bold" role="alert">
                            Keterangan sudah di isi !
                        </div>
                        <?php
                    }else{
            ?>
            <form action="<?= base_url('pelayanan/keterangan-lhu/create-data'); ?>" class="form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="kode_pengantar" value="<?= strtoupper($kode_pengantar); ?>">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama-lab" class="form-label h5">Tanggal pengambilan/penerimaan peralatan</label>
                        <input type="date" name="tgl_pengambilan" class="form-control" id="nama-lab" autocomplete="off">
                        <div class="invalid-feedback errorNamaLab"></div>
                    </div>
                    <div class="mb-3">
                        <label for="nama-lab" class="form-label h5">Petugas Kalibrasi</label>
                        <input type="text" name="petugas_kalibrasi" class="form-control" id="nama-lab" autocomplete="off">
                        <div class="invalid-feedback errorNamaLab"></div>
                    </div>
                    <div class="mb-3">
                        <label for="nama-lab" class="form-label h5">Sifat Kalibrasi</label>
                        <input type="text" name="sifat_kalibrasi" class="form-control" id="nama-lab" autocomplete="off">
                        <div class="invalid-feedback errorNamaLab"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm rounded btn-simpan"><span class="fas fa-save"></span> Simpan</button>
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