<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel"><i class="ti ti-square-plus fs-2"></i> <?= $title; ?></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('pelayanan/status-layanan/create-data') ?>" class="form-status">
                <?= csrf_field(); ?>
                <input type="hidden" name="id_pelanggan" value="<?= $id_pelanggan ?>">
                <input type="hidden" name="no_reg" value="<?= $items['no_reg'] ?>">
                <input type="hidden" name="kode_pelanggan" value="<?= $items['kode_pelanggan'] ?>">
                <div class="modal-body">
                    <div class="row mb-2">
                        <div class="col-sm">
                            <label for=""><b>No. registrasi :</b> <?= $items['no_reg'] ?></label>
                        </div>
                        <div class="col-sm text-end">
                            <label for=""><b>Kode pelanggan :</b> <?= $items['kode_pelanggan'] ?></label>
                        </div>
                    </div>
                    <div class="row mb-3 fw-bold">
                        <div class="col-sm">
                            <label for=""><b>Nama pelanggan :</b> <?= $items['nama_pengirim'] ?></label>
                        </div>
                        <div class="col-sm text-end">
                            <label for=""><b>Instansi :</b> <?= $items['instansi'] ?></label>
                        </div>
                    </div>
                   <div class="mb-3">
                        <label for="jumlah-orang" class="form-label h5">Jumlah orang</label>
                        <input type="number" name="jumlah_orang" class="form-control" id="jumlah-orang" autocomplete="off">
                        <div class="invalid-feedback errorJumlahOrang"></div>
                    </div>
                    <div class="mb-3">
                        <label for="jumlah-hari" class="form-label h5">Jumlah hari</label>
                        <input type="number" name="jumlah_hari" class="form-control" id="jumlah-hari" autocomplete="off">
                        <div class="invalid-feedback errorJumlahHari"></div>
                    </div>
                    <div class="mb-3">
                        <label for="biaya-akomodasi" class="form-label h5">Biaya akomodasi</label>
                        <select class="form-select" id="biaya-akomodasi" aria-label="Default select example">
                            <?php
                            foreach ($biaya_akomodasi as $row) :
                            ?>
                            <option value="">-</option>
                            <option value="<?= $row['id'] ?>"><?= $row['uraian'] ?></option>
                            <?php endforeach;?>
                        </select>
                        <div class="invalid-feedback errorBiayaAkomodasi"></div>
                    </div>
                    <div class="mb-3">
                        <label for="biaya-satuan" class="form-label h5">Biaya satuan</label>
                        <input type="number" name="biaya_satuan" class="form-control" id="biaya-satuan" autocomplete="off">
                        <div class="invalid-feedback errorBiayaSatuan"></div>
                    </div>
                </div>
                <div class="modal-footer p-1">
                    <button type="submit" class="btn btn-primary btn-sm rounded btn-simpan"><i class="ti ti-device-floppy"></i> Simpan</button>
                    <button type="button" class="btn btn-secondary btn-sm rounded" data-bs-dismiss="modal"><i class="ti ti-x"></i> Tutup</button>
                </div>
            </form>
            <div class="modal-body p-1">
                <div class="view-status"></div>
            </div>
        </div>
    </div>
</div>
<script>
    function listData() {
        $.ajax({
            url: "<?= site_url('pelayanan/status-layanan/list-data'); ?>",
            dataType: 'json',
            data: {id_pelanggan: <?= $id_pelanggan; ?>},
            cache: false,
            beforeSend: function() {
                $('.view-status').html('<span class="fa-solid fa-spin fa-spinner"></span>');
            },
            complete: function() {
                $('.view-status').removeAttr('span');
            },
            success: function(response) {
                $(".view-status").html(response.data);
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + ' ' + xhr.responseText + ' ' + thrownError);
            }
        })
    }
     $(document).on("click", "#biaya-akomodasi", function () {
        var id_biaya_akomodasi = $(this).val();
        $.ajax({
            type: "post",
            url: "<?= site_url('cari-biaya-akomodasi'); ?>",
            dataType: 'json',
            data: {id_biaya_akomodasi: id_biaya_akomodasi},
            cache: false,
            beforeSend: function() {
                $('.invalid-feedback').html('<span class="fa-solid fa-spin fa-spinner"></span>');
            },
            success: function(response) {
                $("#biaya-satuan").html(response.data);
            },
            complete: function() {
                $('.invalid-feedback').removeAttr('span');
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + ' ' + xhr.responseText + ' ' + thrownError);
            }
        })
     })

    $(document).ready(function () {
        listData();
    })
</script>
<script src="<?= base_url('assets/js/Pelanggan/@save_status.js') ?>"></script>
