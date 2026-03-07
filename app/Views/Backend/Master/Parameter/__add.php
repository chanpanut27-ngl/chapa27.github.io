<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel"><i class="ti ti-square-plus fs-2"></i> <?= $title; ?></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('master-data/parameter/create-data') ?>" class="form-data">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="id-lab" class="form-label h5">Laboratorium</label>
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
                        <input type="text" class="form-control fw-bold" id="peraturan" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="ket-peraturan" class="form-label h5">Keterangan</label>
                        <textarea id="ket-peraturan" class="form-control"></textarea>
                        <div class="invalid-feedback errorKetPeraturan"></div>
                    </div>
                    <div class="mb-3">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Parameter</th>
                                    <th>Metode</th>
                                    <th>Harga per titik</th>
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
                                        <button type="button" class="btn btn-success btn-sm rounded add-multi-insert"><i class="ti ti-plus"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm rounded btn-simpan"><i class="ti ti-device-floppy"></i> Simpan</button>
                    <button type="button" class="btn btn-secondary btn-sm rounded" data-bs-dismiss="modal"><i class="ti ti-x"></i> Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
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
                            <button type="button" class="btn btn-danger btn-sm rounded delete-rows"><i class="ti ti-minus"></i></button>
                        </td>
                    </tr>`;
        $(".form-multi-insert").append(html);
    })

    $(document).on('click', '.delete-rows', function () {
        $(this).closest('tr').remove();
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
                $("#ket-peraturan").html(response.ket_peraturan).show()
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + ' ' + xhr.responseText + ' ' + thrownError);
            }
        })
    })
</script>

<script src="<?= base_url('assets/js/Master/@save_parameter.js') ?>"></script>
