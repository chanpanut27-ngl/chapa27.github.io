
<table class="table">
    <thead>
        <tr style="background:chartreuse;">
            <th colspan="2">Peraturan</th>
            <th colspan="3">: <?= $peraturan['peraturan'] ?></th>
        </tr>
        <tr>
            <th>No</th>
            <th><input type="checkbox" id="selectAll" onclick="return toggle(this);" /> Pilih semua<br/></th>
            <th>Parameter</th>
            <th>Harga pertitik</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; foreach ($items as $rows) : ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><input type="checkbox" name="id_parameter[]" value="<?= $rows['id'] ?>" class="checkbox"></td>
            <td><?= $rows['parameter'] ?></td>
            <td><?= number_to_currency($rows['harga_per_titik'], 'IDR', 'ID', 0); ?></td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>