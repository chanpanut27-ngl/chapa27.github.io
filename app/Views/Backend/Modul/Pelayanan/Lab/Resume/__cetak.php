
<?php

use App\Models\PengantarLabModel;
use App\Models\PermintaanPelangganModel;
use App\Libraries\CustomLib;
use App\Models\KajiUlangKontrakPengantarModel;
use App\Models\KeteranganPengantarModel;
use App\Models\KondisiLingkunganPengantarModel;
use App\Models\PenanggungJawabPengantarModel;
use App\Models\SampelLingkunganModel;
use App\Models\SpesimenPenyakitModel;
use chillerlan\QRCode\QRCode;

$pengantar = new PengantarLabModel();
$permintaan = new PermintaanPelangganModel();

$model = $pengantar->where('kode_pengantar', $kode_pengantar)->first();
$kode_pengantar = $model['kode_pengantar'];
$id_pelanggan = $model['id_pelanggan'];
$data_permintaan = $permintaan->where('id', $id_pelanggan)->first();
$no_reg = $data_permintaan['no_reg'];

$kl_sampel = new KondisiLingkunganPengantarModel(); 
$spesimen_penyakit = new SpesimenPenyakitModel();
$keterangan = new KeteranganPengantarModel();
$kondisi_lingkungan = new KondisiLingkunganPengantarModel();
$kaji_ulang = new KajiUlangKontrakPengantarModel();
$penanggung_jawab = new PenanggungJawabPengantarModel();

