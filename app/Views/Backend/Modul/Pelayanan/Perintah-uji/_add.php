<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fs-3" id="exampleModalLabel" style="font-family: arial;"><span class="fa-solid fa-plus-square"></span> <?= $title; ?></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('pelayanan/pengantar-lhu/create-data'); ?>" class="form-data">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="mb-2">
                        <label for="" class="form-label h5">Sifat Pemeriksaan Sampel</label><br>
                    </div>
                    <div class="mb-3">
                        <label for="biasa">
                            <input type="radio" name="sifat_pemeriksaan" value="Biasa" id="biasa" checked> Biasa
                        </label>
                        <label for="kasus">
                            <input type="radio" name="sifat_pemeriksaan" value="Kasus" id="kasus"> Kasus
                        </label>
                        <label for="rutin/proyek">
                            <input type="radio" name="sifat_pemeriksaan" value="Rutin/Proyek" id="rutin/proyek"> Rutin/Proyek
                        </label>
                    </div>
                    <div class="mb-3">
                        <table class="table table-hover table-bordered ti">
                            <thead style="font-family: arial; font-size:12px;">
                                <tr>
                                    <th><label for="">No</label></th>
                                    <th><label for="">Kode Sampel</label></th>
                                    <th><label for="">Jenis Sampel</label></th>
                                    <th><label for="">Peraturan</label></th>
                                    <th><label for="">Parameter Uji</label></th>
                                    <th><label for="">Metode Uji</label></th>
                                    <th><label for="">Keterangan</label></th>
                                </tr>
                            </thead>
                            <tbody style="font-family: arial; font-size:12px;">
                                <?php $no=1; foreach ($items as $row) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $row['kode_sampel']; ?></td>
                                        <td><?= $row['jenis_sampel']; ?></td>
                                        <td><?= $row['jenis_sampel']; ?></td>
                                        <td><textarea name="parameter_uji" class="form-control"></textarea></td>
                                        <td><textarea name="metode_uji" class="form-control"></textarea></td>
                                        <td><textarea name="keterangan" class="form-control"></textarea></td>
                                    </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label h5">Tim Kerja Program Layanan</label>
                            <div class="mb-3">
                                <label for="tgl-terima" class="form-label h5">Tanggal Penerimaan Sampel</label>
                                <input type="text" value="<?= date('d/m/Y', strtotime($tgl_terima['tgl_terima_sampel'])) ?>" class="form-control" disabled id="tgl-terima">
                            </div>
                            <div class="mb-3">
                                <label for="tgl-kirim-sampel" class="form-label h5">Tanggal Kirim Sampel</label>
                                <input type="text" name="tgl_kirim_sampel" id="tgl-kirim-sampel" class="form-control" autocomplete="off" placeholder="tgl-bln-thn">
                                <div class="invalid-feedback errorTanggal"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="kepala_instalasi" class="form-label h5">Kepala <?= $instalasi['nama_instalasi']; ?> </label>
                                <input type="text" name="kepala_instalasi" id="kepala_instalasi" class="form-control" autocomplete="off">
                                <div class="invalid-feedback errorTanggal"></div>
                            </div>
                            <div class="mb-3">
                                <label for="tgl-terima-sampel" class="form-label h5">Tanggal Terima Sampel</label>
                                <input type="text" name="tgl_terima_sampel" class="form-control" id="tgl-terima-sampel" autocomplete="off" placeholder="tgl-bln-thn">
                            </div>
                            <div class="mb-3">
                                <label for="tgl-selesai-sampel" class="form-label h5">Tanggal Selesai Sampel</label>
                                <input type="text" name="tgl_kirim_sampel" id="tgl-selesai-sampel" class="form-control" autocomplete="off" placeholder="tgl-bln-thn">
                                <div class="invalid-feedback errorTanggal"></div>
                            </div>
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
<script>
    $(document).ready(function() {
       
        $('#pelanggan').select2({
            dropdownParent: $('#exampleModal')
        });

        var dateToday = new Date();
        $("#tgl-kirim-sampel").datepicker(
            { 
                dateFormat: 'dd-mm-yy', 
                defaultDate: "+1w",  inDate: dateToday
            }
        );

        $("#tgl-terima-sampel").datepicker(
            { 
                dateFormat: 'dd-mm-yy', 
                defaultDate: "+1w",  inDate: dateToday
            }
        );

        $("#tgl-selesai-sampel").datepicker(
            { 
                dateFormat: 'dd-mm-yy', 
                defaultDate: "+1w",  inDate: dateToday
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
                        if (err.id_pelanggan) {
                            $('#pelanggan').addClass('is-invalid');
                            $('.errorPelanggan').html(err.id_pelanggan);
                        } else {
                            $('#pelanggan').removeClass('is-invalid');
                            $('.errorPelanggan').html('');
                        }
                        if (err.tanggal) {
                            $('#tanggal').addClass('is-invalid');
                            $('.errorTanggal').html(err.tanggal);
                        } else {
                            $('#tanggal').removeClass('is-invalid');
                            $('.errorTanggal').html('');
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
