
<table class="table table-bordered">
    <thead>
        <tr>
            <th style="width: 5%;">No</th>
            <th style="width: 5%; text-align:center;"><input type="checkbox" id="selectAll" onclick="return toggle(this);" /> Pilih semua<br/></th>
            <th style="text-align: center;">Parameter</th>
            <th style="width: 15%; text-align:right;">Harga pertitik</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $jumlah = 0;
            $no = 1; 
            foreach ($items as $rows) : 
            $jumlah = $no;
        ?>
        <tr>
            <td style="text-align:left;"><?= $no++; ?></td>
            <td style="text-align:center;"><input type="checkbox" name="id_parameter[]" value="<?= $rows['id'] ?>" class="checkbox" required></td>
            <td><?= $rows['parameter'] ?></td>
            <td style="text-align:right;"><?= number_to_currency($rows['harga_per_titik'], 'IDR', 'ID', 0); ?></td>
        </tr>
        <?php endforeach;?>
        Jumlah parameter : <?= $jumlah ?>
        <input type="hidden" name="jumlah_parameter" value="<?= $jumlah ?>">
    </tbody>
</table>