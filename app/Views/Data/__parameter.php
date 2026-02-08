
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th style="width: 15%;"><input type="checkbox" id="selectAll" onclick="return toggle(this);" /> Pilih semua<br/></th>
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