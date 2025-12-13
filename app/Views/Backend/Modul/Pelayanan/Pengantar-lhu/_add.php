<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fs-3" id="exampleModalLabel" style="font-family: calibri;"><span class="fa-solid fa-plus-square"></span> <?= $title; ?></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('pelayanan/pengantar-lhu/create-data'); ?>" class="form-data">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="mb-1">
                        <label for="pelanggan" class="form-label h5">Pelanggan</label>
                    </div>
                    <div class="mb-3">
                        <select name="id_pelanggan" class="form-control" id="pelanggan" style="width: 100%;" aria-label="Default select example">
                            <option value="">-- Pilih --</option>
                            <?php 
                            foreach ($masterPelanggan as $row) :
                            ?>
                            <option value="<?= $row['id'] ?>"><?= $row['nama']; ?></option>
                            <?php endforeach;?>
                        </select>
                        <div class="invalid-feedback errorPelanggan"></div>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal" class="form-label h5">Tanggal</label>
                        <input type="text" name="tanggal" id="tanggal" class="form-control" autocomplete="off">
                        <div class="invalid-feedback errorTanggal"></div>
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
        // In your Javascript (external .js resource or <script> tag)
        $('#pelanggan').select2({
            dropdownParent: $('#exampleModal')
        });

        var dateToday = new Date();
        $("#tanggal").datepicker(
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
