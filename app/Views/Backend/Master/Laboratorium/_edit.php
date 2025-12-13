<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fs-3" id="exampleModalLabel" style="font-family: calibri;"><span class="fa-solid fa-edit"></span> <?= $title; ?></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('master-data/laboratorium/update-data'); ?>" class="form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="id" value="<?= $items['id']; ?>">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="kode-lab" class="form-label h5">Kode Lab</label>
                        <input type="text" name="kode_lab" value="<?= $items['kode_lab']; ?>" class="form-control" id="kode-lab" autocomplete="off">
                        <div class="invalid-feedback errorKodeLab"></div>
                    </div>
                    <div class="mb-3">
                        <label for="nama-lab" class="form-label h5">Laboratorium</label>
                        <input type="text" name="nama_lab" value="<?= $items['nama_lab']; ?>" class="form-control" id="nama-lab" autocomplete="off">
                        <div class="invalid-feedback errorNamaLab"></div>
                    </div>
                    <div class="mb-3">
                        <label for="lantai" class="form-label h5">Lantai</label>
                        <select name="lantai" class="form-select" id="lantai" aria-label="Default select example">
                            <option value="">-- Pilih --</option>
                            <option value="1" <?= $items['lantai'] == 1 ? 'selected' : ''; ?>>1</option>
                            <option value="2" <?= $items['lantai'] == 2 ? 'selected' : ''; ?>>2</option>
                            <option value="3" <?= $items['lantai'] == 3 ? 'selected' : ''; ?>>3</option>
                            <option value="4" <?= $items['lantai'] == 4 ? 'selected' : ''; ?>>4</option>
                        </select>
                        <div class="invalid-feedback errorLantai"></div>
                    </div>
                    <div class="mb-3">
                        <label for="instalasi" class="form-label h5">Instalasi</label>
                        <select name="kode_instalasi" class="form-select" id="instalasi" aria-label="Default select example">
                            <?php foreach ($masterInstalasi as $key) : ?>
                                <option value="<?= $key['kode_instalasi'] ?>" <?= $items['kode_instalasi'] == $key['kode_instalasi'] ? 'selected' : ''; ?>><?= $key['nama_instalasi'] ?></option>
                            <?php endforeach;?>
                        </select>
                        <div class="invalid-feedback errorKodeInstalasi"></div>
                    </div>
                    <div class="mb-3">
                        <label for="is-active" class="form-label h4" style="font-family: calibri;">Status</label>
                        <select name="is_active" class="form-select" id="is-active" aria-label="Default select example">
                            <?php
                            $_isActive = [
                                '1' => 'Aktif', '0' => 'Tidak aktif'
                            ];
                            foreach ($_isActive as $r => $s) :
                            ?>
                                <option value="<?= $r; ?>" <?= $items['is_active'] == $r ? 'selected' : ''; ?>><?= $s; ?></option>
                            <?php
                            endforeach;
                            ?>
                        </select>
                        <div class="invalid-feedback errorIsActive"></div>
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
                    $('.btn-ubah').html('Ubah');
                },
                success: function(response) {
                    if (response.error) {

                        if (response.error.kode_lab) {
                            $('#kode-lab').addClass('is-invalid');
                            $('.errorKodeLab').html(response.error.kode_lab);
                        } else {
                            $('#kode-lab').removeClass('is-invalid');
                            $('.errorKodeLab').html('');
                        }

                        if (response.error.jenis_sampel) {
                            $('#jenis-sampel').addClass('is-invalid');
                            $('.errorJenisSampel').html(response.error.jenis_sampel);
                        } else {
                            $('#jenis-sampel').removeClass('is-invalid');
                            $('.errorJenisSampel').html('');
                        }

                        if (response.error.pnbp) {
                            $('#pnbp').addClass('is-invalid');
                            $('.errorPnbp').html(response.error.pnbp);
                        } else {
                            $('#pnbp').removeClass('is-invalid');
                            $('.errorPnbp').html('');
                        }

                        if (response.error.id_lab) {
                            $('#id-lab').addClass('is-invalid');
                            $('.errorIdLab').html(response.error.id_lab);
                        } else {
                            $('#id-lab').removeClass('is-invalid');
                            $('.errorIdLab').html('');
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