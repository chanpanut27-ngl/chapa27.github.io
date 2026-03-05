
<?php

use App\Models\KajiUlangKontrakPengantarModel;
use App\Models\KeteranganPengantarModel;
use App\Models\KondisiLingkunganPengantarModel;
use App\Models\PenanggungJawabPengantarModel;
use App\Models\SampelLingkunganModel;
use App\Models\SpesimenPenyakitModel;

$kl_sampel = new KondisiLingkunganPengantarModel(); 
$spesimen_penyakit = new SpesimenPenyakitModel();
$keterangan = new KeteranganPengantarModel();
$kondisi_lingkungan = new KondisiLingkunganPengantarModel();
$kaji_ulang = new KajiUlangKontrakPengantarModel();
$penanggung_jawab = new PenanggungJawabPengantarModel();

$array_result = [];
$dp = null;

foreach ($data_pelanggan as $dp) {
    $array_result[] = $dp;
}
?>
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
    <h5 class="text-center fw-bold"><b>PENERIMAAN SAMPEL</b></h5>
    <div class="row">
        <div class="col-md-12 mb-1">
            <table class="table-bordered" style="border: 1px solid black; width:100%;">
                <tr>
                    <td class="p-1 fw-bold" width="10%" style="font-size: 10pt;">Asal sampel</td>
                    <td class="p-1" width="50%" style="font-size: 10pt;"><?= $dp['instansi']; ?></td>
                    <td class="p-1 align-top" rowspan="3" style="font-size: 10pt;"><b>Kondisi lingkungan sampel : </b><?= $klss; ?></td>
                </tr>
                <tr>
                    <td class="p-1 fw-bold" style="font-size: 10pt;">Alamat</td>
                    <td class="p-1" style="font-size: 10pt;"><?= $dp['alamat'] ?></td>
                </tr>
                <tr>
                    <td class="p-1" colspan="2" style="font-size: 10pt;"><b>Catatan abnormalitas</b> : <?= $ca; ?></td>
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
                        <td colspan="10" class="p-1 fw-bold" style="font-size: 10pt;">
                            <?= ucfirst($lab['nama_lab']);?>
                        </td>
                    </tr>
                    <tr class="fw-bold text-center">
                        <th class="p-1 text-center" style="font-size: 10pt;">No</th>
                        <th class="p-1" style="font-size: 10pt;">Kode Sampel</th>
                        <th class="p-1 text-center" style="font-size: 10pt;">Jenis Sampel</th>
                        <th class="p-1" style="font-size: 10pt;"><?= $kl['idkatlab'] == '1' ? 'Lokasi pengambilan' : 'Identitas'; ?></th>
                        <th class="p-1" style="font-size: 10pt;">Tgl & Jam Pengambilan Sampel</th>
                        <th class="p-1" style="font-size: 10pt;">Peraturan/Baku Mutu</th>
                        <th class="p-1" style="font-size: 10pt;">Metode Pemeriksaan</th>
                        <th class="p-1" style="font-size: 10pt;">Volume/Berat</th>
                        <th class="p-1" style="font-size: 10pt;">Jenis Wadah</th>
                        <th class="p-1" style="font-size: 10pt; text-center">Jenis Pengawet</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $index = 1;
                    if ($kl['idkatlab'] == 1) {
                        $pemeriksaan = new SampelLingkunganModel();
                        $r = $pemeriksaan->get_data($kode_pengantar, $lab['id_lab']);
                        foreach ($r as $row) {
                        $tgl_jam_ambil_sampel = date('d/m/Y', strtotime($row['tgl_ambil_sampel'])).' '. date('H:i', strtotime($row['jam_ambil_sampel']));
                    ?>
                    <tr>
                        <td class="p-1 text-center" style="font-size: 9pt;"><?= $index++ ?></td>
                        <td class="p-1" style="font-size: 9pt;"><b><?= $row['kode_sampel']; ?></b></td>
                        <td class="p-1" style="font-size: 9pt;"><?= $row['jenis_sampel']; ?></td>
                        <td class="p-1" style="font-size: 9pt;"><?= $row['lokasi_pengambilan_sampel']; ?></td>
                        <td class="p-1 text-center" style="font-size: 9pt;"><?= @$tgl_jam_ambil_sampel;?></td>
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
                        <td class="p-1 text-center fw-bold" style="font-size: 9pt;"><?= $row['kode_sampel']; ?></td>
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
        <div class="col-md-7 mb-1">
            <table style="border: 1px solid black; width:100%;">
                <tbody>
                    <tr>
                        <td class="p-1" style="font-size: 10pt;">Keterangan : <?= $ket['keterangan'] ?? '' ?></td>
                    </tr>
                    <tr>
                        <td class="p-1" style="font-size: 10pt;">Parameter yang tidak dapat di uji : <?= $ket['parameter_tidak_dapat_di_uji'] ?? '' ?></td>
                    </tr>
                    <tr>
                        <td class="p-1" style="font-size: 10pt;">Sub kontrak : <?= $row['sub_kontrak'] ?? '' ?></td>
                    </tr>
                    <tr>
                        <td class="p-1" style="font-size: 10pt;">Kontrak diulang : <?= $row['kontrak_diulang'] ?? '' ?></td>
                    </tr>
                    <tr>
                        <td class="p-1" style="font-size: 10pt;">Permintaan khusus : <?= $row['permintaan_khusus'] ?? '' ?></td>
                    </tr>
                    <tr>
                        <td class="p-1" style="font-size: 10pt;">Kami tidak menjamin kualitas sampel yang tidak sesuai SOP/kriteria penerimaan sampel</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-5 mb-1" style="align-items: center;justify-content: center;display:flex;">
           <h5 class="text-center">
                <?= strtoupper('Tidak Menerima Gratifikasi Dalam Bentuk Apapun') ?><br><br>
                <label>Waktu Pemeriksaan Sampel 14 Hari Kerja</label>
            </h5>
        </div>
        <?php
        $array_ku = [];
        $ku = null;

        $kaji_ulang = $kaji_ulang->get_data($kode_pengantar, $kl['idkatlab']);
        foreach ($kaji_ulang as $ku) {
            $array_ku[] = $ku;
        }
        ?>
        <div class="col-md-7 mb-1">
        <div class="text-center fw-bold" style="font-size: 10pt;"><?= strtoupper('kaji ulang permintaan, tender dan kontrak') ?></div>
        <table class="table-bordered" style="border: 1px solid black; width:100%;">
            <thead>
                <tr class="text-center" style="font-size: 10pt;">
                    <th class="fw-bold" style="font-size: 10pt;" width="5%">NO</th>
                    <th><b>SUMBER DAYA</b></th>
                    <th><b>KONDISI</b></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-center" style="font-size: 10pt;">1</td>
                    <td class="p-1" style="font-size: 10pt;" width="40%;">Alat Utama</td>
                    <td class="p-1" style="font-size: 10pt;"><?= $ku['alat_utama'] ?? '' ?></td>
                </tr>
                <tr>
                    <td class="text-center" style="font-size: 10pt;">2</td>
                    <td class="p-1" style="font-size: 10pt;">Alat Pendukung</td>
                    <td class="p-1" style="font-size: 10pt;"><?= $ku['alat_pendukung'] ?? '' ?></td>
                </tr>
                <tr>
                    <td class="text-center" style="font-size: 10pt;">3</td>
                    <td class="p-1" style="font-size: 10pt;">Personil laboratorium</td>
                    <td class="p-1" style="font-size: 10pt;"><?= $ku['personil_lab'] ?? '' ?></td>
                </tr>
                <tr>
                    <td class="text-center" style="font-size: 10pt;">4</td>
                    <td class="p-1" style="font-size: 10pt;">Metode pemeriksaan</td>
                    <td class="p-1" style="font-size: 10pt;"><?= $ku['metode_pemeriksaan'] ?? '' ?></td>
                </tr>
                <tr>
                    <td class="text-center" style="font-size: 10pt;">5</td>
                    <td class="p-1" style="font-size: 10pt;">Uji mutu (<i>Quality control</i>)</td>
                    <td class="p-1" style="font-size: 10pt;"><?= $ku['uji_mutu'] ?? '' ?></td>
                </tr>
                <tr>
                    <td class="text-center" style="font-size: 10pt;">6</td>
                    <td class="p-1" style="font-size: 10pt;">Reagensa dan media</td>
                    <td class="p-1" style="font-size: 10pt;"><?= $ku['reagensa_dan_media'] ?? '' ?></td>
                </tr>
            </tbody>
        </table>
        </div>
        <?php 
        $array_pj = [];
        $pj = null;

        $r_penanggung_jawab = $penanggung_jawab->get_data($kode_pengantar, $kl['idkatlab']);
        foreach ($r_penanggung_jawab as $pj) {
           $array_pj[] = $pj;
        }
        
        $tglTerimaSampel = $pj['tgl_terima_sampel'] ?? null;
        $tanggal = $penanggung_jawab->konversi_tanggal($tglTerimaSampel);
        ?>
        <div class="col-md-5 mb-1">
            <div class="text-center">Jakarta, <?= $tanggal != '01 Januari 1970' ? $tanggal.' '.date('H:i', strtotime($pj['jam_terima_sampel'])) : '' ?></div>
            <table class="table-bordered" style="border: 2px solid black; width:100%;">
                <tbody>
                    <tr>
                        <th class="fw-bold p-1" style="font-size: 10pt; width:5%; text-align: center;">Penanggung jawab</th>
                        <th class="fw-bold p-1" style="font-size: 10pt; text-align: center;">Nama & Tanda tangan</th>
                        <th class="fw-bold p-1" style="font-size: 10pt;">No.Telepon</th>
                    </tr>
                    <tr>
                        <td class="p-1" style="font-size: 10pt;">Petugas sampling/pengambil/pembawa sampel</td>
                        <td class="p-1" style="font-size: 10pt;"><?= $pj['nama_pjb'] ?? '' ?></td>
                        <td class="p-1" style="font-size: 10pt;"><?= $pj['no_telp_pjb'] ?? '' ?></td>
                    </tr>
                    <tr>
                        <td class="p-1" style="font-size: 10pt;">Penerima sampel</td>
                        <td class="p-1" style="font-size: 10pt;"><?= $pj['penerima_sampel'] ?? '' ?></td>
                        <td class="p-1" style="font-size: 10pt;"><?= $pj['no_telp_penerima'] ?? '' ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>     
    <?php 
    endforeach; ?>
</div>

    