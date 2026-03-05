<?php

use App\Models\LaboratoriumTujuanModel;
use App\Models\PermintaanSampelModel;

$lab_tujuan = new LaboratoriumTujuanModel();
$kode_pengantar = $items['kode_pengantar'] ?? '';
$a = $lab_tujuan->get_data($kode_pengantar);
// $this->modelLabTujuan->get_data($kode_pengantar);
?>
<style>
        .kertas-surat {
            width: 210mm; /* Ukuran A4 */
            min-height: 297mm;
            padding: 20mm;
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
    <!-- Kepala Surat (Kop) -->
    <div class="kop-surat">
        <div class="text-end fw-bold fs-5">LB.IV.7.1.1.4</div>
        <h4>RENCANA ANGGARAN BIAYA <br>
Uji Laboratorium <?= $items['instansi'] ?> <br>
<?= $items['alamat'] ?>
</h4>
    </div>

    <!-- Isi Surat -->
    <div class="isi-surat">
<p><b>A. Biaya Pengujian Sampel Aktif</b></p>
<table class="table table-bordered">
    <thead style="border: 1px solid;">
        <tr>
            <th>No</th>
            <th>Jenis sampel</th>
            <th>∑ Smpl</th>
            <th>Biaya Satuan (Rp)</th>
            <th>Jumlah Biaya (Rp)</th>
            <th>Keterangan</th>
        </tr>
    </thead>
    <tbody style="border: 1px solid;">
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <?php   
        $id_pelanggan = $items['id'];
        $permintaan_sampel = new PermintaanSampelModel();
        $result = $permintaan_sampel->get_data($id_pelanggan);
        $no = 1;
        foreach ($result as $rows) {
        ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $rows['jenis_sampel'] ?></td>
            <td class="text-center"><?= $rows['jumlah_sampel'] ?></td>
            <td class="text-right"><?= $rows['pnbp'] ?></td>
            <td><?= $rows['jumlah_biaya'] ?></td>
            <td>
                Pengujian: Uji Duplo Metode Uji: Metode Membran Flter dengan media CCA/ISO 9308
            </td>
        </tr>
        <?php
        $total = 0;
             $total = $total + $rows['jumlah_biaya'];
        }
        ?>
        <tr>
            <td colspan="4" class="text-end"><b>Total Biaya Pengujian (PNBP) ( 1 x pengujian)</b></td>
            <td><?= $total ?></td>
        </tr>
    </tbody>
</table>
<p>
    <b>
        *Dipungut sesuai Peraturan Menteri Keuangan Republik Indonesia Nomor 45 Tahun 2024
tentang Jenis dan Tarif Atas Jenis Penerimaan Negara Bukan Pajak yang bersifat Volatil dan
Kebutuhan Mendesak yang berlaku pada Kementerian Kesehatan 
    </b>
</p>
<p>
<b>
    *Pembayaran Penerimaan Negara Bukan Pajak (PNBP) ini dilakukan secara langsung oleh
Wajib Bayar ke kas Negara melalui Bank/POS Persepsi maksimal 7 hari sejak billing dibuat
</b>
</p>
</div>

    <!-- Penutup & Tanda Tangan -->
    <div class="tanda-tangan">
        <div class="row">
            <div class="col-md-8">
Menyetujui <br>
<?= $items['instansi'] ?>
        <div class="nama-penanda">
            (______________________)
        </div>
            </div>
            <div class="col-md-4">
                Jakarta, Februari 2026<br>
Atasan langsung Bendahara Penerima<br>
        <div class="nama-penanda">
            ${nama_pengirim1} <br>
            NIP. ${nip_pengirim1}
        </div>
            </div>
        </div>
    </div>
    
</div>