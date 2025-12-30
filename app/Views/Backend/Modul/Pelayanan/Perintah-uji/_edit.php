<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel"><span class="fa-solid fa-edit"></span> <?= $title; ?></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('pelayanan/perintah-uji-sampel/update-data'); ?>" class="form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="kode_pengantar" value="<?= $kode_pengantar; ?>">
                <input type="hidden" name="id_pengantar_lhu" value="<?= $id_pengantar_lhu['id']; ?>">
                <input type="hidden" name="id_instalasi" value="<?= $id_instalasi; ?>">
                <input type="text" name="id_perintah_uji" value="<?= $id_perintah_uji; ?>">
                <div class="modal-body">
                     <div class="mb-2">
                        <div class="col-md-6">
                            <label for="tgl-terima" class="form-label h5">Tanggal Penerimaan Sampel</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="tgl_terima_sampel" value="<?= date('d-m-Y', strtotime($tgl_terima_sampel['tgl_terima_sampel'])) ?>" class="form-control" readonly id="tgl-terima">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label h5">Sifat Pemeriksaan Sampel</label><br>
                    </div>
                    <div class="mb-3">
                        <label for="biasa">
                            <input type="radio" name="sifat_pemeriksaan" value="Biasa" id="biasa" <?= $search['sifat_pemeriksaan'] == 'Biasa' ? 'checked' : '' ?>> Biasa
                        </label>
                        <label for="kasus">
                            <input type="radio" name="sifat_pemeriksaan" value="Kasus" id="kasus" <?= $search['sifat_pemeriksaan'] == 'Kasus' ? 'checked' : '' ?>> Kasus
                        </label>
                        <label for="rutin/proyek">
                            <input type="radio" name="sifat_pemeriksaan" value="Rutin/Proyek" id="rutin/proyek" <?= $search['sifat_pemeriksaan'] == 'Rutin/Proyek' ? 'checked' : '' ?>> Rutin/Proyek
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
                                        <td><?= $no++; ?><input type="text" name="id[]" value="<?= $row['id'] ?>"></td>
                                        <td><?= $row['kode_sampel']; ?></td>
                                        <td><?= $row['jenis_sampel'].','.$row['keterangan']; ?><input type="hidden" name="id_jenis_sampel[]" value="<?= $row['id_jenis_sampel'] ?>"></td>
                                        <td><?= $row['peraturan']; ?></td>
                                        <td><textarea name="parameter_uji[]" class="form-control"><?= $row['parameter_uji'] ?></textarea></td>
                                        <td><textarea name="metode_uji[]" class="form-control"><?= $row['metode_uji'] ?></textarea></td>
                                        <td><textarea name="keterangan[]" class="form-control"><?= $row['ket_sampel'] ?></textarea></td>
                                    </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                    <div class="mb-3">
                        <label for="analisis-lab" class="form-label h5">Analisis Laboratorium</label>
                        <textarea name="analisis_lab" class="form-control" id="analisis-lab"><?= $search['analisis_lab'] ?></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label h5">Tim Kerja Program Layanan</label>
                            <div class="mb-3">
                                <label for="tgl-kirim-sampel" class="form-label h5">Tanggal Kirim Sampel</label>
                                <input type="text" name="tgl_kirim_sampel" value="<?= date('d-m-Y', strtotime($search['tgl_kirim_sampel'])) ?>" id="tgl-kirim-sampel" class="form-control" autocomplete="off" placeholder="tgl-bln-thn">
                                <div class="invalid-feedback errorTglKirimSampel"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="kepala-instalasi" class="form-label h5">Kepala <?= $instalasi['nama_instalasi']; ?></label>
                                <input type="text" name="kepala_instalasi" value="<?= $search['kepala_instalasi'] ?>" id="kepala-instalasi" class="form-control" autocomplete="off">
                                <div class="invalid-feedback errorKepalaInstalasi"></div>
                            </div>
                            <div class="mb-3">
                                <label for="tgl-terima-sampel-lab" class="form-label h5">Tanggal Terima Sampel</label>
                                <input type="text" name="tgl_terima_sampel_lab" value="<?= date('d-m-Y', strtotime($search['tgl_terima_sampel_lab'])) ?>" class="form-control" id="tgl-terima-sampel-lab" autocomplete="off" placeholder="tgl-bln-thn">
                                <div class="invalid-feedback errorTglTerimaSampelLab"></div>
                            </div>
                            <div class="mb-3">
                                <label for="tgl-selesai-sampel" class="form-label h5">Tanggal Selesai Sampel</label>
                                <input type="text" name="tgl_selesai_sampel" value="<?= date('d-m-Y', strtotime($search['tgl_selesai_sampel'])) ?>" id="tgl-selesai-sampel" class="form-control" autocomplete="off" placeholder="tgl-bln-thn">
                                <div class="invalid-feedback errorTglSelesaiSampel"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm rounded btn-ubah"><span class="fa-solid fa-edit"></span> Ubah</button>
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
                        if (err.kepala_instalasi) {
                            $('#kepala-instalasi').addClass('is-invalid');
                            $('.errorKepalaInstalasi').html(err.kepala_instalasi);
                        } else {
                            $('#kepala-instalasi').removeClass('is-invalid');
                            $('.errorKepalaInstalasi').html('');
                        }
                        if (err.tgl_terima_sampel_lab) {
                            $('#tgl-terima-sampel-lab').addClass('is-invalid');
                            $('.errorTglTerimaSampelLab').html(err.tgl_terima_sampel_lab);
                        } else {
                            $('#tgl-terima-sampel-lab').removeClass('is-invalid');
                            $('.errorTglTerimaSampelLab').html('');
                        }

                        if (err.tgl_selesai_sampel) {
                            $('#tgl-selesai-sampel').addClass('is-invalid');
                            $('.errorTglSelesaiSampel').html(err.tgl_selesai_sampel);
                        } else {
                            $('#tgl-selesai-sampel').removeClass('is-invalid');
                            $('.errorTglSelesaiSampel').html('');
                        }

                        if (err) {
                            Swal.fire({
                                title: "Gagal",
                                text: response.error,
                                icon: "error"
                            });
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
