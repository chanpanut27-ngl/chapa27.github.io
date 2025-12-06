<!-- Modal -->
<div class="modal fade" id="exampleModal" aria-labelledby="exampleModalLabel" aria-hidden="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fs-3" id="exampleModalLabel" style="font-family: calibri;"><i class="fa-solid fa-plus-square"></i> <?= $title; ?></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('pelayanan-pemeriksaan/lhu/sampel-lingkungan/create-data'); ?>" class="form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="id_laboratorium" value="<?= $id_lab; ?>">
                <input type="hidden" name="kode_pengantar" value="<?= $kode_pengantar; ?>">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="jenis-sampel" class="form-label h5" style="font-family: calibri;">Jenis sampel</label>
                        <select name="id_jenis_sampel" class="form-select" id="jenis-sampel" aria-label="Default select example">
                            <option value="">-- Pilih --</option>
                            <?php
                            foreach ($masterJenisSampel as $row) :
                            ?>
                                <option value="<?= $row['id']; ?>" style="font-size: 12px;"><?= $row['jenis_sampel']; ?></option>
                            <?php
                            endforeach;
                            ?>
                        </select>
                        <div class="invalid-feedback errorJenisSampel"></div>
                    </div>
                    <div class="mb-3">
                        <label for="lokasi-ambil-sampel" class="form-label h5" style="font-family: calibri;">Lokasi pengambilan sampel</label>
                        <input type="text" name="lokasi_pengambilan_sampel" class="form-control" id="lokasi-ambil-sampel">
                        <div class="invalid-feedback errorLokasiAmbilSampel"></div>
                    </div>
                    <div class="mb-3">
                        <label for="tgl-ambil-sampel" class="form-label h5" style="font-family: calibri;">Tanggal pengambilan sampel</label>
                        <input type="text" name="tgl_pengambilan_sampel" class="form-control" id="tgl-ambil-sampel" autocomplete="off">
                        <div class="invalid-feedback errorTglAmbilSampel"></div>
                    </div>
                    <div class="mb-3">
                        <label for="jam-ambil-sampel" class="form-label h5" style="font-family: calibri;">Jam pengambilan sampel</label>
                        <input type="time" name="jam_pengambilan_sampel" class="form-control" id="jam-ambil-sampel">
                        <div class="invalid-feedback errorJamAmbilSampel"></div>
                    </div>
                    <div class="mb-3">
                        <label for="metode-pemeriksaan" class="form-label h5" style="font-family: calibri;">Metode pemeriksaan</label>
                        <input type="text" name="metode_pemeriksaan" class="form-control" id="metode-pemeriksaan">
                        <div class="invalid-feedback errorMetodePemeriksaan"></div>
                    </div>
                    <div class="mb-3">
                        <label for="volume-berat" class="form-label h5" style="font-family: calibri;">Volume/Berat</label>
                        <input type="text" name="volume_berat" class="form-control" id="volume-berat">
                        <div class="invalid-feedback errorVolumeBerat"></div>
                    </div>
                    <div class="mb-3">
                        <label for="jenis-wadah" class="form-label h5" style="font-family: calibri;">Jenis wadah</label>
                        <input type="text" name="jenis_wadah" class="form-control" id="jenis-wadah">
                        <div class="invalid-feedback errorJenisWadah"></div>
                    </div>
                    <div class="mb-3">
                        <label for="jenis-pengawet" class="form-label h5" style="font-family: calibri;">Jenis pengawet</label>
                        <input type="text" name="jenis_pengawet" class="form-control" id="jenis-pengawet">
                        <div class="invalid-feedback errorJenisPengawet"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm btn-simpan"><i class="fas fa-save"></i> Simpan</button>
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><i class="fa-solid fa-close"></i> Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() { 
        $( "#tgl-ambil-sampel" ).datepicker({ dateFormat: 'dd-mm-yy' });

        $('.js-example-basic-single').select2();
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
                        if (err.id_jenis_sampel) {
                            $("#jenis-sampel").addClass('is-invalid');
                            $('.errorJenisSampel').html(err.id_jenis_sampel);
                        } else {
                            $('#jenis-sampel').removeClass('is-invalid');
                            $('.errorJenisSampel').html('');
                        }
                        if (err.lokasi_pengambilan_sampel) {
                            $('#lokasi-ambil-sampel').addClass('is-invalid');
                            $('.errorLokasiAmbilSampel').html(err.lokasi_pengambilan_sampel);
                        } else {
                            $('#lokasi-ambil-sampel').removeClass('is-invalid');
                            $('.errorLokasiAmbilSampel').html('');
                        }
                        if (err.metode_pemeriksaan) {
                            $('#metode-pemeriksaan').addClass('is-invalid');
                            $('.errorMetodePemeriksaan').html(err.metode_pemeriksaan);
                        } else {
                            $('#metode-pemeriksaan').removeClass('is-invalid');
                            $('.errorMetodePemeriksaan').html('');
                        }
                        if (err.volume_berat) {
                            $('#volume-berat').addClass('is-invalid');
                            $('.errorVolumeBerat').html(err.volume_berat);
                        } else {
                            $('#volume-berat').removeClass('is-invalid');
                            $('.errorVolumeBerat').html('');
                        }
                        if (err.jenis_wadah) {
                            $('#jenis-wadah').addClass('is-invalid');
                            $('.errorJenisWadah').html(err.jenis_wadah);
                        } else {
                            $('#jenis-wadah').removeClass('is-invalid');
                            $('.errorJenisWadah').html('');
                        }
                        if (err.jenis_pengawet) {
                            $('#jenis-pengawet').addClass('is-invalid');
                            $('.errorJenisPengawet').html(err.jenis_pengawet);
                        } else {
                            $('#jenis-pengawet').removeClass('is-invalid');
                            $('.errorJenisPengawet').html('');
                        }
                        if (err.tgl_pengambilan_sampel) {
                            $('#tgl-ambil-sampel').addClass('is-invalid');
                            $('.errorTglAmbilSampel').html(err.tgl_pengambilan_sampel);
                        } else {
                            $('#tgl-ambil-sampel').removeClass('is-invalid');
                            $('.errorTglAmbilSampel').html('');
                        }
                        if (err.jam_pengambilan_sampel) {
                            $('#jam-ambil-sampel').addClass('is-invalid');
                            $('.errorJamAmbilSampel').html(err.jam_pengambilan_sampel);
                        } else {
                            $('#jam-ambil-sampel').removeClass('is-invalid');
                            $('.errorJamAmbilSampel').html('');
                        }
                    } else {
                        Swal.fire({
                            title: "Berhasil",
                            text: response.sukses,
                            icon: "success"
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