foreach ($data_pelanggan as $dp) {
    $alamat = $dp['alamat'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>" id="main-style-link" >
    <title><?= strtoupper($kode_pengantar).'.'.$no_reg.'_Pengantar_Lab' ?></title>
    <style media="print">
        #toolbarContainer, .no-print, button {
            display: none !important;
        }
        .qr-code {
            width: 70px;
            height: 70px;
        }
        @page {
            size: A4 landscape;
            transform: scale(0.9);
            margin-bottom: 1mm;
            margin-top: 1mm;

            /* margin: top right bottom left */
        }
    </style>
    <link rel="stylesheet" href="<?= base_url('assets/css/custom.css') ?>">
    <script>
        // window.print();
    </script>
</head>
<body>
    <div class="d-flex justify-content-end align-items-center mt-1">
        <button class="btn btn-primary rounded btn-sm" onclick="window.print()" title="Cetak" style="text-align: right;">
            <span class="fa-solid fa-print"></span> Cetak
        </button>
    </div>
    <div class="card-body"> 
        <?php 
        $klss = '';
        $ca = '';
        foreach ($group_lab_tujuan as $kl) : 
            $r = $kl_sampel->where('kode_pengantar', $kode_pengantar)->findAll();
            foreach ($r as $x) {
                if ($kl['idkatlab'] == $x['id_kat_lab']) {
                    $klss = $x['kondisi_lingkungan_sekitar_sampel'];
                    $ca = $x['catatan_abnormalitas'];
                }
            }
            ?>
        <!-- HEADER --> <!-- start -->
        <div class="row mt-1">
            <div class="col-md-8">
                <?php
                $custom_lib = new CustomLib();
                echo $custom_lib->logo_kopsurat();
                ?>
            </div>
            <div class="col-md-4">
                <?php echo $custom_lib->ket_kopsurat($nomor_form);?>
            </div>
        </div>
        <!-- HEADER --> <!-- end -->

        
        <div class="row">
            <div class="col-md-10">
                <h5 class="text-center fw-bold">PENERIMAAN SAMPEL</h5>
            </div>
            <div class="col-md-2">
                <label class="text-center fw-bold" style="font-size: 8pt;">No. Kode LB IV 7.1.1.1</label>
            </div>
            <div class="col-md-12">
                <table class="table-bordered" style="border: 1px solid black; width:100%;">
                    <tr>
                        <td class="p-1" style="font-size: 9.5pt;" width="8%"><b>Asal sampel</b></td>
                        <td class="p-1" style="font-size: 9.5pt;" width="50%" style="vertical-align: top;"><?= $dp['instansi']; ?></td>
                        <td class="p-1 align-top" style="font-size: 9.5pt;" rowspan="3"><b>Kondisi lingkungan sampel : </b><?= $klss; ?></td>
                    </tr>
                    <tr>
                        <td class="p-1" style="font-size: 9.5pt;"><b>Alamat</b></td>
                        <td class="p-1" style="font-size: 9.5pt;"><?= $dp['alamat'] ?></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="p-1 align-top" style="font-size:9.5pt;"><b>Catatan abnormalitas : </b> <?= $ca; ?></td>
                    </tr>
                </table>
            </div>
            <div class="col-md-12 mb-1">
                <table class="table-bordered" style="border: 1px solid black; width:100%;">
                    <thead>
                        <?php
                        foreach ($menu_lab as $lab) :
                            if ($kl['idkatlab'] == $lab['id_kat_lab']) :
                        ?>
                        <tr>
                            <th colspan="10" class="fw-bold" style="font-size: 9pt;">
                                <?= ucfirst($lab['nama_lab']);?>
                            </th>
                        </tr>
                        <tr class="fw-bold text-center">
                            <th class="p-1 text-center" style="font-size: 9.5pt;">No</th>
                            <th class="p-1 text-center" style="font-size: 9.5pt;">Kode Sampel</th>
                            <th class="p-1" style="font-size: 9.5pt;">Jenis Sampel</th>
                            <th class="p-1" style="font-size: 9.5pt;"><?= $kl['idkatlab'] == '1' ? 'Lokasi pengambilan' : 'Identitas'; ?></th>
                            <th class="p-1" style="font-size: 9.5pt;">Tgl & Jam Pengambilan Sampel</th>
                            <th class="p-1" style="font-size: 9.5pt;">Peraturan/Baku Mutu</th>
                            <th class="p-1" style="font-size: 9.5pt;">Metode Pemeriksaan</th>
                            <th class="p-1" style="font-size: 9.5pt;">Volume/Berat</th>
                            <th class="p-1" style="font-size: 9.5pt;">Jenis Wadah</th>
                            <th class="p-1" style="font-size: 9.5pt;">Jenis Pengawet</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $index = 1;
                        if ($kl['idkatlab'] == 1) {
                            $pemeriksaan = new SampelLingkunganModel();
                            $r_pemeriksaan = $pemeriksaan->get_data($kode_pengantar, $lab['id_lab']);
                            foreach ($r_pemeriksaan as $row) {
                            $tgl_jam_ambil_sampel = date('d/m/Y', strtotime($row['tgl_ambil_sampel'])).' '. date('H:i', strtotime($row['jam_ambil_sampel']));
                        ?>
                        <tr>
                            <td class="p-1 text-center" style="font-size: 9pt;"><?= $index++ ?></td>
                            <td class="p-1 text-center" style="font-size: 9pt;"><?= $row['kode_sampel']; ?></td>
                            <td class="p-1" style="font-size: 9pt;"><?= $row['jenis_sampel']; ?><?= $row['keterangan'] != '' ? ' , '.$row['keterangan'] : $row['keterangan']; ?></td>
                            <td class="p-1" style="font-size: 9pt;"><?= $row['lokasi_pengambilan_sampel']; ?></td>
                            <td class="text-center" style="font-size: 9pt;"><?= @$tgl_jam_ambil_sampel;?></td>
                            <td class="p-1" style="font-size: 9pt;"><?= $row['peraturan']; ?></td>
                            <td class="p-1 text-center" style="font-size: 9pt;"><?= $row['metode_pemeriksaan']; ?></td>
                            <td class="p-1 text-center" style="font-size: 9pt;"><?= $row['volume_atau_berat']; ?></td>
                            <td class="p-1 text-center" style="font-size: 9pt;"><?= $row['jenis_wadah']; ?></td>
                            <td class="p-1 text-center" style="font-size: 9pt;"><?= $row['jenis_pengawet']; ?></td>
                        </tr>
                        <?php  }
                        } else {
                            $pemeriksaan = new SpesimenPenyakitModel();
                            $r = $pemeriksaan->get_data($kode_pengantar, $lab['id_lab']);
                            foreach ($r as $row) {
                            $tgl_jam_ambil_sampel = date('d/m/Y', strtotime($row['tgl_periksa_sampel'])).' '. date('H:i', strtotime($row['jam_periksa_sampel']));
                        ?>
                        <tr>
                            <td class="p-1" style="font-size: 9pt;"><?= $index++ ?></td>
                            <td class="p-1" style="font-size: 9pt;"><b><?= $row['kode_sampel']; ?></b></td>
                            <td class="p-1" style="font-size: 9pt;"><?= $row['jenis_sampel']; ?></td>
                            <td class="p-1" style="font-size: 9pt;"><?= $row['identitas_sampel']; ?></td>
                            <td class="p-1 text-center" style="font-size: 9pt;"><?= @$tgl_jam_ambil_sampel;?></td>
                            <td class="p-1" style="font-size: 9pt;"><?= $row['peraturan']; ?></td>
                            <td class="p-1" style="font-size: 9pt;"><?= $row['metode_pemeriksaan']; ?></td>
                            <td class="p-1 text-center" style="font-size: 9pt;"><?= $row['volume_atau_berat']; ?></td>
                            <td class="p-1" style="font-size: 9pt;"><?= $row['jenis_wadah']; ?></td>
                            <td class="p-1" style="font-size: 9pt;"><?= $row['jenis_pengawet']; ?></td>
                        </tr>
                        <?php }} endif; endforeach;?>
                    </tbody>
                </table>
            </div>
            <?php
            $array_ket = [];
            $ket = null;

            $r_keterangan = $keterangan->get_data($kode_pengantar, $kl['idkatlab']);
            foreach ($r_keterangan as $ket){
                $array_ket[] = $ket;
            }
            ?>
            <div style="page-break-before: auto;"></div>
            <div class="col-md-6 mb-1">
                <table style="border: 1px solid black; width:100%;">
                    <tbody>
                        <tr>
                            <td style="font-size: 9.5pt;">Keterangan : <?= $ket['keterangan'] ?? '' ?></td>
                        </tr>
                        <tr>
                            <td style="font-size: 9.5pt; line-height: 10pt;">Parameter yang tidak dapat di uji : <?= $ket['parameter_tidak_dapat_di_uji'] ?? '' ?></td>
                        </tr>
                        <tr>
                            <td style="font-size: 9.5pt; line-height: 10pt;">Sub kontrak : <?= $ket['sub_kontrak'] ?? '' ?></td>
                        </tr>
                        <tr>
                            <td style="font-size: 9.5pt; line-height: 10pt;">Kontrak diulang : <?= $ket['kontrak_diulang'] ?? '' ?></td>
                        </tr>
                        <tr>
                            <td style="font-size: 9.5pt; line-height: 10pt;">Permintaan khusus : <?= $ket['permintaan_khusus'] ?? '' ?></td>
                        </tr>
                        <tr>
                            <td style="font-size: 9.5pt; line-height: 10pt;">Kami tidak menjamin kualitas sampel yang tidak sesuai SOP/kriteria penerimaan sampel <?= $ket['permintaan_khusus'] ?? '' ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-6 mb-1" style="align-items: center; justify-content: center; vertical-align:top; margin-top: 1px;">
                <h5 class="text-center">
                    <?= strtoupper('Tidak Menerima Gratifikasi Dalam Bentuk Apapun') ?><br><br>
                    <label>Waktu Pemeriksaan Sampel 14 Hari Kerja</label>
                </h5>
            </div>
            <?php
            $array_ku = [];
            $ku = null;

            $kaji_ulang = $kaji_ulang->get_data($kode_pengantar, $kl['idkatlab']);
            foreach ($kaji_ulang as $ku){
                $array_ku[] = $ku;
            }
            ?>
            <div class="col-md-6 mb-1">
            <div class="text-center fw-bold" style="font-size: 9.5pt;"><?= strtoupper('kaji ulang permintaan, tender dan kontrak') ?></div>
            <table class="table-bordered" style="border: 1px solid black; width:100%;">
                <thead>
                    <tr class="text-center fw-bold">
                        <th class="fw-bold" style="font-size: 9.5pt;" width="5%">NO</th>
                        <th class="fw-bold" style="font-size: 9.5pt;">SUMBER DAYA</th>
                        <th class="fw-bold" style="font-size: 9.5pt;">KONDISI</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center" style="font-size: 9.5pt;">1</td>
                        <td style="font-size: 9.5pt;" width="40%;">Alat Utama</td>
                        <td style="font-size: 9.5pt;"><?= $ku['alat_utama'] ?? '' ?></td>
                    </tr>
                    <tr>
                        <td class="text-center" style="font-size: 9.5pt;">2</td>
                        <td style="font-size: 9.5pt;">Alat Pendukung</td>
                        <td style="font-size: 9.5pt;"><?= $ku['alat_pendukung'] ?? '' ?></td>
                    </tr>
                    <tr>
                        <td class="text-center" style="font-size: 9.5pt;">3</td>
                        <td style="font-size: 9.5pt;">Personil Laboratorium</td>
                        <td style="font-size: 9.5pt;"><?= $ku['personil_lab'] ?? '' ?></td>
                    </tr>
                    <tr>
                        <td class="text-center" style="font-size: 9.5pt;">4</td>
                        <td style="font-size: 9.5pt;">Metode Pemeriksaan</td>
                        <td style="font-size: 9.5pt;"><?= $ku['metode_pemeriksaan'] ?? '' ?></td>
                    </tr>
                    <tr>
                        <td class="text-center" style="font-size: 9.5pt;">5</td>
                        <td style="font-size: 9.5pt;">Uji Mutu (<i>Quality control</i>)</td>
                        <td style="font-size: 9.5pt;"><?= $ku['uji_mutu'] ?? '' ?></td>
                    </tr>
                    <tr>
                        <td class="text-center" style="font-size: 9.5pt;">6</td>
                        <td style="font-size: 9.5pt;">Reagensa dan Media</td>
                        <td style="font-size: 9.5pt;"><?= $ku['reagensa_dan_media'] ?? '' ?></td>
                    </tr>
                </tbody>
            </table>
            </div>
            <?php
            $array_pj = [];
            $pj = null;

            $r_penanggung_jawab = $penanggung_jawab->get_data($kode_pengantar, $kl['idkatlab']);
            foreach ($r_penanggung_jawab as $pj){
                $array_pj[] = $pj;
            }

                $tglTerimaSampel = $pj['tgl_terima_sampel'] ?? null;
                $tanggal = $penanggung_jawab->konversi_tanggal($tglTerimaSampel);
            ?>
            <div class="col-md-6 mb-1">
                <div class="text-center">Jakarta, <?= $tanggal != '01 Januari 1970' ? $tanggal.' '.date('H:i', strtotime($pj['jam_terima_sampel'])) : '' ?></div>
                <table class="table-bordered" style="border: 1px solid black; width:100%;">
                    <thead>
                        <tr class="text-center">
                            <th class="fw-bold" style="width: 50%; font-size: 9.5pt;">Penanggung jawab</th>
                            <th class="fw-bold p-1" style="font-size: 9.5pt;">Nama & Tanda tangan</th>
                            <th class="fw-bold p-1" style="font-size: 9.5pt;">No.Telepon</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr style="font-size: 9.5pt;">
                            <td class="p-1">Petugas sampling/pengambil/pembawa sampel</td>
                            <td class="p-1"><?= $pj['nama_pjb'] ?? '' ?></td>
                            <td class="p-1"><?= $pj['no_telp_pjb'] ?? '' ?></td>
                        </tr>
                        <tr style="font-size: 9.5pt;">
                            <td class="p-1">Penerima sampel</td>
                            <td class="p-1"><?= $pj['penerima_sampel'] ?? '' ?></td>
                            <td class="p-1"><?= $pj['no_telp_penerima'] ?? '' ?></td>
                        </tr>
                    </tbody>
                </table>
                    <?php
                        $qrdata = 'BBLKM_Jakarta/'.date('d-m-Y').'.'.$kode_pengantar.'/'.$no_reg; '<br>';
                        $qrcode = (new QRCode())->render($qrdata);
                    ?>
                    <img src="<?= esc($qrcode) ?>" alt="QR Code" class="qr-code">
                    <?php
                     $image = \Config\Services::image();

        // Path ke gambar utama
        // $sourcePath = WRITEPATH . 'assets/images/logo.webp';
        $sourcePath = WRITEPATH . 'public/assets/images/user-1.jpg';
        
        // Path font TrueType (ttf) wajib untuk teks
        $fontPath = ROOTPATH . 'public/assets/roboto.ttf';

        // $image->withFile('assets/images/logo_.webp')
        //       ->text('Hak Cipta 2026 ooo', [
        //           'color'          => '#ffffff',
        //           'opacity'        => 0.5,
        //           'withShadow'     => true,
        //           'shadowColor'    => '#000000',
        //           'hAlign'         => 'center',
        //           'vAlign'         => 'bottom',
        //           'fontSize'       => 20,
        //           'fontPath'       => $fontPath,
        //       ])->save(); 
              // Menimpa file asli
        ?>

            </div>
            <!-- /// -->
        </div>    
        <?php 
        endforeach; ?>
    </div>
</div>
    <script src="<?= base_url('assets/js/plugins/bootstrap.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/fontawesome.v6.3.0.all.js'); ?>"></script>
</body>
</html>