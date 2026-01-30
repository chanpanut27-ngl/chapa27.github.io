<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>" id="main-style-link" >
    <title><?= $kode_coolbox.'_Label Coolbox';?></title>
    <style media="print">
        /* Sembunyikan elemen dengan ID ci-logo dan kelas no-print saat mencetak */
        #toolbarContainer, .no-print, button {
            display: none !important;
        }
    </style>
    <link rel="stylesheet" href="<?= base_url('assets/css/custom.css') ?>">
    <script>
    </script>
</head>
<body style="margin-left:0.1cm">
    <div class="d-flex justify-content-end align-items-center mt-1">
        <button class="btn btn-primary rounded btn-sm" onclick="window.print()" title="Cetak" style="text-align: right;">
            <span class="fa-solid fa-print"></span> Cetak
        </button>
    </div>
    <!-- <div class="row">
        <div class="col-md-4"> -->
            <?php
            foreach ($items as $rows) :
            ?>
            <div class="persegi-panjang">
                <div class="row">
                    <div class="col-sm-6">
                        <img src="<?= base_url('assets/images/logo-2.png') ?>" alt="" style="width: 130px; height: 38px;">
                    </div>
                    <div class="col-sm-6">
                        <label for="" style="font-size: 11px; margin-left:12px;">Tgl : <?= date('d/m/Y', strtotime($rows['tanggal'])).' Jam : '.date('H:i', strtotime($rows['jam'])); ?></label>
                    </div>
                    <div class="col-sm-6 content-label">
                        <?= $rows['kode_coolbox'] ?>
                        <label for="" style="font-size: 14px;vertical-align: top;"><?= $rows['nama_instansi'] ?></label>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
        <!-- </div>
    </div> -->
</body>