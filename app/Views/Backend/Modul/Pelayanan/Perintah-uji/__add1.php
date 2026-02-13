<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel"><span class="fa-solid fa-plus-square"></span> <?= $title; ?></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('pelayanan/perintah-uji-sampel/create-data'); ?>" class="form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="kode_pengantar" value="<?= $kode_pengantar; ?>">
                <input type="hidden" name="id_pengantar_lab" value="<?= $id_pengantar_lab['id']; ?>">
                <input type="hidden" name="id_instalasi" value="<?= $id_instalasi; ?>">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="" class="form-label h5">Sifat Pemeriksaan Sampel</label>
                        </div>
                        <div class="col-md">
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
                    </div>
                    <div class="mb-3">
                        <table class="table table-hover table-bordered">
                            <thead>
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
                            <tbody>
                                <?php $no=1; foreach ($items as $row) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $row['kode_sampel']; ?></td>
                                        <td><?= $row['jenis_sampel']; ?><input type="hidden" name="id_jenis_sampel[]" value="<?= $row['id_jenis_sampel'] ?>"></td>
                                        <td><?= $row['peraturan']; ?></td>
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
                            <div class="card mb-2">
                                <div class="card-header p-1 bg-info text-white">
                                    <h4 class="card-title text-center">Tim Kerja Program Layanan</h4>
                                </div>
                                <div class="card-body text-secondary">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p class="fw-bold">Tanggal penerimaan sampel</p>
                                        </div>
                                        <div class="col-md">
                                            : <?= date('d-m-Y', strtotime($tgl_terima_sampel['tgl_terima_sampel'])) ?>
                                            <input type="text" name="tgl_terima_sampel" value="<?= date('d-m-Y', strtotime($tgl_terima_sampel['tgl_terima_sampel'])) ?>" class="form-control" readonly id="tgl-terima">
                                        </div>
                                    </div>
                                    <div class="row">
                                         <div class="col-md-6">
                                            <p class="fw-bold" for="tgl-kirim-sampel">Tanggal kirim sampel</p>
                                        </div>
                                        <div class="col-md d-flex">
                                            :&nbsp;<input type="text" name="tgl_kirim_sampel" id="tgl-kirim-sampel" class="form-control" autocomplete="off">
                                            <div class="invalid-feedback errorTglKirimSampel"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header p-1 bg-info text-white">
                                    <h4 class="card-title text-center">Analis Laboratorium</h4>
                                </div>
                                <div class="card-body text-secondary">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p class="fw-bold">Tanggal penerimaan sampel</p>
                                        </div>
                                        <div class="col-md">
                                            : <?= date('d-m-Y', strtotime($tgl_terima_sampel['tgl_terima_sampel'])) ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                         <div class="col-md-6">
                                            <p class="fw-bold" for="tgl-kirim-sampel">Tanggal terima sampel</p>
                                        </div>
                                        <div class="col-md d-flex">
                                            :&nbsp;<input type="text" name="tgl_terima_sampel_analis_lab" class="form-control" id="tgl-terima-analis-lab" autocomplete="off" placeholder="tgl-bln-thn">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card mb-2">
                                <div class="card-header p-1 bg-info text-white">
                                    <h4 class="card-title text-center">Kepala <?= $instalasi['nama_instalasi']; ?></h4>
                                </div>
                                <div class="card-body text-secondary">
                                    <div class="row mb-2">
                                        <div class="col-md">
                                            <input type="text" name="kepala_instalasi" id="kepala-instalasi" placeholder="Nama kepala instalasi" class="form-control" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-6">
                                            <p class="fw-bold" for="tgl-kirim-sampel">Tanggal terima sampel</p>
                                        </div>
                                        <div class="col-md d-flex">
                                            :&nbsp;<input type="text" name="tgl_terima_sampel_lab" id="tgl-terima-sampel-lab" class="form-control" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="row">
                                         <div class="col-md-6">
                                            <p class="fw-bold" for="tgl-kirim-sampel">Tanggal selesai sampel</p>
                                        </div>
                                        <div class="col-md d-flex">
                                            :&nbsp;<input type="text" name="tgl_selesai_sampel" id="tgl-selesai-sampel" class="form-control" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
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
       
        var dateToday = new Date();
        $("#tgl-kirim-sampel").datepicker(
            { 
                EventTarget:AnimationTimeline,
                dateFormat: 'dd-mm-yy', 
                defaultDate: "+1",  
                inDate: dateToday
            }
        );
             

        $("#tgl-terima-analis-lab").datepicker(
            { 
                dateFormat: 'dd-mm-yy', 
                defaultDate: "",  inDate: dateToday
            }
        );

        $("#tgl-terima-sampel-lab").datepicker(
            { 
                dateFormat: 'dd-mm-yy', 
                defaultDate: "",  inDate: dateToday
            }
        );

        $("#tgl-selesai-sampel").datepicker(
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
                    $('.btn-simpan').html('<span class="fa-solid fa-spin fa-spinner"></span>');
                    $('.invalid-feedback').html('<span class="fa-solid fa-spin fa-spinner"></span>');
                },
                complete: function() {
                    $('.btn-simpan').removeAttr('disable');
                    $('.btn-simpan').html('<span class="fa-solid fa-save"></span> Simpan');
                },
                success: function(response) {
                    var err = response.error
                    if (err) {
                        if (err.tgl_kirim_sampel) {
                            $('#tgl-kirim-sampel').addClass('is-invalid');
                            $('.errorTglKirimSampel').html(err.tgl_kirim_sampel);
                        } else {
                            $('#tgl-kirim-sampel').removeClass('is-invalid');
                            $('.errorTglKirimSampel').html('');
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
