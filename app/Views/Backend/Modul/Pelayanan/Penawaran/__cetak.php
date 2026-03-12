<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $no_reg ?>_Penawaran</title>
    <?= link_tag('assets/css/style.css') ?>
    <?= link_tag('assets/fonts/tabler-icons.min.css'); ?>
    <?= link_tag('assets/fonts/fontawesome.css'); ?>


    <style>
        .kertas-surat {
            width: 210mm; /* Ukuran A4 */
            min-height: 297mm;
            padding: 20mm;
            background-color: white;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .kop-surat {
            text-align: justify;
            border-bottom: 3px double #000;
            margin-bottom: 20px;
            padding-bottom: 10px;
        }

        .kop-surat h2 { margin: 0; text-transform: uppercase; }
        .kop-surat p { margin: 0; font-size: 12px; text-align: left;}
        
        .info-surat {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .tujuan-surat { margin-bottom: 30px; }
        .isi-surat { text-align: justify; }
        .isi-surat p { text-indent: 40px; margin-bottom: 15px; }

        .tanda-tangan {
            margin-top: 50px;
            float: center;
            text-align: right;
            width: 200px;
        }
        .nama-penanda { margin-top: 70px; font-weight: bold; text-decoration: underline; }
    </style>
</head>
<body>
    <div class="kertas-surat">
        <div class="kop-surat">
            <div class="row">
                <div class="col-sm-6">
                    <img src="<?= base_url('assets/images/logo.webp') ?>" alt="" class="img-fluid" alt="logo" style="height: 55px;">
                </div>
                <div class="col-sm-6">
                    <p style="line-height: 12px;"><label for="" style="color:#00A69A; font-weight: bold;">Kementerian Kesehatan</label></p>
                    <p style="line-height: 12px;">
                        <b>Direktorat Jenderal Kesehatan Primer dan Komunitas</b>
                        Balai Besar Laboratorium Kesehatan Masyarakat
                        Jakarta
                    </p>
                    <p style="line-height: 12px;">
                        Jl.Bambu Apus Raya No.6 Blok C1 Jakarta Timur 13890 <br>
                        <i class="ti ti-phone"></i> (021) 3871 2050 - (021) 3871 2051 <br>
                        <i class="ti ti-globe"></i> www.bblkmjakarta.org
                    </p>
                </div>
                <div class="col-sm">
                    <p for="" class="fw-bold text-end">No.Kode : LB.IV.7.1.1.3</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>