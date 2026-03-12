<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel"><i class="ti ti-edit fs-2"></i> <?= $title; ?></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('pelayanan/perintah-uji-sampel/update-data'); ?>" class="form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="id_perintah_uji" value="<?= $id_perintah_uji; ?>">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-3">
                            <h5>Tanggal penerimaan sampel</h5>
                        </div>
                        <div class="col-md-9 d-flex">
                            :&nbsp;<h5><?= date('d-m-Y', strtotime($search['tgl_terima_sampel'])) ?></h5>
                            <input type="hidden" name="tgl_terima_sampel" value="<?= $search['tgl_terima_sampel'] ?>">
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <h5>Sifat pemeriksaan sampel</h5>
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="biasa">
                                        <input type="radio" name="sifat_pemeriksaan" value="Biasa" id="biasa" <?= $search['sifat_pemeriksaan'] == 'Biasa' ? 'checked' : '' ?>> Biasa
                                    </label>
                                </div>
                                <div class="col-md-3">
                                    <label for="kasus">
                                        <input type="radio" name="sifat_pemeriksaan" value="Kasus" id="kasus" <?= $search['sifat_pemeriksaan'] == 'Kasus' ? 'checked' : '' ?>> Kasus
                                    </label>
                                </div>
                                <div class="col-md-4">
                                    <label for="rutin/proyek">
                                        <input type="radio" name="sifat_pemeriksaan" value="Rutin/Proyek" id="rutin/proyek" <?= $search['sifat_pemeriksaan'] == 'Rutin/Proyek' ? 'checked' : '' ?>> Rutin/Proyek
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
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
                                        <td><?= $no++; ?><input type="hidden" name="idx[]" value="<?= $row['id'] ?>"></td>
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
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="card">
                                <div class="card-header p-2">
                                    <h5 class="card-title text-center">Kepala Instalasi Pelayanan</h5>
                                </div>
                                <div class="card-body text-secondary">
                                    <div class="row">
                                        <div class="col">
                                            <h6>Paraf</h6>
                                        </div>
                                        <div class="col"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <h6>Tanggal Kirim Sampel</h6>
                                        </div>
                                        <div class="col">
                                            <input type="date" name="tgl_kirim_sampel_dari_prola" value="<?= $search['tgl_kirim_sampel_dari_prola'] ?>" id="tgl-kirim-sampel-dari-prola" class="form-control" autocomplete="off">
                                            <div class="invalid-feedback errorTglKirimSampelDariProla"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="card">
                                <div class="card-header p-2">
                                    <h5 class="card-title text-center">Kepala <?= $instalasi['nama_instalasi']; ?></h5>
                                </div>
                                <div class="card-body text-secondary">
                                    <div class="row">
                                        <div class="col">
                                            <h6>Paraf</h6>
                                        </div>
                                        <div class="col"></div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col">
                                            <h6>Tanggal Terima Sampel</h6>
                                        </div>
                                        <div class="col">
                                            <input type="date" name="tgl_terima_sampel_ke_kains_lab" value="<?= $search['tgl_terima_sampel_ke_kains_lab'] ?>" id="tgl-terima-sampel-ke-kains-lab" class="form-control" autocomplete="off">
                                            <div class="invalid-feedback errorTglTerimaSampelKeKainsLab"></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <h6>Tanggal Selesai Sampel</h6>
                                        </div>
                                        <div class="col">
                                            <input type="date" name="tgl_selesai_sampel_ke_kains_lab" value="<?= $search['tgl_selesai_sampel_ke_kains_lab'] ?>" id="tgl-selesai-sampel-ke-kains-lab" class="form-control" autocomplete="off">
                                            <div class="invalid-feedback errorTglSelesaiSampelKeKainsLab"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="card">
                                <div class="card-header p-2">
                                    <h5 class="card-title text-center">Analis Laboratorium</h5>
                                </div>
                                <div class="card-body text-secondary">
                                    <div class="row">
                                        <div class="col">
                                            <h6>Paraf</h6>
                                        </div>
                                        <div class="col"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <h6>Tanggal Terima Sampel</h6>
                                        </div>
                                        <div class="col">
                                            <input type="date" name="tgl_terima_sampel_ke_analis_lab" value="<?= $search['tgl_terima_sampel_ke_analis_lab'] ?>" id="tgl-terima-sampel-ke-analis-lab" class="form-control" autocomplete="off">
                                            <div class="invalid-feedback errorTglTerimaSampelKeAnalisLab"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm rounded btn-ubah"><i class="ti ti-edit"></i> Ubah</button>
                    <button type="button" class="btn btn-secondary btn-sm rounded" data-bs-dismiss="modal"><i class="ti ti-x"></i> Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        
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
                    $('.btn-ubah').html('<span class="fa-solid fa-spin fa-spinner"></span>');
                    $('.invalid-feedback').html('<span class="fa-solid fa-spin fa-spinner"></span>');
                },
                complete: function() {
                    $('.btn-ubah').removeAttr('disable');
                    $('.btn-ubah').html('<span class="fa-solid fa-edit"></span> Ubah');
                },
                success: function(response) {
                    var error = response.error
                    if (error) {

                        if (error.tgl_kirim_sampel_dari_prola) {
                            $('#tgl-kirim-sampel-dari-prola').addClass('is-invalid');
                            $('.errorTglKirimSampelDariProla').html(error.tgl_kirim_sampel_dari_prola);
                        } else {
                            $('#tgl-kirim-sampel-dari-prola').removeClass('is-invalid');
                            $('.errorTglKirimSampelDariProla').html('');
                        }

                        if (error.tgl_terima_sampel_ke_kains_lab) {
                            $('#tgl-terima-sampel-ke-kains-lab').addClass('is-invalid');
                            $('.errorTglTerimaSampelKeKainsLab').html(error.tgl_terima_sampel_ke_kains_lab);
                        } else {
                            $('#tgl-terima-sampel-ke-kains-lab').removeClass('is-invalid');
                            $('.errorTglTerimaSampelKeKainsLab').html('');
                        }

                        if (error.tgl_selesai_sampel_ke_kains_lab) {
                            $('#tgl-selesai-sampel-ke-kains-lab').addClass('is-invalid');
                            $('.errorTglSelesaiSampelKeKainsLab').html(error.tgl_selesai_sampel_ke_kains_lab);
                        } else {
                            $('#tgl-selesai-sampel-ke-kains-lab').removeClass('is-invalid');
                            $('.errorTglSelesaiSampelKeKainsLab').html('');
                        }

                        if (error.tgl_terima_sampel_ke_analis_lab) {
                            $('#tgl-terima-sampel-ke-analis-lab').addClass('is-invalid');
                            $('.errorTglTerimaSampelKeAnalisLab').html(error.tgl_terima_sampel_ke_analis_lab);
                        } else {
                            $('#tgl-terima-sampel-ke-analis-lab').removeClass('is-invalid');
                            $('.errorTglTerimaSampelKeAnalisLab').html('');
                        }

                        Swal.fire({
                            title: "Gagal",
                            text: response.error,
                            icon: "error",
                            timer: 2000,
                            width: '300px',
                            padding: '1em'
                        }).then((result) => {
                            if (result.dismiss === Swal.DismissReason.timer) {
                                listData();
                            }
                        });
                        
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