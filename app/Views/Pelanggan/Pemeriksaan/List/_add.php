<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fs-3" id="exampleModalLabel" style="font-family: arial;"><span class="fa-solid fa-plus-square"></span> <?= $title; ?></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('pelanggan/permintaan-pelanggan/create-data'); ?>" class="form-data">
                <?= csrf_field(); ?>
                <input type="text" name="id_pelanggan" value="<?= $id_pelanggan ?>">
                <input type="text" name="no_reg" value="<?= $no_reg ?>">
                <div class="modal-body">
                    <div class="mb-3">
                         <label for="id-lab" class="form-label h5" style="font-family: arial;">Laboratorium</label>
                        <select name="id_lab" class="form-select" id="id-lab" aria-label="Default select example">
                            <option value="">-- Pilih --</option>
                            <?php
                            foreach ($masterLab as $row) :
                            ?>
                                <option value="<?= $row['id']; ?>"><?= $row['nama_lab']; ?></option>
                            <?php
                            endforeach;
                            ?>
                        </select>
                        <div class="invalid-feedback errorIdLab"></div>
                    </div>
                    <div class="mb-3">
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
        $("#tgl-ambil-sampel").datepicker(
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
                        if (err.nama_pengirim) {
                            $('#nama-pengirim').addClass('is-invalid');
                            $('.errorNamaPengirim').html(err.nama_pengirim);
                        } else {
                            $('#nama-pengirim').removeClass('is-invalid');
                            $('.errorNamaPengirim').html('');
                        }
                        if (err.tgl_ambil_sampel) {
                            $('#tgl-ambil-sampel').addClass('is-invalid');
                            $('.errorTglAmbilSampel').html(err.tgl_ambil_sampel);
                        } else {
                            $('#tgl-ambil-sampel').removeClass('is-invalid');
                            $('.errorTglAmbilSampel').html('');
                        }
                        if (err.jam_ambil_sampel) {
                            $('#jam-ambil-sampel').addClass('is-invalid');
                            $('.errorJamAmbilSampel').html(err.jam_ambil_sampel);
                        } else {
                            $('#jam-ambil-sampel').removeClass('is-invalid');
                            $('.errorJamAmbilSampel').html('');
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