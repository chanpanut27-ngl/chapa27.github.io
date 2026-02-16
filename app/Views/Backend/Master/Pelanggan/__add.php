<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel"><span class="fa-solid fa-plus-square"></span> <?= $title; ?></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('master-data/pelanggan/create-data'); ?>" class="form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="no_telp" value="0">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama-pengirim" class="form-label h5">Nama pengirim</label>
                        <input type="text" name="nama_pengirim" class="form-control" id="nama-pengirim" autocomplete="off">
                        <div class="invalid-feedback errorNamaPengirim"></div>
                    </div>
                    <div class="mb-3">
                        <label for="no-telp-pengirim" class="form-label h5">No.Telp/Hp</label>
                        <input type="text" name="no_telp_pengirim" class="form-control" id="no-telp-pengirim" autocomplete="off">
                        <div class="invalid-feedback errorTelpPengirim"></div>
                    </div>
                    <div class="mb-3">
                        <label for="instansi" class="form-label h5">Instansi</label>
                        <input type="text" name="instansi" id="instansi" class="form-control">
                        <div class="invalid-feedback errorInstansi"></div>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label h5">Alamat</label>
                        <textarea name="alamat" id="alamat" class="form-control"></textarea>
                        <div class="invalid-feedback errorAlamat"></div>
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
                    <div class="mb-3">
                        <label for="petugas" class="form-label h5">Petugas ambil sampel/spesimen</label>
                        <input type="text" name="petugas_ambil_sampel" class="form-control" id="petugas" autocomplete="off">
                        <div class="invalid-feedback errorPetugas"></div>
                    </div>
                    <div class="mb-3">
                        <label for="tgl-ambil-sampel" class="form-label h5">Tanggal pengambilan sampel/spesimen</label>
                        <input type="text" name="tgl_ambil_sampel" id="tgl-ambil-sampel" class="form-control" autocomplete="off">
                        <div class="invalid-feedback errorTglAmbilSampel"></div>
                    </div>
                    <div class="mb-3">
                        <label for="jam-ambil-sampel" class="form-label h5">Jam pengambilan sampel/spesimen</label>
                        <input type="time" name="jam_ambil_sampel" id="jam-ambil-sampel" class="form-control" autocomplete="off">
                        <div class="invalid-feedback errorJamAmbilSampel"></div>
                    </div>
                    <div class="mb-3">
                        <label for="lokasi-ambil-sampel" class="form-label h5">Lokasi pengambilan sampel/spesimen</label>
                        <input type="text" name="lokasi_ambil_sampel" class="form-control" id="lokasi-ambil-sampel" autocomplete="off">
                        <div class="invalid-feedback errorLokasiAmbilSampel"></div>
                    </div>
                    <div class="mb-3">
                        <label for="keterangan-tambahan" class="form-label h5">Keterangan tambahan</label>
                        <textarea name="keterangan_tambahan" id="keterangan-tambahan" class="form-control"></textarea>
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

<script>
    $(document).ready(function() {
        
        var dateToday = new Date();
        $("#tgl-ambil-sampel").datepicker(
            { 
                dateFormat: 'dd-mm-yy', 
                defaultDate: "",  inDate: dateToday
            }
        );

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
                    if (err) {
                        if (err.instansi) {
                            $('#instansi').addClass('is-invalid');
                            $('.errorInstansi').html(err.instansi);
                        } else {
                            $('#instansi').removeClass('is-invalid');
                            $('.errorInstansi').html('');
                        }
                        if (err.alamat) {
                            $('#alamat').addClass('is-invalid');
                            $('.errorAlamat').html(err.alamat);
                        } else {
                            $('#alamat').removeClass('is-invalid');
                            $('.errorAlamat').html('');
                        }
                        if (err.nama_pengirim) {
                            $('#nama-pengirim').addClass('is-invalid');
                            $('.errorNamaPengirim').html(err.nama_pengirim);
                        } else {
                            $('#nama-pengirim').removeClass('is-invalid');
                            $('.errorNamaPengirim').html('');
                        }
                        if (err.no_telp_pengirim) {
                            $('#no-telp-pengirim').addClass('is-invalid');
                            $('.errorTelpPengirim').html(err.no_telp_pengirim);
                        } else {
                            $('#no-telp-pengirim').removeClass('is-invalid');
                            $('.errorTelpPengirim').html('');
                        }
                        if (err.tgl_ambil_sampel) {
                            $('#tgl-ambil-sampel').addClass('is-invalid');
                            $('.errorTglAmbilSampel').html(err.tgl_ambil_sampel);
                        } else {
                            $('#tgl-ambil-sampel').removeClass('is-invalid');
                            $('.errorTglAmbilSampel').html('');
                        }
                        if (err.jam_ambil_sampel) {
                            $('#jam-ambil-sampel').addClass('is-invalid');
                            $('.errorJamAmbilSampel').html(err.jam_ambil_sampel);
                        } else {
                            $('#jam-ambil-sampel').removeClass('is-invalid');
                            $('.errorJamAmbilSampel').html('');
                        }
                    } else {
                        Swal.fire({
                            title: "Berhasil",
                            text: response.sukses,
                            icon: "success",
                            timer: 2000,
                            width: '300px',
                            padding: '1em'
                        }).then((result) => {
                            if (result.dismiss === Swal.DismissReason.timer) {
                                listData();
                            }
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