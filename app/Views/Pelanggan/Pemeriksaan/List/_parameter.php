
<table class="table">
    <thead>
        <tr style="background:chartreuse;">
            <th colspan="2">Peraturan</th>
            <th colspan="2">: <?= $peraturan['peraturan'] ?></th>
        </tr>
        <tr>
            <th>No</th>
            <th><input type="checkbox" id="selectAll" onclick="return toggle(this);" /> Select All<br/></th>
            <th>Parameter</th>
            <th>Jumlah titik</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; foreach ($items as $rows) : ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><input type="checkbox" name="id_parameter[]" value="<?= $rows['id'] ?>" class="checkbox"></td>
            <td><?= $rows['parameter'] ?></td>
            <td><input type="number" value="1" name="jumlah_titik[]" class="form-control"></td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>