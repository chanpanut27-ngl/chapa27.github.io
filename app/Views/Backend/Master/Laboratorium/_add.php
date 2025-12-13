<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fs-3" id="exampleModalLabel" style="font-family: calibri;"><i class="fa-solid fa-plus-square"></i> <?= $title; ?></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('master-data/laboratorium/create-data'); ?>" class="form-data">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="kode-lab" class="form-label h5">Kode Lab</label>
                        <input type="text" name="kode_lab" class="form-control" id="kode-lab" autocomplete="off">
                        <div class="invalid-feedback errorKodeLab"></div>
                    </div>
                    <div class="mb-3">
                        <label for="nama-lab" class="form-label h5">Laboratorium</label>
                        <input type="text" name="nama_lab" class="form-control" id="nama-lab" autocomplete="off">
                        <div class="invalid-feedback errorNamaLab"></div>
                    </div>
                    <div class="mb-3">
                        <label for="lantai" class="form-label h5">Lantai</label>
                        <select name="lantai" class="form-select" id="lantai" aria-label="Default select example">
                            <option value="">-- Pilih --</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                        <div class="invalid-feedback errorLantai"></div>
                    </div>
                    <div class="mb-3">
                        <label for="kode-instalasi" class="form-label h5">Instalasi</label>
                        <select name="kode_instalasi" class="form-select" id="kode-instalasi" aria-label="Default select example">
                            <?php foreach ($masterInstalasi as $key) : ?>
                                <option value="">-- pilih --</option>
                                <option value="<?= $key['kode_instalasi'] ?>"><?= $key['nama_instalasi'] ?></option>
                            <?php endforeach;?>
                        </select>
                        <div class="invalid-feedback errorKodeInstalasi"></div>
                    </div>
                    <div class="mb-3">
                        <label for="kategori" class="form-label h5">Kategori</label>
                        <select name="id_kat_lab" class="form-select" id="kategori" aria-label="Default select example">
                            <option value="">-- pilih --</option>
                            <?php foreach ($masterKategoriLab as $key) : ?>
                                <option value="<?= $key['id'] ?>"><?= $key['kategori'] ?></option>
                            <?php endforeach;?>
                        </select>
                        <div class="invalid-feedback errorKategori"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm rounded btn-simpan"><i class="fas fa-save"></i> Simpan</button>
                    <button type="button" class="btn btn-secondary btn-sm rounded" data-bs-dismiss="modal"><i class="fa-solid fa-close"></i> Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
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
                        if (err.kode_lab) {
                            $('#kode-lab').addClass('is-invalid');
                            $('.errorKodeLab').html(err.kode_lab);
                        } else {
                            $('#kode-lab').removeClass('is-invalid');
                            $('.errorKodeLab').html('');
                        }
                        if (err.nama_lab) {
                            $('#nama-lab').addClass('is-invalid');
                            $('.errorNamaLab').html(err.nama_lab);
                        } else {
                            $('#nama-lab').removeClass('is-invalid');
                            $('.errorNamaLab').html('');
                        }
                        if (err.lantai) {
                            $('#lantai').addClass('is-invalid');
                            $('.errorLantai').html(err.lantai);
                        } else {
                            $('#lantai').removeClass('is-invalid');
                            $('.errorLantai').html('');
                        }
                        if (err.id_kat_lab) {
                            $('#kategori').addClass('is-invalid');
                            $('.errorKategori').html(err.id_kat_lab);
                        } else {
                            $('#kategori').removeClass('is-invalid');
                            $('.errorKategori').html('');
                        }
                        if (err.kode_instalasi) {
                            $('#kode-instalasi').addClass('is-invalid');
                            $('.errorKodeInstalasi').html(err.kode_instalasi);
                        } else {
                            $('#kode-instalasi').removeClass('is-invalid');
                            $('.errorKodeInstalasi').html('');
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