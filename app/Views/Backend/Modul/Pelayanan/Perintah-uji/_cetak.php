
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>" id="main-style-link" >
    <title><?= $kode_pengantar.'_Pengantar_LHU' ?></title>
    
    <style media="print">
        /* Sembunyikan elemen dengan ID ci-logo dan kelas no-print saat mencetak */
        #toolbarContainer, .no-print, button {
            display: none !important;
        }
    </style>
    <script>
        // window.print();
    </script>
</head>
<body>
      <div class="d-flex justify-content-end align-items-center gap-1">
        <button type="button" class="btn btn-secondary btn-sm rounded btn-refresh-data">
            <span class="pc-micon"><i class="fa-solid fa-refresh"></i>
        </button>
        <button class="btn btn-info rounded btn-sm" onclick="window.print()" title="Cetak" style="text-align: right;">
            <span class="fa-solid fa-print"></span> Cetak
        </button>
    </div>
    <div class="card-body"> 
        <table class="table table-hover table-bordered ti">
            <thead style="font-family: arial; font-size:12px;">
                <tr>
                    <th><label for="">No</label></th>
                    <th><label for="">Kode Sampel</label></th>
                    <th><label for="">Jenis Sampel</label></th>
                    <th><label for="">Peraturan</label></th>
                    <th><label for="">Parameter Uji</label></th>
                    <th><label for="">Metode Uji</label></th>
                    <th><label for="">Keterangan</label></th>
                </tr>
            </thead>
            <tbody style="font-family: arial; font-size:12px;">
                <?php $no=1; foreach ($items as $row) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row['kode_sampel']; ?></td>
                        <td><?= $row['jenis_sampel'].','.$row['keterangan']; ?><input type="hidden" name="id_jenis_sampel[]" value="<?= $row['id_jenis_sampel'] ?>"></td>
                        <td><?= $row['peraturan']; ?></td>
                        <td><textarea name="parameter_uji[]" class="form-control"><?= $row['parameter_uji'] ?></textarea></td>
                        <td><textarea name="metode_uji[]" class="form-control"><?= $row['metode_uji'] ?></textarea></td>
                        <td><textarea name="keterangan[]" class="form-control"><?= $row['ket_sampel'] ?></textarea></td>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</body>
</html>
