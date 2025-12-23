<?= $this->extend('Backend/Modul/Pelayanan/Lhu/index'); ?>
<?= $this->section('content_menu'); ?>
<?php

use App\Controllers\KondisiLingkunganSampel;
use App\Models\KondisiLingkunganSampelModel;
use App\Models\PenanggungJawabSampelModel;
use App\Models\SampelLingkunganModel;
use App\Models\SpesimenPenyakitModel;
 
$sampel_lingkungan = new SampelLingkunganModel();
$spesimen_penyakit = new SpesimenPenyakitModel();
$kl_sampel = new KondisiLingkunganSampelModel();


    foreach ($data_pelanggan as $dp) {
        $alamat = $dp['alamat'];
    }

    // var_dump($group_lab_tujuan);

?>
<div class="card">
    <div class="card-header p-2">
        <div class="d-flex justify-content-end align-items-center gap-1">
            <button class="btn btn-info rounded btn-sm" onclick="openWin();" title="Cetak">
                <span class="pc-micon"><span class="fa-solid fa-print"></span></span>
            </button>
        </div>
    </div>
    <div class="card-body">
        <?php 
            foreach ($group_lab_tujuan as $row) : 
               switch ($row['idkatlab']) {
                //lingkungan 
                case '1':
                    $items = $sampel_lingkungan->where('kode_pengantar', $kode_pengantar)->findAll();
                    $kondisi_lingkungan = $kl_sampel->where('kode_pengantar', $kode_pengantar)->first();
                    var_dump($kondisi_lingkungan);
                    ?>
                     <h4 style="text-align: center;"><b>PENERIMAAN SAMPEL</b></h4><hr style="border: 1px solid;">
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <table class="table-bordered" style="border: 1px solid black; width:100%;">
                                    <tr>
                                        <td width="10%"><b>Asal sampel</b></td>
                                        <td width="50%" style="vertical-align: top;"><?= $dp['nama']; ?></td>
                                        <td rowspan="3" style="vertical-align: top;"><b>Kondisi lingkungan sampel : </b><?= $kondisi_lingkungan['kondisi_lingkungan_sekitar_sampel']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Alamat</b></td>
                                        <td style="vertical-align: top;"><?= $dp['alamat'] ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" style="vertical-align: top;"><b>Catatan abnormalitas : </b> <?= '[empty]'; ?></td>
                                    </tr>
                                </table>
                            </div>
                             <div class="col-md-12 mb-2">
                                <table class="table-bordered" style="border: 1px solid black; width:100%;">
                                        <?php
                                    // lab tujuan 
                                    foreach ($menu_lab as $lab) :
                                        if ($lab['id_kat_lab'] == 1) :
                                    ?>
                                        <tr>
                                            <td colspan="10" style="font-weight: bold; font-family:Arial;">
                                                <?= strtoupper($lab['nama_lab']);?>
                                            </td>
                                        </tr>
                                        <tr style="font-weight:bold; text-align:center; font-size:12px;">
                                            <td>No.</td>
                                            <td width="10%">Kode sampel</td>
                                            <td>Jenis sampel</td>
                                            <td>Lokasi pengambilan sampel</td>
                                            <td>Tgl dan jam pengambilan sampel</td>
                                            <td>Peraturan baku mutu</td>
                                            <td>Metode pemeriksaan</td>
                                            <td>Volume/berat</td>
                                            <td>Jenis wadah</td>
                                            <td>jenis pengawet</td>
                                        </tr>
                                        <?php
                                        $index = 1;
                                        $r = $sampel_lingkungan->get_data($kode_pengantar, $lab['id_lab']);
                                        foreach ($r as $row) {
                                        $tgl_jam_ambil_sampel = date('d/m/Y', strtotime($row['tgl_ambil_sampel'])).' '. date('H:i', strtotime($row['jam_ambil_sampel']));
                                        ?>
                                        <tr>
                                            <td><?= $index++ ?></td>
                                            <td><b><?= $row['kode_sampel']; ?></b></td>
                                            <td><?= $row['jenis_sampel']; ?></td>
                                            <td><?= $row['lokasi_pengambilan_sampel']; ?></td>
                                            <td style="text-align: center;"><?= @$tgl_jam_ambil_sampel;?></td>
                                            <td><?= $row['peraturan']; ?></td>
                                            <td><?= $row['metode_pemeriksaan']; ?></td>
                                            <td style="text-align: center;"><?= $row['volume_atau_berat']; ?></td>
                                            <td><?= $row['jenis_wadah']; ?></td>
                                            <td><?= $row['jenis_pengawet']; ?></td>
                                        </tr>
                                        <?php  }?>
                                    <?php endif; endforeach; ?>
                                </table>
                            </div>
                        </div>
                    <?php
                    break;
                case '2':
                    ?>
                    <h4 style="text-align: center;"><b>PENERIMAAN SAMPEL</b></h4><hr style="border: 1px solid;">
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <table class="table-bordered" style="border: 1px solid black; width:100%;">
                                    <tr>
                                        <td width="10%"><b>Asal sampel</b></td>
                                        <td width="50%" style="vertical-align: top;"><?= $dp['nama']; ?></td>
                                        <td rowspan="3" style="vertical-align: top;"><b>Kondisi lingkungan sampel : </b><?= '[empty]'; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Alamat</b></td>
                                        <td style="vertical-align: top;"><?= $dp['alamat'] ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" style="vertical-align: top;"><b>Catatan abnormalitas : </b> <?= '[empty]'; ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    <?php
                    break;
                
                default:
                    # code...
                    break;
               }
        ?>
        <?php endforeach;?>
    </div>
</div>
<?= $this->endSection(); ?>