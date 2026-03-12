<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $no_reg ?>_Penawaran</title>
    <?= link_tag('assets/css/style.css') ?>
    <?= link_tag('assets/fonts/tabler-icons.min.css'); ?>
    <?= link_tag('assets/fonts/fontawesome.css'); ?>
    <style media="print">
        #toolbarContainer, .no-print, button {
            display: none !important;
        }
        .qr-code {
            width: 70px;
            height: 70px;
        }
    </style>
    <style>
        .kertas-surat {
            width: 210mm; /* Ukuran A4 */
            min-height: 297mm;
            padding: 5mm;
            background-color: white;
            /* box-shadow: 0 0 10px rgba(0,0,0,0.1); */
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
            text-align: left;
            width: 100%;
        }
        .nama-penanda { margin-top: 70px; font-weight: bold; text-decoration: underline; }
    </style>
</head>
<body>
    <div class="d-flex justify-content-end align-items-center mt-1">
        <button class="btn btn-primary rounded btn-sm" onclick="window.print()" title="Cetak" style="text-align: right;">
            <span class="fa-solid fa-print"></span> Cetak
        </button>
    </div>
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

        <!-- Tanggal & Perihal -->
        <div class="info-surat">
            <div>
                Nomor :  <br>
                Lampiran : 3 Lembar<br>
                Hal : <b>Pelaksanaan Sampling dan Uji Sampel</b>
            </div>
            <div>Jakarta,             </div><div></div>
        </div>

        <!-- Alamat Tujuan -->
        <div class="tujuan-surat">
            Yang terhormat<br>
            Direktur <?= $items['instansi'] ?><br>
            <?= $items['alamat'] ?>
        </div>

    <!-- Isi Surat -->
    <div class="isi-surat">
        <p> Menindaklanjuti perihal permohonan pelaksanaan sampling dan uji sampel,bersama ini
disampaikan rencana pelaksanaan kegiatan pengujian faktor risiko penyakit dan lingkungan
sebagai berikut : <br>
<ol>
  <li>
    Lokasi dan jumlah sampel uji serta biaya pelaksanaan sesuai terlampir.
  </li>
  <li>
    Prosedur Pembayaran <br>
    a. Penerimaan Negara Bukan Pajak (PNBP) dipungut sesuai Peraturan Menteri
Keuangan &nbsp;&nbsp;&nbsp;&nbsp;Republik Indonesia Nomor 45 Tahun 2024 tentang Jenis dan Tarif
Atas Jenis Penerimaan &nbsp;&nbsp;&nbsp;Negara Bukan Pajak yang bersifat Volatil dan Kebutuhan
Mendesak yang berlaku pada &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kementerian Kesehatan. <br>
b. Biaya akomodasi, uang harian dan transportasi dibebankan kepada wajib bayar
(konsumen) &nbsp;&nbsp;sesuai dengan Standard Biaya Masukan Tahun Anggaran 2024
yang dikeluarkan oleh &nbsp;&nbsp;&nbsp;&nbsp;Kementerian Keuangan <br>
    c. Jumlah dan jenis contoh uji yang telah disepakati dalam RAB (Rencana
Anggaran Biaya) &nbsp;&nbsp;&nbsp;&nbsp;mengikat kedua belah pihak dan tidak dapat dilakukan
perubahan. <br>
d. <b>Tidak menerima gratifikasi dalam bentuk apapun</b>
  </li>
</ol> 

</p>
<p>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sebagai bahan pertimbangan & akuntabilitas kinerja, terlampir disampaikan Rencana
    Anggaran Biaya (RAB) dan Pakta Integritas untuk di tandatangani, di stempel dan
    disampaikan kembali ke Labkesmas Jakarta. <br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Koordinasi dan informasi lebih lanjut melalui Sdr. Niko Sutanto di Call Center Program
    Layanan Labkesmas Jakarta 081290003610 / email prola.bblkmjkt@gmail.com
</p>
<p>Atas perhatian dan kerjasama yang baik, disampaikan terima kasih</p>
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
                Jakarta, <br>
Atasan langsung Bendahara Penerima<br>
        <div class="nama-penanda">
            ${nama_pengirim1} <br>
            NIP. ${nip_pengirim1}
        </div>
            </div>
        </div>
    </div>


</div>
<!-- fakta integritas -->
    <div class="kertas-surat">
        <div class="kop-surat">
            <div class="row">
                <div class="col-sm-12 text-end"><h5>LB.IV.7.1.1.5</h5></div>
                <div class="col-sm-12 text-center">
                    <h4>PAKTA INTEGRITAS <br>
                    ANTI GRATIFIKASI DAN PELAYANAN PRIMA</h4>
                </div>
            </div>
        </div>
        <!-- Isi Surat -->
    <div class="isi-surat">
        <p>Komitmen pejabat/pegawai Labkesmas Jakarta dan satuan kerja mitra Labkesmas Jakarta
untuk pelaksanaan Sistem Integritas dalam pelayanan pada Labkesmas Jakarta.</p>
        
        <p>
