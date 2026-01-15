<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel"><span class="fa-solid fa-plus-square"></span> <?= $title; ?></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('master-data/parameter/create-data'); ?>" class="form-data">
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
                        <select name="id_jenis_sampel" class="form-select" id="id-jenis-sampel" style="width: 100%;" aria-label="Default select example">
                        </select>
                        <div class="invalid-feedback errorIdJenisSampel"></div>
                    </div>
                    <div class="mb-3">
                        <label for="peraturan" class="form-label h5">Peraturan</label>
                        <input type="text" class="form-control" id="peraturan" readonly>
                    </div>
                    <div class="mb-3">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Parameter</th>
                                    <th>Metode</th>
                                    <th>Harga titik</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody class="form-multi-insert">
                                <tr>
                                    <td>
                                        <input type="text" name="parameter[]" class="form-control">
                                    </td>
                                     <td>
                                        <input type="text" name="metode[]" class="form-control">
                                    </td>
                                     <td>
                                        <input type="number" name="harga_per_titik[]" class="form-control" required>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-success btn-sm rounded add-multi-insert"><span class="fa-solid fa-plus"></span></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
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

        $('#id-jenis-sampel').select2({
            dropdownParent: $('#exampleModal')
        });

        $(".add-multi-insert").click(function (e) {
            e.preventDefault();
            let itemIndex = 0;
            var html = `<tr>
                            <td>
                                <input type="text" name="parameter[]" class="form-control">
                            </td>
                            <td>
                                <input type="text" name="metode[]" class="form-control">
                            </td>
                            <td>
                                <input type="number" name="harga_per_titik[]" id="harga-per-titik" class="form-control" required>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger btn-sm rounded delete-rows"><span class="fa-solid fa-close"></span></button>
                            </td>
                        </tr>`;
            $(".form-multi-insert").append(html);
        })

        $(document).on('click', '.delete-rows', function () {
            $(this).closest('tr').remove();
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
                url: "<?= site_url('master-data/parameter/list-sampel'); ?>",
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
                url: "<?= site_url('master-data/parameter/detail-sampel'); ?>",
                data: {id_jenis_sampel:id_jenis_sampel},
                dataType: 'json',
                cache: false,
                success: function(response) {
                    $("#peraturan").val(response.data)
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + ' ' + xhr.responseText + ' ' + thrownError);
                }
            })

        })
    })
</script>