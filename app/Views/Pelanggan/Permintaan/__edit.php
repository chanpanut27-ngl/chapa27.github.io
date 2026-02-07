<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel"><span class="fa-solid fa-edit"></span> <?= $title; ?></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('pelanggan/permintaan-pelanggan/update-data'); ?>" class="form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="id" value="<?= $items['id'] ?>">
                 <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama-pengirim" class="form-label h5">Nama pengirim</label>
                        <input type="text" name="nama_pengirim" value="<?= $items['nama_pengirim'] ?>" class="form-control" id="nama-pengirim" autocomplete="off">
                        <div class="invalid-feedback errorNamaPengirim"></div>
                    </div>
                    <div class="mb-3">
                        <label for="no-telp-pengirim" class="form-label h5">No.Telp/Hp</label>
                        <input type="text" name="no_telp_pengirim" value="<?= $items['no_telp_pengirim'] ?>" class="form-control" id="no-telp-pengirim" autocomplete="off">
                        <div class="invalid-feedback errorTelpPengirim"></div>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label h5">Spesimen/Sampel</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="spesimen_atau_sampel" value="Rujukan / Kiriman" id="flexRadioDefault1" <?= $items['spesimen_atau_sampel'] == 'Rujukan / Kiriman' ? 'checked' : '' ?>>
                            <label class="form-check-label" for="flexRadioDefault1">
                                Rujukan / Kiriman
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="spesimen_atau_sampel" value="Diambil oleh Petugas BBLKM Jakarta" id="flexRadioDefault2" <?= $items['spesimen_atau_sampel'] == 'Diambil oleh Petugas BBLKM Jakarta' ? 'checked' : '' ?>>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Diambil oleh Petugas BBLKM Jakarta
                            </label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="petugas" class="form-label h5">Petugas ambil sampel/spesimen</label>
                        <input type="text" name="petugas_ambil_sampel" value="<?= $items['petugas_ambil_sampel'] ?>" class="form-control" id="petugas" autocomplete="off">
                        <div class="invalid-feedback errorPetugas"></div>
                    </div>
                    <div class="mb-3">
                        <label for="tgl-ambil-sampel" class="form-label h5">Tanggal pengambilan sampel/spesimen</label>
                        <input type="text" name="tgl_ambil_sampel" value="<?= date('d-m-Y', strtotime($items['tgl_ambil_sampel'])) ?>" id="tgl-ambil-sampel" class="form-control" autocomplete="off" placeholder="tgl-bln-thn">
                        <div class="invalid-feedback errorTglAmbilSampel"></div>
                    </div>
                    <div class="mb-3">
                        <label for="jam-ambil-sampel" class="form-label h5">Jam pengambilan sampel/spesimen</label>
                        <input type="time" name="jam_ambil_sampel" value="<?= $items['jam_ambil_sampel'] ?>" id="jam-ambil-sampel" class="form-control" autocomplete="off" placeholder="tgl-bln-thn">
                        <div class="invalid-feedback errorJamAmbilSampel"></div>
                    </div>
                    <div class="mb-3">
                        <label for="lokasi-ambil-sampel" class="form-label h5">Lokasi pengambilan sampel/spesimen</label>
                        <input type="text" name="lokasi_ambil_sampel" value="<?= $items['lokasi_ambil_sampel'] ?>" class="form-control" id="lokasi-ambil-sampel" autocomplete="off">
                        <div class="invalid-feedback errorLokasiAmbilSampel"></div>
                    </div>
                    <div class="mb-3">
                        <label for="keterangan-tambahan" class="form-label h5">Keterangan tambahan</label>
                        <textarea name="keterangan_tambahan" id="keterangan-tambahan" class="form-control"><?= $items['keterangan_tambahan'] ?></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm rounded btn-ubah"><span class="fas fa-edit"></span> Ubah</button>
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
                    $('.btn-ubah').attr('disable', 'disabled');
                    $('.btn-ubah').html('<i class="fa fa-spin fa-spinner"></i>');
                },
                complete: function() {
                    $('.btn-ubah').removeAttr('disable');
                    $('.btn-ubah').html('<span class="fa-solid fa-edit"></span> Ubah');
                },
                success: function(response) {
                    if (response.error) {

                        if (response.nama_pengirim) {
                            $('#nama-pengirim').addClass('is-invalid');
                            $('.errorNamaPengirim').html(response.nama_pengirim);
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
                        if (response.tgl_ambil_sampel) {
                            $('#tgl-ambil-sampel').addClass('is-invalid');
                            $('.errorTglAmbilSampel').html(response.tgl_ambil_sampel);
                        } else {
                            $('#tgl-ambil-sampel').removeClass('is-invalid');
                            $('.errorTglAmbilSampel').html('');
                        }
                        if (response.jam_ambil_sampel) {
                            $('#jam-ambil-sampel').addClass('is-invalid');
                            $('.errorJamAmbilSampel').html(response.jam_ambil_sampel);
                        } else {
                            $('#jam-ambil-sampel').removeClass('is-invalid');
                            $('.errorJamAmbilSampel').html('');
                        }
                    } else {
                        Swal.fire({
                            title: "Berhasil",
                            text: response.sukses,
                            icon: "success",
                            timer: 3000
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