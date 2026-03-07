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
        @media print {
            /* Atur ukuran kertas ke ukuran label (contoh: 100mm x 50mm) */
            @page {
                size: 60mm 50mm;
                margin: 0; /* Hilangkan margin kertas */
            }

            body {
                margin: 0;
                padding: 0;
            }

            .label-container {
                width: 55mm;
                height: 45mm;
                box-sizing: border-box;
                overflow: hidden;
                margin-left: 7px;
                margin-top: 7px;
                border: 1px solid;
            }
        }

    </style>
    <link rel="stylesheet" href="<?= base_url('assets/css/custom.css') ?>">
    <style>
        .img-logo {
                margin-left: 4px;
                width: 100px;
                height: 25px;
            }
    </style>
</head>
<body>
    <div class="d-flex justify-content-end align-items-center mt-1">
        <button class="btn btn-primary rounded btn-sm" onclick="window.print()" title="Cetak">
            <i class="ti ti-printer"></i> Cetak
        </button>
    </div>
    <!-- <div class="row">
        <div class="col-md-4"> -->
            <?php

            use chillerlan\QRCode\QRCode;
            
            foreach ($items as $rows) :
            ?>
            <div class="label-container">
                <img src="<?= base_url('assets/images/logo.webp') ?>" alt="" class="img-logo"><br>
                <p style="font-family: monospace; font-weight:bold; text-align: center; font-size: 8pt;">Tgl & Jam : <?= date('d/m/Y', strtotime($rows['tgl_terima_coolbox'])).' '.date('H:i', strtotime($rows['jam_terima_coolbox'])); ?></p>
                <p for="" style="font-family: monospace; font-weight:bold; text-align: center;">
                    No. Antrian : <?= $rows['no_antrian'] ?>
                    <?= $rows['kode_coolbox'] ?><br>
                    <?= $rows['nama_instansi'] ?>
                </p>
                <?php
                $qrdata = 'BBLKM_Jakarta/'.$rows['kode_coolbox'].'/'.$rows['nama_instansi'];
                $qrcode = (new QRCode())->render($qrdata);
                ?>
                <img src="<?= esc($qrcode) ?>" alt="QR Code" style="width: 35px;">
            </div>
            <?php endforeach;?>
        <!-- </div>
    </div> -->
</body>