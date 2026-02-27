
<?php

use App\Models\PengantarLabModel;
use App\Models\PermintaanPelangganModel;

$pengantar = new PengantarLabModel();
$permintaan = new PermintaanPelangganModel();

$model = $pengantar->where('kode_pengantar', $kode_pengantar)->first();
$kode_pengantar = $model['kode_pengantar'];
$id_pelanggan = $model['id_pelanggan'];
$data_permintaan = $permintaan->where('id', $id_pelanggan)->first();
$no_reg = $data_permintaan['no_reg'];
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
        @page {
            size: landscape;
            /* margin: top right bottom left */
        }
    </style>
    <style>
        .qr-code {
        width: 100px;
        height: 100px;
        }
    </style>
    <script>
        // window.print();
        
    </script>
</head>
<body>
<?php

use App\Libraries\CustomLib;
use App\Models\KajiUlangKontrakPengantarModel;
use App\Models\KeteranganPengantarModel;
use App\Models\KondisiLingkunganPengantarModel;
use App\Models\PenanggungJawabPengantarModel;
use App\Models\SampelLingkunganModel;
use App\Models\SpesimenPenyakitModel;
use chillerlan\QRCode\QRCode;

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
        <div class="row">
            <div class="col-md-9">
                <?php
                $custom_lib = new CustomLib();
                echo $custom_lib->logo_kopsurat();
                ?>
            </div>
            <div class="col-md-3">
                <?php echo $custom_lib->ket_kopsurat($nomor_form);?>
            </div>
        </div>
        <!-- HEADER --> <!-- end -->

        <h4 style="text-align: center;"><b>PENERIMAAN SAMPEL</b><br>
        _______________________________________________________________________________________________
        </h4>
        <div class="row">
            <div class="col-md-12 mb-2">
                <table class="table-bordered" style="border: 1px solid black; width:100%;">
                    <tr>
                        <td class="p-1" width="10%"><b>Asal sampel</b></td>
                        <td class="p-1" width="50%" style="vertical-align: top;"><?= $dp['instansi']; ?></td>
                        <td class="p-1" rowspan="3" class="p-1" style="vertical-align: top;"><b>Kondisi lingkungan sampel : </b><?= $klss; ?></td>
                    </tr>
                    <tr>
                        <td class="p-1"><b>Alamat</b></td>
                        <td class="p-1" style="vertical-align: top;"><?= $dp['alamat'] ?></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="p-1" style="vertical-align: top;"><b>Catatan abnormalitas : </b> <?= $ca; ?></td>
                    </tr>
                </table>
            </div>
            <div class="col-md-12 mb-2">
                <table class="table-bordered" style="border: 1px solid black; width:100%;">
                    <thead>
                        <?php
                        foreach ($menu_lab as $lab) :
                            if ($kl['idkatlab'] == $lab['id_kat_lab']) :
                        ?>
                        <tr>
                            <td colspan="10" style="font-weight: bold; font-family:Arial;">
                                <?= ucfirst($lab['nama_lab']);?>
                            </td>
                        </tr>
                        <tr style="font-weight:bold; text-align:center; font-size:12px;">
                            <th class="p-1">No.</th>
                            <th width="10%">Kode sampel</th>
                            <th>Jenis sampel</th>
                            <th><?= $kl['idkatlab'] == '1' ? 'Lokasi pengambilan sampel' : 'Identitas sampel'; ?></th>
                            <th>Tgl dan jam pengambilan sampel</th>
                            <th>Peraturan baku mutu</th>
                            <th>Metode pemeriksaan</th>
                            <th class="p-1">Volume/berat</th>
                            <th>Jenis wadah</th>
                            <th>jenis pengawet</th>
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
                            <td class="p-1"><?= $index++ ?></td>
                            <td class="p-1" style="text-align: center;"><b><?= $row['kode_sampel']; ?></b></td>
                            <td class="p-1"><?= $row['jenis_sampel']; ?><?= $row['keterangan'] != '' ? ' , '.$row['keterangan'] : $row['keterangan']; ?></td>
                            <td class="p-1"><?= $row['lokasi_pengambilan_sampel']; ?></td>
                            <td class="p-1" style="text-align: center;"><?= @$tgl_jam_ambil_sampel;?></td>
                            <td class="p-1"><?= $row['peraturan']; ?></td>
                            <td class="p-1"><?= $row['metode_pemeriksaan']; ?></td>
                            <td class="p-1" style="text-align: center;"><?= $row['volume_atau_berat']; ?></td>
                            <td class="p-1"><?= $row['jenis_wadah']; ?></td>
                            <td class="p-1"><?= $row['jenis_pengawet']; ?></td>
                        </tr>
                        <?php  }
                        } else {
                            $pemeriksaan = new SpesimenPenyakitModel();
                            $r = $pemeriksaan->get_data($kode_pengantar, $lab['id_lab']);
                            foreach ($r as $row) {
                            $tgl_jam_ambil_sampel = date('d/m/Y', strtotime($row['tgl_periksa_sampel'])).' '. date('H:i', strtotime($row['jam_periksa_sampel']));
                        ?>
                        <tr>
                            <td class="p-1"><?= $index++ ?></td>
                            <td class="p-1" style="text-align: center;"><b><?= $row['kode_sampel']; ?></b></td>
                            <td class="p-1"><?= $row['jenis_sampel']; ?></td>
                            <td class="p-1"><?= $row['identitas_sampel']; ?></td>
                            <td class="p-1" style="text-align: center;"><?= @$tgl_jam_ambil_sampel;?></td>
                            <td class="p-1"><?= $row['peraturan']; ?></td>
                            <td class="p-1"><?= $row['metode_pemeriksaan']; ?></td>
                            <td class="p-1" style="text-align: center;"><?= $row['volume_atau_berat']; ?></td>
                            <td class="p-1"><?= $row['jenis_wadah']; ?></td>
                            <td class="p-1"><?= $row['jenis_pengawet']; ?></td>
                        </tr>
                        <?php }} endif; endforeach;?>
                    </tbody>
                </table>
            </div>
            <div style="page-break-after:always;"></div>
            <?php
            $array_ket = [];
            $ket = null;

            $r_keterangan = $keterangan->get_data($kode_pengantar, $kl['idkatlab']);
            foreach ($r_keterangan as $ket){
                $array_ket[] = $ket;
            }
            ?>
            <div class="col-md-6 mb-2">
                <table style="border: 2px solid black; width:100%;">
                    <tbody>
                        <tr>
                            <td class="p-1">Keterangan : <?= $ket['keterangan'] ?? '' ?></td>
                        </tr>
                        <tr>
                            <td class="p-1">Parameter yang tidak dapat di uji : <?= $ket['parameter_tidak_dapat_di_uji'] ?? '' ?></td>
                        </tr>
                        <tr>
                            <td class="p-1">Sub kontrak : <?= $ket['sub_kontrak'] ?? '' ?></td>
                        </tr>
                        <tr>
                            <td class="p-1">Kontrak diulang : <?= $ket['kontrak_diulang'] ?? '' ?></td>
                        </tr>
                        <tr>
                            <td class="p-1">Permintaan khusus : <?= $ket['permintaan_khusus'] ?? '' ?></td>
                        </tr>
                        <tr>
                            <td class="p-1">
                                <label for="">
                                    <b><i>Kami tidak menjamin kualitas sampel yang tidak sesuai SOP/kriteria penerimaan sampel</i></b>
                                </label>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-6 mb-2" style="align-items: center;justify-content: center;display:flex;">
                <h4 class="text-center">
                    Tidak Menerima Gratifikasi Dalam Bentuk Apapun
                </h4>
            </div>
            <?php
            $array_ku = [];
            $ku = null;

            $r_kaji_ulang = $kaji_ulang->get_data($kode_pengantar, $kl['idkatlab']);
            foreach ($r_kaji_ulang as $row){
                $array_ku[] = $ku;
            }
            ?>
            <div class="col-md-6 mb-2">
            <table class="table-bordered" style="border: 2px solid black; width:100%;">
                <thead>
                    <tr class="text-center">
                        <th><b>SUMBER DAYA</b></th>
                        <th><b>KONDISI</b></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="p-1" width="40%;">Alat Utama</td>
                        <td class="p-1">: <?= $ku['alat_utama'] ?? '' ?></td>
                    </tr>
                    <tr>
                        <td class="p-1">Alat Pendukung</td>
                        <td class="p-1">: <?= $ku['alat_pendukung'] ?? '' ?></td>
                    </tr>
                    <tr>
                        <td class="p-1">Personil laboratorium</td>
                        <td class="p-1">: <?= $ku['personil_lab'] ?? '' ?></td>
                    </tr>
                    <tr>
                        <td class="p-1">Metode pemeriksaan</td>
                        <td class="p-1">: <?= $ku['metode_pemeriksaan'] ?? '' ?></td>
                    </tr>
                    <tr>
                        <td class="p-1">Uji mutu (<i>Quality control</i>)</td>
                        <td class="p-1">: <?= $ku['uji_mutu'] ?? '' ?></td>
                    </tr>
                    <tr>
                        <td class="p-1">Reagensa dan media</td>
                        <td class="p-1">: <?= $ku['reagensa_dan_media'] ?? '' ?></td>
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
            ?>
            <div class="col-md-6 mb-2">
                <table class="table-bordered" style="border: 2px solid black; width:100%;">
                    <tbody>
                        <tr class="text-center">
                            <?php
                            $tanggal = $penanggung_jawab->konversi_tanggal(@$pj['tgl_terima_sampel']);
                            ?>
                            <th colspan="3" style="font-weight: initial;">Jakarta, <?= $tanggal == '01 Januari 1970' ? '' : '' ?></th>
                        </tr>
                        <tr>
                            <th class="fw-bold p-1" style="width: 5%;">Penanggung jawab</th>
                            <th class="fw-bold p-1">Nama & Tanda tangan</th>
                            <th class="fw-bold p-1">No.Telepon</th>
                        </tr>
                        <tr>
                            <td class="p-1">Petugas sampling/pengambil/pembawa sampel</td>
                            <td class="p-1">: <?= $pj['nama_pjb'] ?? '' ?></td>
                            <td class="p-1">: <?= $pj['no_telp_pjb'] ?? '' ?></td>
                        </tr>
                        <tr>
                            <td class="p-1">Penerima sampel</td>
                            <td class="p-1">: <?= $pj['penerima_sampel'] ?? '' ?></td>
                            <td class="p-1">: <?= $pj['no_telp_penerima'] ?? '' ?></td>
                        </tr>
                    </tbody>
                </table>
                 <?php
                    $data = 'BBLKM_Jakarta/'.$kode_pengantar.$id_pelanggan.$no_reg;
                    $qrcode = (new QRCode())->render($data);
                    ?>
                    <img src="<?= esc($qrcode) ?>" alt="QR Code" class="qr-code">
            </div>
            <div style="page-break-after:always;"></div>
        </div>    
        <?php 
        endforeach; ?>
    </div>
</div>
    <script src="<?= base_url('assets/js/plugins/bootstrap.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/fontawesome.v6.3.0.all.js'); ?>"></script>
</body>
</html>