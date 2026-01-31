<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fs-3" id="exampleModalLabel" style="font-family: arial;"><span class="fa-solid fa-plus-square"></span> <?= $title; ?></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('pelanggan/list-pemeriksaan/create-data'); ?>" class="form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="id_pelanggan" value="<?= $id_pelanggan ?>">
                <input type="hidden" name="no_reg" value="<?= $no_reg ?>">
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
                        <select name="id_jenis_sampel" class="form-select" id="id-jenis-sampel" style="width: 100%;" aria-label="Default select example">
                        </select>
                        <div class="invalid-feedback errorIdJenisSampel"></div>
                    </div>
                    <div class="mb-3 list-parameter">
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

        $('#id-jenis-sampel').select2({
            dropdownParent: $('#exampleModal')
        });

        $("#id-lab").change(function (e) {
            e.preventDefault();
            var id_lab = $(this).val();
            $.ajax({
                type: "post",
                url: "<?= site_url('master-data/parameter-pemeriksaan/list-sampel'); ?>",
                data: {id_lab:id_lab},
                dataType: 'json',
                cache: false,
                success: function(response) {
                    $("#id-jenis-sampel").html(response.data).show()
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + ' ' + xhr.responseText + ' ' + thrownError);
                }
            })
        })

         $("#id-jenis-sampel").change(function (e) {
            e.preventDefault();
            var id_jenis_sampel = $(this).val();
            $.ajax({
                type: "post",
                url: "<?= site_url('pelanggan/list-pemeriksaan/list-parameter'); ?>",
                data: {id_jenis_sampel:id_jenis_sampel},
                dataType: 'json',
                cache: false,
                beforeSend: function() {
                    $('.list-parameter').html('<span class="fa-solid fa-spin fa-spinner"></span>');
                },
                success: function(response) {
                    $(".list-parameter").html(response.data);
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + ' ' + xhr.responseText + ' ' + thrownError);
                }
            })
        })

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

    })
</script>