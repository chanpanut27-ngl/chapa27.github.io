<?php
$arr_param = [];
foreach ($items as $row) {
    $arr_param[] = $row;
}
?>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel"><i class="ti ti-square-plus fs-2"></i> <?= $title; ?></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('pelayanan/lembar-hasil-uji/create-data'); ?>" class="form-data">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th colspan="4"><?= $row['nama_lab'] ?></th>
                            </tr>
                            <tr>
                                <th>Parameter</th>
                                <th>Satuan</th>
                                <th>Kadar maksimum</th>
                                <th>Hasil pengujian</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                               echo form_hidden('id_pelanggan', $id_pelanggan);
                               echo form_hidden('id_jenis_sampel', $id_jenis_sampel);
                               echo form_hidden('id_lab', $row['id_lab']);
                               echo form_hidden('keterangan', 'ket');

                            foreach ($items as $row) :
                               echo form_hidden('id_pemeriksaan[]', $row['id_pp']);
                               echo form_hidden('id_parameter[]', $row['id_parameter']);
                            ?>
                            <tr>
                                <td><?= $row['parameter'] ?></td>
                                <td><input type="text" name="satuan[]" class="form-control"></td>
                                <td><input type="text" name="kadar_maksimum[]" class="form-control"></td>
                                <td><input type="text" name="hasil_pengujian[]" class="form-control"></td>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
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
    $(document).ready(function () {

    $(".form-data").submit(function (e) {
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: $(this).attr('action'),
            data: $(this).serialize(),
            dataType: 'json',
            cache: false,
            beforeSend: function() {
                $('.btn-simpan').attr('disable', 'disabled');
                $('.btn-simpan').html('<span class="fa-solid fa-spin fa-spinner"></span>');
            },
            success: function(response) {
                var error = response.error;

                if (error) {
                        Swal.fire({
                            title: "Gagal",
                            text: response.error,
                            icon: "error",
                            timer: 2000,
                            width: '400px',
                            padding: '1em'
                        });

                } else {
                    
                    Swal.fire({
                        title: "Berhasil",
                        text: response.sukses,
                        icon: "success",
                        timer: 2000,
                        width: '400px',
                        padding: '1em'
                    });
                }
            },
            complete: function() {
                $('.btn-simpan').removeAttr('disable');
                $('.btn-simpan').html('<i class="ti ti-device-floppy"></i> Simpan');
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError + "\n" + ajaxOptions);
            }
        })

    })
})
</script>