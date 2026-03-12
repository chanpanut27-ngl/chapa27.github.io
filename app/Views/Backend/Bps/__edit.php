<!-- Modal -->
<div class="modal fade" id="bpsModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel"><i class="ti ti-edit fs-2"></i> <?= $title; ?></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('pelayanan/biaya-penyelenggara-sampling/update-data') ?>" class="update-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="id" value="<?= $items['id'] ?>">
                <div class="modal-body">
                    <div class="row g-2 mb-3" style="padding-left: 50px;">
                        <div class="col-md-6">
                            <label for=""><b>No. registrasi :</b> <?= $pelanggan['no_reg'] ?></label>
                        </div>
                        <div class="col-md-6">
                            <label for=""><b>Kode pelanggan :</b> <?= $pelanggan['kode_pelanggan'] ?></label>
                        </div>
                        <div class="col-md-6">
                            <label for=""><b>Nama pelanggan :</b> <?= $pelanggan['nama_pengirim'] ?></label>
                        </div>
                        <div class="col-md-6">
                            <label for=""><b>Instansi :</b> <?= $pelanggan['instansi'] ?></label>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-6 mb-3">
                            <label for="edit-jumlah-orang" class="form-label h5">Jumlah orang</label>
                            <input type="number" name="jumlah_orang" value="<?= $items['jumlah_orang'] ?>" class="form-control" id="edit-jumlah-orang" autocomplete="off">
                            <div class="invalid-feedback errorJumlahOrang"></div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="edit-jumlah-hari" class="form-label h5">Jumlah hari</label>
                            <input type="number" name="jumlah_hari" value="<?= $items['jumlah_hari'] ?>" class="form-control" id="edit-jumlah-hari" autocomplete="off">
                            <div class="invalid-feedback errorJumlahHari"></div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="biaya-akomodasi" class="form-label h5">Biaya akomodasi</label>
                            <select class="form-select" id="edit-biaya-akomodasi" aria-label="Default select example">
                                <?php
                                foreach ($biaya_akomodasi as $row) :
                                ?>
                                <option value="">-</option>
                                <option value="<?= $row['id'] ?>"><?= $row['uraian'] ?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="edit-biaya-satuan" class="form-label h5">Biaya satuan</label>
                            <input type="text" readonly name="biaya_satuan" value="<?= $items['biaya_satuan'] ?>" class="form-control" id="edit-biaya-satuan" autocomplete="off">
                            <div class="invalid-feedback errorBiayaSatuan"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer p-1">
                    <button type="submit" class="btn btn-primary btn-sm rounded btn-ubah"><i class="ti ti-edit"></i> Ubah</button>
                    <button type="button" class="btn btn-secondary btn-sm rounded" data-bs-dismiss="modal"><i class="ti ti-x"></i> Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>

    $("#edit-biaya-akomodasi").change( function (e) {
        e.preventDefault();
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
            complete: function() {
                $('.invalid-feedback').removeAttr('span');
            },
            success: function(response) {
                $("#edit-biaya-satuan").val(response.data);
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + ' ' + xhr.responseText + ' ' + thrownError);
            }
        })
    })

    $(".update-data").submit(function (e) {
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
                Swal.fire({
                        title: "Berhasil",
                        text: response.sukses,
                        icon: "success",
                        timer: 2000,
                        width: '400px',
                        padding: '1em'
                    }).then((result) => {
                        if (result.dismiss === Swal.DismissReason.timer) {
                            listDataBps();
                        }
                    });

                    $("#bpsModal").modal('hide');
                    listDataBps();
            },
            complete: function() {
                $('.btn-ubah').removeAttr('disable');
                $('.btn-ubah').html('<i class="ti ti-edit"></i> Ubah');
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError + "\n" + ajaxOptions);
            }
        })

    })
</script>
