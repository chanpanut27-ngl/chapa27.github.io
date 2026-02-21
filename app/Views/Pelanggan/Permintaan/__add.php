<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel"><span class="fa-solid fa-plus-square"></span> <?= $title; ?></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('pelanggan/pelayanan/permintaan/create-data'); ?>" class="form-data">
                <?= csrf_field() ?>
                <?= form_hidden('instansi', $profil['instansi'] ?? '') ?>
                <?= form_hidden('alamat', $profil['alamat'] ?? '') ?>
                <?= form_hidden('no_telp', $profil['no_telp'] ?? '') ?>

                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama-pengirim" class="form-label h5">Nama pengirim</label>
                        <input type="text" name="nama_pengirim" class="form-control" id="nama-pengirim" autocomplete="off">
                        <div class="invalid-feedback errorNamaPengirim"></div>
                    </div>
                    <div class="mb-3">
                        <label for="no-telp-pengirim" class="form-label h5">No.Telp/Hp Pengirim</label>
                        <input type="text" name="no_telp_pengirim" class="form-control" id="no-telp-pengirim" autocomplete="off">
                        <div class="invalid-feedback errorTelpPengirim"></div>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label h5">Spesimen/Sampel</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="spesimen_atau_sampel" value="Rujukan / Kiriman" id="flexRadioDefault1" checked>
                            <label class="form-check-label" for="flexRadioDefault1">
                                Rujukan / Kiriman
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="spesimen_atau_sampel" value="Diambil oleh Petugas BBLKM Jakarta" id="flexRadioDefault2">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Diambil oleh Petugas BBLKM Jakarta
                            </label>
                        </div>
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
<script src="<?= base_url('assets/js/pelanggan/@permintaan.js') ?>"></script>

<script>
    // $(document).ready(function() {
    //     $(".form-data").submit(function(e) {
    //         e.preventDefault();
    //         $.ajax({
    //             type: "post",
    //             url: $(this).attr('action'),
    //             data: $(this).serialize(),
    //             dataType: 'json',
    //             cache: false,
    //             beforeSend: function() {
    //                 $('.btn-simpan').attr('disable', 'disabled');
    //                 $('.btn-simpan').html('<span class="fa-solid fa-spin fa-spinner"></span>');
    //                 $('.invalid-feedback').removeAttr('span');
    //             },
    //             complete: function() {
    //                 $('.btn-simpan').removeAttr('disable');
    //                 $('.btn-simpan').html('<span class="fa-solid fa-save"></span> Simpan');
    //             },
    //             success: function(response) {
    //                 var err = response.error
    //                 if (err) {
                        
    //                     if (err.nama_pengirim) {
    //                         $('#nama-pengirim').addClass('is-invalid');
    //                         $('.errorNamaPengirim').html(err.nama_pengirim);
    //                     } else {
    //                         $('#nama-pengirim').removeClass('is-invalid');
    //                         $('.errorNamaPengirim').html('');
    //                     }
    //                     if (err.no_telp_pengirim) {
    //                         $('#no-telp-pengirim').addClass('is-invalid');
    //                         $('.errorTelpPengirim').html(err.no_telp_pengirim);
    //                     } else {
    //                         $('#no-telp-pengirim').removeClass('is-invalid');
    //                         $('.errorTelpPengirim').html('');
    //                     }
    //                     if (err.tgl_ambil_sampel) {
    //                         $('#tgl-ambil-sampel').addClass('is-invalid');
    //                         $('.errorTglAmbilSampel').html(err.tgl_ambil_sampel);
    //                     } else {
    //                         $('#tgl-ambil-sampel').removeClass('is-invalid');
    //                         $('.errorTglAmbilSampel').html('');
    //                     }
    //                     if (err.jam_ambil_sampel) {
    //                         $('#jam-ambil-sampel').addClass('is-invalid');
    //                         $('.errorJamAmbilSampel').html(err.jam_ambil_sampel);
    //                     } else {
    //                         $('#jam-ambil-sampel').removeClass('is-invalid');
    //                         $('.errorJamAmbilSampel').html('');
    //                     }
    //                 } else {
    //                     Swal.fire({
    //                         title: "Berhasil",
    //                         text: response.sukses,
    //                         icon: "success",
    //                         timer: 3000
    //                     });

    //                     $("#exampleModal").modal('hide');
    //                     listData();
    //                 }
    //             },
    //             error: function(xhr, ajaxOptions, thrownError) {
    //                 alert(xhr.status + ' ' + xhr.responseText + ' ' + thrownError);
    //             }
    //         })
    //     })
    // })
</script>