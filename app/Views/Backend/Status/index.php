<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel"><i class="ti ti-square-plus fs-2"></i> <?= $title; ?></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('pelayanan/status-layanan/create-data') ?>" class="form-status">
                <?= csrf_field(); ?>
                <input type="hidden" name="id_pelanggan" value="<?= $id_pelanggan ?>">
                <div class="modal-body">
                    <div class="row g-2 mb-3" style="padding-left: 50px;">
                        <div class="col-md-6">
                            <label for=""><b>No. registrasi :</b> <?= $items['no_reg'] ?></label>
                        </div>
                        <div class="col-md-6">
                            <label for=""><b>Kode pelanggan :</b> <?= $items['kode_pelanggan'] ?></label>
                        </div>
                        <div class="col-md-6">
                            <label for=""><b>Nama pelanggan :</b> <?= $items['nama_pengirim'] ?></label>
                        </div>
                        <div class="col-md-6">
                            <label for=""><b>Instansi :</b> <?= $items['instansi'] ?></label>
                        </div>
                    </div>
                    <div class="row g-2 mb-3">
                        <div class="col-md-3">
                            <label for="" class="form-label h5">Status</label>
                        </div>
                        <div class="col-md-9">
                            <label for="1">
                                <input type="radio" name="status" value="Permintaan di Terima" id="1"> Permintaan di Terima
                            </label>&nbsp;&nbsp;
                            <label for="2">
                                <input type="radio" name="status" value="Permintaan di Tolak" id="2"> Permintaan di Tolak
                            </label>&nbsp;&nbsp;
                            <label for="3">
                                <input type="radio" name="status" value="Penawaran di Terima" id="3"> Penawaran di Terima
                            </label>&nbsp;&nbsp;
                            <label for="4">
                                <input type="radio" name="status" value="Penawaran di Tolak" id="4"> Penawaran di Tolak
                            </label>&nbsp;&nbsp;
                            <label for="5">
                                <input type="radio" name="status" value="Distribusi sampel" id="5"> Distribusi sampel
                            </label>
                        </div>
                        <div class="col-md-3">
                            <label for="" class="form-label h5">Keterangan</label>
                        </div>
                        <div class="col-md-9">
                            <textarea name="keterangan" id="" class="form-control"></textarea>
                        </div>
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
    $(document).ready(function () {
        listData();
    })
</script>
<script src="<?= base_url('assets/js/Pelanggan/@save_status.js') ?>"></script>
