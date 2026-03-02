<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel"><span class="fa-solid fa-plus-square"></span> <?= $title; ?></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('pelayanan/perintah-uji-sampel/create-data') ?>" class="form-data">
                <?= csrf_field(); ?>
                <input type="text" name="kode_pengantar" value="<?= $kode_pengantar; ?>">
                <input type="text" name="id_pengantar_lab" value="<?= $id_pengantar_lab['id']; ?>">
                <input type="text" name="id_instalasi" value="<?= $id_instalasi; ?>">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-3">
                            <h5>Tanggal penerimaan sampel</h5>
                        </div>
                        <div class="col-md-9 d-flex">
                            <input type="date" readonly name="tgl_terima_sampel" value="<?= $tgl_terima_sampel['tgl_terima_sampel'] ?>" class="form-control bg-gray-300 fw-bold w-5">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <h5>Sifat pemeriksaan sampel</h5>
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="biasa">
                                        <input type="radio" name="sifat_pemeriksaan" value="Biasa" id="biasa" checked> Biasa
                                    </label>
                                </div>
                                <div class="col-md-3">
                                    <label for="kasus">
                                        <input type="radio" name="sifat_pemeriksaan" value="Kasus" id="kasus"> Kasus
                                    </label>
                                </div>
                                <div class="col-md-4">
                                    <label for="rutin/proyek">
                                        <input type="radio" name="sifat_pemeriksaan" value="Rutin/Proyek" id="rutin/proyek"> Rutin/Proyek
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
                                            <input type="date" name="tgl_kirim_sampel_dari_prola" id="tgl-kirim-sampel" class="form-control" autocomplete="off">
                                            <div class="invalid-feedback errorTglKirimSampel"></div>
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
                                            <input type="date" name="tgl_terima_sampel_ke_kains_lab" id="tgl-terima-sampel-ke-kains-lab" class="form-control" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <h6>Tanggal Selesai Sampel</h6>
                                        </div>
                                        <div class="col">
                                            <input type="date" name="tgl_selesai_sampel" id="tgl-selesai-sampel" class="form-control" autocomplete="off">
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
    $(document).ready(function () {

    $(".form-data").submit(function (e) {
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: $(this).attr('action'),
            data: $(this).serialize(),
            dataType: 'json',
            cache: false,
            beforeSend: function() {
                $('.btn-simpan').attr('disable', 'disabled');
                $('.btn-simpan').html('<span class="fa-solid fa-spin fa-spinner"></span>');
            },
            success: function(response) {
                var error = response.error;

                if (error) {
                    
                        Swal.fire({
                            title: "Gagal",
                            text: response.error,
                            icon: "error",
                            timer: 2000,
                            width: '400px',
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
                        icon: "success",
                        timer: 2000,
                        width: '400px',
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
            complete: function() {
                $('.btn-simpan').removeAttr('disable');
                $('.btn-simpan').html('<span class="fa-solid fa-save"></span> Simpan');
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError + "\n" + ajaxOptions);
            }
        })

    })
})
</script>
