<!-- Modal -->
<div class="modal fade" id="exampleModal" aria-labelledby="exampleModalLabel" aria-hidden="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fs-4" id="exampleModalLabel" style="font-family: arial;"><span class="fa-solid fa-plus-square"></span> <?= $title; ?></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('pelayanan/lhu/spesimen-penyakit/create-data'); ?>" class="form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="id_laboratorium" value="<?= $id_lab; ?>">
                <input type="hidden" name="kode_pengantar" value="<?= $kode_pengantar; ?>">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="jenis-sampel" class="form-label h4" style="font-family: calibri;">Jenis sampel</label>
                        <select name="id_jenis_sampel" class="form-select" id="jenis-sampel" aria-label="Default select example">
                            <option value="">-- Pilih --</option>
                            <?php
                            foreach ($masterJenisSampel as $row) :
                            ?>
                                <option value="<?= $row['id']; ?>"><?= $row['jenis_sampel']; ?></option>
                            <?php
                            endforeach;
                            ?>
                        </select>
                        <div class="invalid-feedback errorJenisSampel"></div>
                    </div>
                    <div class="mb-3">
                        <label for="identitas-sampel" class="form-label h4" style="font-family: calibri;">Identitas sampel</label>
                        <input type="text" name="identitas_sampel" class="form-control" id="identitas-sampel">
                        <div class="invalid-feedback errorIdentitasSampel"></div>
                    </div>
                    <div class="mb-3">
                        <label for="tgl-periksa-sampel" class="form-label h4" style="font-family: calibri;">Tanggal pemeriksaan sampel</label>
                        <input type="date" name="tgl_periksa_sampel" class="form-control" id="tgl-periksa-sampel">
                        <div class="invalid-feedback errorTglPeriksaSampel"></div>
                    </div>
                    <div class="mb-3">
                        <label for="jam-periksa-sampel" class="form-label h4" style="font-family: calibri;">Jam pemeriksaan sampel</label>
                        <input type="time" name="jam_periksa_sampel" class="form-control" id="jam-periksa-sampel">
                        <div class="invalid-feedback errorJamPeriksaSampel"></div>
                    </div>
                    <div class="mb-3">
                        <label for="metode-pemeriksaan" class="form-label h4" style="font-family: calibri;">Metode pemeriksaan</label>
                        <input type="text" name="metode_pemeriksaan" class="form-control" id="metode-pemeriksaan">
                        <div class="invalid-feedback errorMetodePemeriksaan"></div>
                    </div>
                    <div class="mb-3">
                        <label for="volume-berat" class="form-label h4" style="font-family: calibri;">Volume/Berat</label>
                        <input type="text" name="volume_berat" class="form-control" id="volume-berat">
                        <div class="invalid-feedback errorVolumeBerat"></div>
                    </div>
                    <div class="mb-3">
                        <label for="jenis-wadah" class="form-label h4" style="font-family: calibri;">Jenis wadah</label>
                        <input type="text" name="jenis_wadah" class="form-control" id="jenis-wadah">
                        <div class="invalid-feedback errorJenisWadah"></div>
                    </div>
                    <div class="mb-3">
                        <label for="jenis-pengawet" class="form-label h4" style="font-family: calibri;">Jenis pengawet</label>
                        <input type="text" name="jenis_pengawet" class="form-control" id="jenis-pengawet">
                        <div class="invalid-feedback errorJenisPengawet"></div>
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
        // $("#tgl-ambil-sampel").datepicker({ dateFormat: 'dd-mm-yy' });

        // $('.js-example-basic-single').select2();
        $(".form-data").submit(function(e) {
           e.preventDefault();
            $.ajax({
                type: 'post',
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: 'json',
                cache: 'false',
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
                        if (err.identitas_sampel) {
                            $('#identitas-sampel').addClass('is-invalid');
                            $('.errorIdentitasSampel').html(err.identitas_sampel);
                        } else {
                            $('#identitas-sampel').removeClass('is-invalid');
                            $('.errorIdentitasSampel').html('');
                        }
                        if (err.tgl_periksa) {
                            $('#tgl-periksa-sampel').addClass('is-invalid');
                            $('.errorTglPeriksaSampel').html(err.tgl_periksa);
                        } else {
                            $('#tgl-periksa-sampel').removeClass('is-invalid');
                            $('.errorTglPeriksaSampel').html('');
                        }
                        if (err.jam_periksa_sampel) {
                            $('#jam-periksa-sampel').addClass('is-invalid');
                            $('.errorJamPeriksaSampel').html(err.jam_periksa_sampel);
                        } else {
                            $('#jam-periksa-sampel').removeClass('is-invalid');
                            $('.errorJamPeriksaSampel').html('');
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
