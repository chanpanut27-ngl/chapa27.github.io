
<table class="table">
    <thead>
        <tr>
            <th colspan="2">Peraturan</th>
            <th colspan="2">: <?= $peraturan['peraturan'] ?></th>
        </tr>
        <tr>
            <th>No</th>
            <th></th>
            <th>Parameter</th>
            <th>Jumlah titik</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; foreach ($items as $rows) : ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><input type="checkbox" name="id_parameter[]" value="<?= $rows['id'] ?>"></td>
            <td><?= $rows['parameter'] ?></td>
            <td><input type="text" name="jumlah_titik[]" class="form-control"></td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>