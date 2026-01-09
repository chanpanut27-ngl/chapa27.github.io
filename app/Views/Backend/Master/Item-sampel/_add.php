<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel"><span class="fa-solid fa-plus-square"></span> <?= $title; ?></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('master-data/per-item-sampel/create-data'); ?>" class="form-data">
                <?= csrf_field(); ?>
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
                        <label for="id-jenis-sampel" class="form-label h5">Jenis sampel</label>
                        <select name="id_jenis_sampel" class="form-select" id="id-jenis-sampel" aria-label="Default select example">
                        </select>
                        <div class="invalid-feedback errorIdJenisSampel"></div>
                    </div>
                    <div class="mb-3">
                        <label for="parameter" class="form-label h5">Parameter</label>
                        <input type="text" name="parameter" class="form-control" id="parameter">
                        <div class="invalid-feedback errorParameter"></div>
                    </div>
                    <div class="mb-3">
                        <label for="metode" class="form-label h5">Metode</label>
                        <input type="text" name="metode" class="form-control" id="metode">
                        <div class="invalid-feedback errorMetode"></div>
                    </div>
                    <div class="mb-3">
                        <label for="harga-per-titik" class="form-label h5">Harga per titik</label>
                        <input type="text" name="harga_per_titik" class="form-control" id="harga-per-titik">
                        <div class="invalid-feedback errorHargaPertitik"></div>
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
                        if (err.id_lab) {
                            $('#id-lab').addClass('is-invalid');
                            $('.errorIdLab').html(err.id_lab);
                        } else {
                            $('#id-lab').removeClass('is-invalid');
                            $('.errorIdLab').html('');
                        }
                        if (err.id_jenis_sampel) {
                            $('#id-jenis-sampel').addClass('is-invalid');
                            $('.errorIdJenisSampel').html(err.id_jenis_sampel);
                        } else {
                            $('#id-jenis-sampel').removeClass('is-invalid');
                            $('.errorIdJenisSampel').html('');
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

        $("#id-lab").change(function (e) {
            e.preventDefault();
            var id_lab = $(this).val();
            $.ajax({
                type: "post",
                url: "<?= site_url('master-data/per-item-sampel/list-sampel'); ?>",
                data: {id_lab:id_lab},
                // dataType: 'html',
                cache: false,
                beforeSend: function() {
                    $('#id-jenis-sampel').attr('disable', 'disabled');
                    $('#id-jenis-sampel').html('<span class="fa-solid fa-spin fa-spinner"></span>');
                    $('.invalid-feedback').html('<span class="fa-solid fa-spin fa-spinner"></span>');
                },
                complete: function() {
                    $('#id-jenis-sampel').removeAttr('disable');
                },
                success: function(response) {
                    $("#id-jenis-sampel").html(response)
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + ' ' + xhr.responseText + ' ' + thrownError);
                }
            })
        })

        $("#id-jenis-sampel").change(function (e) {
            e.preventDefault();
            alert('change');
        })
    })
</script>