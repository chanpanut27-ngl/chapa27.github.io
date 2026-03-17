<table id="example" class="table table-hover table-bordered">
    <thead>
        <?php
        $arrth = ['#', 'Nama Lab', 'Jenis sampel'];
        echo '<tr class="bg-gray-200">';
        foreach ($arrth as $th) :
            echo '<th>' . $th . '</th>';
        endforeach;
        echo '</tr>';
        ?>
    </thead>
    <tbody>
        <form action="<?= base_url('pelayanan/lembar-hasil-uji/create-data'); ?>" class="form-data-lhu">
        <?= csrf_field(); ?>
                    
        <?php
        $no = 1;
        foreach ($items as $row) :
        ?>
            <tr class="bg-blue-200 fw-bold">
                <td><b><?= $no++; ?></b></td>
                <td><?= $row['nama_lab'] ?></td>
                <td><?= $row['jenis_sampel'] ?></td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Parameter</th>
                                <th>Metode</th>
                                <th>Satuan</th>
                                <th>Kadar maksimum yang diperbolehkan</th>
                                <th>Hasil pengujian</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($items as $lhu) :
                                if ($row['id_jenis_sampel'] == $lhu['id_jenis_sampel']) :
                            ?>
                            <tr>
                                <input type="text" name="id_pp[]" value="<?= $lhu['id_pp'] ?>">
                                <input type="text" name="id_pelanggan" value="<?= $lhu['id_pelanggan'] ?>">
                                <input type="text" name="no_reg" value="<?= $lhu['no_reg'] ?>">
                                <input type="text" name="id_lab[]" value="<?= $lhu['id_lab'] ?>">
                                <input type="text" name="id_parameter[]" value="<?= $lhu['id_parameter'] ?>">
                                <td width="12%" style="font-size: 9pt;"><?= $lhu['parameter'] ?></td>
                                <td width="11%" style="font-size: 9pt;"><?= $lhu['metode'] ?></td>
                                <input type="text" name="id_jenis_sampel[]" value="<?= $lhu['id_jenis_sampel'] ?>">

                                <td>
                                    <input type="text" name="satuan[]" class="form-control">
                                </td>
                                <td>
                                    <input type="text" name="kadar_maksimum[]" class="form-control">
                                </td>
                                <td>
                                    <input type="text" name="hasil_pengujian[]" class="form-control">
                                </td>
                                <td>
                                    <input type="text" name="keterangan[]" class="form-control">
                                </td>
                            </tr>
                            <?php endif; endforeach;?>
                        </tbody>
                    </table>
                </td>
            </tr>
        <?php endforeach; ?>
        <button type="submit" class="btn btn-primary btn-sm rounded btn-simpan"><i class="ti ti-device-floppy"></i> Simpan</button>
        </form>
    </tbody>
</table>
<script>

     $(document).ready(function () {
       $(".form-data-lhu").submit(function (e) {
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
                        Swal.fire({
                            title: "Berhasil",
                            text: response.sukses,
                            icon: "success",
                            timer: 2000,
                            width: '400px',
                            padding: '1em'
                        });
                },
                complete: function() {
                    $('.btn-simpan').removeAttr('disable');
                    $('.btn-simpan').html('<span class="fa-solid fa-save"></span> Simpan');
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError + "\n" + ajaxOptions);
                }
            })
       })
     })

</script>