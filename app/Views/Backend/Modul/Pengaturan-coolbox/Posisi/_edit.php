<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fs-3" id="exampleModalLabel" style="font-family: calibri;">
                    <span class="fa-solid fa-edit"></span> <?= $title; ?>
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('pengaturan-coolbox/posisi-coolbox/update-data'); ?>" class="form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="id" value="<?= $items['id']; ?>">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="id-coolbox" class="form-label h4" style="font-family: calibri;">Kode coolbox</label>
                        <select name="id_coolbox" class="form-select" id="id-coolbox" aria-label="Default select example">
                            <option value="">-- Pilih --</option>
                            <?php
                            foreach ($coolbox as $row) :
                            ?>
                                <option value="<?= $row['id_coolbox']; ?>" <?= $items['id_coolbox'] == $row['id_coolbox'] ? 'selected' : ''; ?>><?= $row['kode_coolbox'].' / '.$row['nama_instansi']; ?></option>
                            <?php
                            endforeach;
                            ?>
                        </select>
                        <div class="invalid-feedback errorIdCoolbox"></div>
                    </div>
                    <div class="mb-3">
                        <label for="status-coolbox" class="form-label h4">Status</label>
                        <select name="status" class="form-select" id="status-coolbox" aria-label="Default select example">
                            <option value="">-- Pilih --</option>
                            <option value="1" <?= $items['status'] == 1 ? 'selected' : '' ?>>1.Masuk</option>
                            <option value="2" <?= $items['status'] == 2 ? 'selected' : '' ?>>2.Dititip</option>
                            <option value="3" <?= $items['status'] == 3 ? 'selected' : '' ?>>3.Keluar</option>
                        </select>
                        <div class="invalid-feedback errorStatusCoolbox"></div>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal" class="form-label h4">Tanggal</label>
                        <input type="date" name="tanggal" value="<?= $items['tanggal']; ?>" class="form-control" id="tanggal" autocomplete="off">
                        <div class="invalid-feedback errorTanggal"></div>
                    </div>
                    <div class="mb-3">
                        <label for="jam" class="form-label h4">Jam</label>
                        <input type="time" name="jam" value="<?= $items['jam']; ?>" class="form-control" id="jam" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="ket-coolbox" class="form-label h4">Keterangan</label>
                        <textarea name="keterangan" class="form-control" id="ket-coolbox"><?= $items['keterangan']; ?></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm btn-ubah rounded"><span class="fa-solid fa-edit"></span> Ubah</button>
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
                    $('.btn-ubah').html('<span class="fa-solid fa-edit"></span> Ubah');
                },
                success: function(response) {
                    if (response.error) {

                        if (response.error.id_coolbox) {
                            $('#id-coolbox').addClass('is-invalid');
                            $('.errorIdCoolbox').html(response.error.id_coolbox);
                        } else {
                            $('#id-coolbox').removeClass('is-invalid');
                            $('.errorIdCoolbox').html('');
                        }
                        if (response.error.status) {
                            $('#status-coolbox').addClass('is-invalid');
                            $('.errorStatusCoolbox').html(response.error.status);
                        } else {
                            $('#status-coolbox').removeClass('is-invalid');
                            $('.errorStatusCoolbox').html('');
                        }
                        if (response.error.tanggal) {
                            $('#tanggal').addClass('is-invalid');
                            $('.errorTanggal').html(err.tanggal);
                        } else {
                            $('#tanggal').removeClass('is-invalid');
                            $('.errorTanggal').html('');
                        }
                        if (response.error) {
                            Swal.fire({
                                title: "Gagal",
                                text: response.error,
                                icon: "error"
                            });
                            $("#exampleModal").modal('hide');
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