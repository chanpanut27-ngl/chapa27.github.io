<?php

use App\Models\LaboratoriumModel;
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
    <!-- Kepala Surat (Kop) -->
    <div class="kop-surat">
        <div class="text-end fw-bold">LB.IV.7.1.1.4</div>
        <h5>RENCANA ANGGARAN BIAYA <br>
Uji Laboratorium <?= $items['instansi'] ?> <br>
<?= $items['alamat'] ?>
</h5>
    </div>

    <!-- Isi Surat -->
    <div class="isi-surat">
<p><b>A. Biaya Pengujian Sampel Aktif</b></p>
<table class="table table-bordered" style="font-size: 10pt;">
    <thead style="border: 1px solid;">
        <tr>
            <th>No</th>
            <th>Laboratorium</th>
        </tr>
    </thead>
    <tbody style="border: 1px solid;">
        <?php   
        $id_pelanggan = $items['id'];
        $permintaan_sampel = new PermintaanSampelModel();
        $rest_ps = $permintaan_sampel->get_data($id_pelanggan);
        $laboratorium = new LaboratoriumModel();
        $rest_lab = $laboratorium->findAll();

        use App\Models\ParameterModel;
        $m_parameter = new ParameterModel();
        $parameter = $m_parameter->get_data();

        $arr = [];
        foreach ($rest_ps as $key) {
            $arr[] = $key['id_lab'];
        }
        $dataUnik = array_flip(array_flip($arr));
        $no = 1;
        $total = 0;
        foreach ($rest_lab as $row) {
          foreach ($dataUnik as $r) {
            if ($r == $row['id']) {
                ?>
                <tr>
                    <td class="text-center"><?= $no++ ?></td>
                    <td><?= $row['nama_lab']; ?></td>
                    <td class="fw-bold">Jenis sampel</td>
                    <td class="fw-bold">Jumlah sampel (∑)</td>
                    <td class="fw-bold">Biaya Satuan (Rp)</td>
                    <td class="fw-bold">Jumlah Biaya (Rp)</td>
                    <td class="fw-bold">Keterangan</td>
                </tr>
                <?php
                foreach ($rest_ps as $s) {
                    $total = $total + $s['jumlah_biaya'];
                    if ($r == $s['id_lab']) {
                    ?>
                    <tr>
                        <td colspan="2"></td>
                        <td><b><?= $s['jenis_sampel'] ?></b><br><?= $s['peraturan'] ?></td>
                        <td class="text-center"><?= $s['jumlah_sampel'] ?></td>
                        <td class="text-end"><?= number_to_currency($s['pnbp'], 'IDR', 'ID', 0); ?></td>
                        <td class="text-end"><?= number_to_currency($s['jumlah_biaya'], 'IDR', 'ID', 0); ?></td>
                        <td>
                            <?php
                            $imp = '';
                            $arr_parameter = [];
                            foreach ($parameter as $key) {

                                if ($s['id_jenis_sampel'] == $key['id_jenis_sampel']) 
                                {
                                    $arr_parameter[] = $key['parameter'];
                                }

                            }
                            $imp = implode(', ', $arr_parameter);
                            echo $imp;
                            ?>
                        </td>
                    </tr>
                    <?php
                    }
                }
            }
          }
        }
        ?>
        <tr>
            <td colspan="5" class="fw-bold">Total Biaya Pengujian (PNBP) ( 1 x pengujian)</td>
            <td class="fw-bold text-end"><?= number_to_currency($total, 'IDR', 'ID', 0); ?></td>
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