Kami pejabat / pegawai Labkesmas Jakarta dan <?= $items['instansi'] ?>, bersama ini menyatakan
hal-hal sebagai berikut :
<ol>
  <li>
    Pelayanan pemeriksaan sampel dilaksanakan oleh Tim Kerja Program dan Layanan
dan Instalasi terkait di Labkesmas Jakarta ;
  </li>
  <li>
    Labkesmas Jakarta memberikan pelayanan kepada <?= $items['instansi'] ?> secara cepat,
tepat, transparan dan akuntabel, dan tanpa memungut biaya (zero cost) selain tarif
sesuai dengan PMK 45 Tahun 2024;
  </li>
  <li>
<?= $items['instansi'] ?> menunjukkan tempat pengambilan sampel sesuai RAB;
  </li>
  <li>
Pegawai Labkesmas Jakarta tidak menerima gratifikasi dalam bentuk apapun
  </li>
</ol>
        </p>
        <p>
            Demikian pernyataan janji ini Kami buat dengan sesungguhnya. Atas pelanggaran janji yang
Kami nyatakan dalam Pakta Integritas ini, Kami bersedia dikenakan sanksi moral, sanksi
administrasi sesuai dengan ketentuan Perundang-undangan yang berlaku.
        </p>
    </div>

    <!-- Penutup & Tanda Tangan -->
    <div class="tanda-tangan">
        <div class="row">
            <div class="col-sm-8">
                <br><br><br>
Kepala Balai Besar Laboratorium <br>
Kesehatan Masyarakat Jakarta
        <div class="nama-penanda">
            dr. Nida Rohmawati, MPH <br>
NIP. 197208182000122001
        </div>
            </div>
            <div class="col-sm-4">
                Ditandatangani di : Jakarta <br>
Pada tanggal :   <br><br>
<?= $items['instansi'] ?><br><br>
        <div class="nama-penanda">_____________________</div>
            </div>
        </div>
    </div>
    </div>

<!-- rencana anggaran biaya  -->
 <div class="kertas-surat">
    <!-- Kepala Surat (Kop) -->
    <div class="kop-surat">
        <div class="row">
            <div class="col-sm-12 fw-bold">
                <p class="text-end">LB.IV.7.1.1.4</p>
            </div>
            <div class="col-sm-12 text-center fw-bold">
                 <h5>RENCANA ANGGARAN BIAYA <br>
                Uji Laboratorium <?= $items['instansi'] ?> <br>
                    <label for="" style="font-size: 11pt; font-weight: initial;"><?= $items['alamat'] ?></label>
                </h5>
            </div>
        </div>
       
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

use App\Models\LaboratoriumModel;
use App\Models\PermintaanSampelModel;

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
<div class="row">
    <div class="col-sm-12">
    <b>
*Dipungut sesuai Peraturan Menteri Keuangan Republik Indonesia Nomor 45 Tahun 2024
tentang Jenis dan Tarif Atas Jenis Penerimaan Negara Bukan Pajak yang bersifat Volatil dan
Kebutuhan Mendesak yang berlaku pada Kementerian Kesehatan 
    </b>
<b><br>
    *Pembayaran Penerimaan Negara Bukan Pajak (PNBP) ini dilakukan secara langsung oleh
Wajib Bayar ke kas Negara melalui Bank/POS Persepsi maksimal 7 hari sejak billing dibuat
</b>
    </div>
</div>
</div>

    <!-- Penutup & Tanda Tangan -->
    <div class="tanda-tangan">
        <div class="row">
            <div class="col-sm-8">
Menyetujui <br>
<?= $items['instansi'] ?>
        <div class="nama-penanda">
            (______________________)
        </div>
            </div>
            <div class="col-sm-4">
                Jakarta,        <br>
Atasan langsung Bendahara Penerima<br>
        <div class="nama-penanda">
            ${nama_pengirim1} <br>
            NIP. ${nip_pengirim1}
        </div>
            </div>
        </div>
    </div>
    
</div>

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
            $no = 1; foreach ($bps as $row) :  
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
    <b>*Biaya penyelenggaraan di bayarkan tunai (cash) atau transfer ke petugas penanggung jawab
pada saat pelaksanaan <br>
*Transport petugas ditanggung oleh konsumen (antar jemput) <br>
*TIDAK MENERIMA GRATIFIKASI DALAM BENTUK APAPUN</b>
<!-- Penutup & Tanda Tangan -->
    <div class="tanda-tangan">
        <div class="row">
            <div class="col-sm-8">
                <br><br><br>
Kepala Balai Besar Laboratorium <br>
Kesehatan Masyarakat Jakarta
        <div class="nama-penanda">
            dr. Nida Rohmawati, MPH <br>
NIP. 197208182000122001
        </div>
            </div>
            <div class="col-sm-4">
                Ditandatangani di : Jakarta <br>
Pada tanggal :   <br><br>
<?= $pelanggan['instansi']; ?><br><br>
        <div class="nama-penanda">_____________________</div>
            </div>
        </div>
    </div>
    </div>
</div>
</body>
</html>