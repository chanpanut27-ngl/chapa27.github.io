<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fs-3" id="exampleModalLabel" style="font-family: calibri;"><span class="fa-solid fa-edit"></span> <?= $title; ?></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('master-data/pelanggan/update-data'); ?>" class="form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="id" value="<?= $items['id']; ?>">
                 <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama-pelanggan" class="form-label h5">Pelanggan</label>
                        <input type="text" name="nama" value="<?= $items['nama']; ?>" class="form-control" id="nama-pelanggan" autocomplete="off">
                        <div class="invalid-feedback errorNamaPelanggan"></div>
                    </div>
                    <div class="mb-3">
                        <label for="alamat-pelanggan" class="form-label h5">Alamat</label>
                        <textarea name="alamat" id="alamat-pelanggan" class="form-control"><?= $items['alamat']; ?></textarea>
                        <div class="invalid-feedback errorAlamatPelanggan"></div>
                    </div>
                    <div class="mb-3">
                        <label for="no-telp" class="form-label h5">No.Telepon</label>
                        <input type="text" name="no_telp" value="<?= $items['no_telp'];?>" class="form-control" id="no-telp" autocomplete="off">
                        <div class="invalid-feedback errorNoTelp"></div>
                    </div>
                    <div class="mb-3">
                        <label for="nama-pjb" class="form-label h5">Nama PJ</label>
                        <input type="text" name="nama_pjb" value="<?= $items['nama_pjb'];?>" class="form-control" id="nama-pjb">
                        <div class="invalid-feedback errorNamaPjb"></div>
                    </div>
                     <div class="mb-3">
                        <label for="status" class="form-label h5" style="font-family: calibri;">Status</label>
                        <select name="is_active" class="form-select" id="status" aria-label="Default select example">
                            <?php
                            $status = [
                                0 => 'Tidak aktif',
                                1 => 'Aktif'
                            ];
                            foreach ($status as $key => $value) :
                            ?>    
                            <option value="<?= $key; ?>" <?= $key == $items['is_active'] ? 'selected' : ''; ?>><?= $value; ?></option>
                           <?php endforeach; ?>
                        </select>
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
                    $('.btn-ubah').html('<span class="fa-solid fa-save"></span> Ubah');
                },
                success: function(response) {
                    if (response.error) {

                        if (response.error.nama) {
                            $('#nama-pelanggan').addClass('is-invalid');
                            $('.errorNamaPelanggan').html(response.error.nama);
                        } else {
                            $('#nama-pelanggan').removeClass('is-invalid');
                            $('.errorNamaPelanggan').html('');
                        }
                        if (response.error.alamat) {
                            $('#alamat-pelanggan').addClass('is-invalid');
                            $('.errorAlamatPelanggan').html(err.alamat);
                        } else {
                            $('#alamat-pelanggan').removeClass('is-invalid');
                            $('.errorAlamatPelanggan').html('');
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