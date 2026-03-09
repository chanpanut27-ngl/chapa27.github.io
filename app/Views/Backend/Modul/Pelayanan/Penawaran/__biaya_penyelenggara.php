<style>
        .kertas-surat {
            width: 210mm; /* Ukuran A4 */
            min-height: 297mm;
            padding: 10mm;
            background-color: white;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .kop-surat {
            text-align: center;
            border-bottom: 3px double #000;
            margin-bottom: 20px;
            padding-bottom: 10px;
        }
        .kop-surat h2 { margin: 0; text-transform: uppercase; }
        .kop-surat p { margin: 0; font-size: 12px; }
        
        .info-surat {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .tujuan-surat { margin-bottom: 30px; }
        .isi-surat { text-align: justify; }
        .isi-surat p { text-indent: 0px; margin-bottom: 15px; }
        
        .tanda-tangan {
            margin-top: 50px;
            float: left;
            text-align: left;
            width: 100%;
        }
        .nama-penanda { margin-top: 70px; font-weight: bold; text-decoration: underline; }
    </style>
</head>
<body>

<div class="kertas-surat">
    <!-- Isi Surat -->
    <div class="isi-surat">
    <p><b>B. Biaya Penyelenggaraan</b></p>
    <p><b>1. Uang harian petugas</b></p>
    <table class="table table-bordered" style="font-size: 10pt;">
        <thead style="border: 1px solid;">
            <tr>
                <th>No</th>
                <th>Biaya penyelenggaraan</th>
                <th>∑ Orang</th>
                <th>∑ Hari</th>
                <th>Biaya Satuan (Rp)</th>
                <th>Jumlah Biaya (Rp)</th>
            </tr>
        </thead>
        <tbody style="border: 1px solid;">
            <?php 
            $no = 1; foreach ($items as $row) :  
                $jumlah_biaya = $row['jumlah_orang'] * $row['jumlah_hari'] * $row['biaya_satuan']
            ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td>Uang harian petugas sampling</td>
                    <td class="text-center"><?= $row['jumlah_orang'] ?></td>
                    <td class="text-center"><?= $row['jumlah_hari'] ?></td>
                    <td class="text-center"><?= number_to_currency($row['biaya_satuan'], 'IDR', 'ID', 0) ?></td>
                    <td class="text-center"><?= number_to_currency($jumlah_biaya, 'IDR', 'ID', 0) ?></td>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>
    </div>
</div>