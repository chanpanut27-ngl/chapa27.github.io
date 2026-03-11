
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
    <title><?= strtoupper($kode_pengantar).'.'.$no_reg ?></title>
</head>
<body>
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
    <h4 style="text-align:center;">PENERIMAAN SAMPEL</h4>
    <table border="1" cellpadding="2">
        <tbody>
            <tr>
                <td width="15%" style="font-size: 9pt; padding-left: 1px;"><b>Asal sampel</b></td>
                <td width="45%" style="font-size: 9pt; padding-left: 1px;"><?= $dp['instansi'] ?></td>
                <td width="40%" rowspan="3" style="font-size: 9pt; padding-left: 1px;"><b>Kondisi lingkungan sampel : </b> 
                    <?= $klss; ?>
                </td>
            </tr>
            <tr>
                <td style="font-size: 9pt; padding-left: 1px;"><b>Alamat</b></td>
                <td style="font-size: 9pt; padding-left: 1px;"><?= $dp['alamat'] ?></td>
            </tr>
            <tr>
                <td colspan="3" style="font-size: 10pt; padding-left: 1px;"><b>Catatan abnormalitas : </b>
                </td>
            </tr>
        </tbody>
    </table>
    <table border="1" cellpadding="2">
        <tbody>
            <?php
            foreach ($menu_lab as $lab) :
                if ($kl['idkatlab'] == $lab['id_kat_lab']) :
            ?>
            <tr>
                <td colspan="10" style="font-size: 9pt; font-weight:bold;"><?= ucfirst($lab['nama_lab']);?></td>
            </tr>
            <tr style="text-align: center;">
                <td width="3%" style="font-size: 9pt; text-align:center; font-weight:bold;">No</td>
                <td width="6%" style="font-size: 9pt; text-align:center; font-weight:bold;">Kode sampel</td>
                <td width="22%" style="font-size: 9pt; text-align:center; font-weight:bold;">Jenis sampel</td>
                <td width="10%" style="font-size: 9pt; text-align:center; font-weight:bold;"><?= $kl['idkatlab'] == '1' ? 'Lokasi pengambilan' : 'Identitas'; ?></td>
                <td width="10%" style="font-size: 9pt; text-align:center; font-weight:bold;">Tgl & Jam Pengambilan Sampel</td>
                <td width="13%" style="font-size: 9pt; text-align:center; font-weight:bold;">Peraturan/Baku Mutu</td>
                <td width="12%" style="font-size: 9pt; text-align:center; font-weight:bold;">Metode Pemeriksaan</td>
                <td width="8%" style="font-size: 9pt; text-align:center; font-weight:bold;">Volume/Berat</td>
                <td width="8%" style="font-size: 9pt; text-align:center; font-weight:bold;">Jenis Wadah</td>
                <td width="8%" style="font-size: 9pt; text-align:center; font-weight:bold;">Jenis Pengawet</td>
            </tr>
        <?php
            $index = 1;
            if ($kl['idkatlab'] == 1) {
                $pemeriksaan = new SampelLingkunganModel();
                $r_pemeriksaan = $pemeriksaan->get_data($kode_pengantar, $lab['id_lab']);
                foreach ($r_pemeriksaan as $row) {
                $tgl_jam_ambil_sampel = date('d/m/Y', strtotime($row['tgl_ambil_sampel'])).' '. date('H:i', strtotime($row['jam_ambil_sampel']));
            ?>
            <tr>
                <td width="3%" style="font-size: 9pt; text-align:center;"><?= $index++ ?></td>
                <td width="6%" style="font-size: 9pt; text-align:center;"><?= $row['kode_sampel']; ?></td>
                <td width="22%" style="font-size: 9pt;"><?= $row['jenis_sampel']; ?><?= $row['keterangan'] != '' ? ' , '.$row['keterangan'] : $row['keterangan']; ?></td>
                <td width="10%" style="font-size: 9pt;"><?= $row['lokasi_pengambilan_sampel']; ?></td>
                <td width="10%" style="font-size: 9pt; text-align:center;"><?= @$tgl_jam_ambil_sampel;?></td>
                <td width="13%" class="p-1" style="font-size: 9pt;"><?= $row['peraturan']; ?></td>
                <td width="12%" class="p-1 text-center" style="font-size: 9pt;"><?= $row['metode_pemeriksaan']; ?></td>
                <td width="8%" style="font-size: 9pt; text-align:center;"><?= $row['volume_atau_berat']; ?></td>
                <td width="8%" style="font-size: 9pt; text-align:center;"><?= $row['jenis_wadah']; ?></td>
                <td width="8%" style="font-size: 9pt; text-align:center;"><?= $row['jenis_pengawet']; ?></td>
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
    <?php
    $array_ket = [];
    $ket = null;

    $r_keterangan = $keterangan->get_data($kode_pengantar, $kl['idkatlab']);
    foreach ($r_keterangan as $ket){
        $array_ket[] = $ket;
    }
    ?>
    <table border="0">
        <tbody>
            <tr>
                <td border="1" width="51%">
                     <table style="width: 100%;">
                        <tbody border="1">
                            <tr>
                                <td style="font-size: 9pt;">Keterangan : <?= $ket['keterangan'] ?? '' ?></td>
                            </tr>
                            <tr>
                                <td style="font-size: 9pt;">Parameter yang tidak dapat di uji : <?= $ket['parameter_tidak_dapat_di_uji'] ?? '' ?></td>
                            </tr>
                            <tr>
                                <td style="font-size: 9pt;">Sub kontrak : <?= $ket['sub_kontrak'] ?? '' ?></td>
                            </tr>
                            <tr>
                                <td style="font-size: 9pt;">Kontrak diulang : <?= $ket['kontrak_diulang'] ?? '' ?></td>
                            </tr>
                            <tr>
                                <td style="font-size: 9pt;">Permintaan khusus : <?= $ket['permintaan_khusus'] ?? '' ?></td>
                            </tr>
                            <tr>
                                <td style="font-size: 9pt;">Kami tidak menjamin kualitas sampel yang tidak sesuai SOP/kriteria penerimaan sampel <?= $ket['permintaan_khusus'] ?? '' ?></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <td width="50%">
                     <h5 style="text-align:center;"><?= strtoupper('Tidak Menerima Gratifikasi Dalam Bentuk Apapun') ?></h5>
                    <h5 style="text-align:center;">Waktu Pemeriksaan Sampel 14 Hari Kerja</h5>
                </td>
            </tr>
        </tbody>
    </table>
    <?php
            $array_ku = [];
            $ku = null;

            $kaji_ulang = $kaji_ulang->get_data($kode_pengantar, $kl['idkatlab']);
            foreach ($kaji_ulang as $ku){
                $array_ku[] = $ku;
            }

            $array_pj = [];
            $pj = null;

            $r_penanggung_jawab = $penanggung_jawab->get_data($kode_pengantar, $kl['idkatlab']);
            foreach ($r_penanggung_jawab as $pj){
                $array_pj[] = $pj;
            }

                $tglTerimaSampel = $pj['tgl_terima_sampel'] ?? null;
                $tanggal = $penanggung_jawab->konversi_tanggal($tglTerimaSampel);
            ?>
            <table width="100%" border="1">
                <tbody>
                     <tr style="text-align: center; font-weight:bold; font-size:9pt;">
                        <td width="3%">NO</td>
                        <td width="20%">SUMBER DAYA</td>
                        <td width="28%">KONDISI</td>
                        <td rowspan="7" width="0.2%"></td>
                        <td width="24%">Penanggung jawab</td>
                        <td width="15%">Nama & Tanda tangan</td>
                        <td width="10%">No.Telp/Hp</td>
                    </tr>
                    <tr>
                        <td width="3%" style="font-size: 9pt; text-align:center;">1</td>
                        <td width="20%" style="font-size: 9pt;"> Alat Utama</td>
                        <td style="font-size: 9pt;"> <?= $ku['alat_utama'] ?? '' ?></td>
                        <td style="font-size: 9pt;"> Petugas sampling/pengambil/pembawa sampel</td>
                        <td style="font-size: 9pt;"> <?= $pj['nama_pjb'] ?? '' ?></td>
                        <td style="font-size: 9pt;"> <?= $pj['no_telp_pjb'] ?? '' ?></td>
                    </tr>
                    <tr>
                        <td style="font-size: 9pt; text-align:center;">2</td>
                        <td style="font-size: 9pt;"> Alat Pendukung</td>
                        <td style="font-size: 9pt;"> <?= $ku['alat_pendukung'] ?? '' ?></td>
                        <td style="font-size: 9pt;"> Penerima sampel</td>
                        <td style="font-size: 9pt;"> <?= $pj['penerima_sampel'] ?? '' ?></td>
                        <td style="font-size: 9pt;"> <?= $pj['no_telp_penerima'] ?? '' ?></td>
                    </tr>
                    <tr>
                        <td style="font-size: 9pt; text-align:center;">3</td>
                        <td style="font-size: 9pt;"> Personil Laboratorium</td>
                        <td style="font-size: 9pt;"> <?= $ku['personil_lab'] ?? '' ?></td>
                    </tr>
                    <tr>
                        <td style="font-size: 9pt; text-align:center;">4</td>
                        <td style="font-size: 9pt;"> Metode Pemeriksaan</td>
                        <td style="font-size: 9pt;"> <?= $ku['metode_pemeriksaan'] ?? '' ?></td>
                    </tr>
                    <tr>
                        <td style="font-size: 9pt; text-align:center;">5</td>
                        <td style="font-size: 9pt;"> Uji Mutu (<i>Quality control</i>)</td>
                        <td style="font-size: 9pt;"> <?= $ku['uji_mutu'] ?? '' ?></td>
                    </tr>
                    <tr>
                        <td style="font-size: 9pt; text-align:center;">6</td>
                        <td style="font-size: 9.5pt;"> Reagensa dan Media</td>
                        <td style="font-size: 9.5pt;"> <?= $ku['reagensa_dan_media'] ?? '' ?></td>
                    </tr>
                </tbody>
            </table>
    <?php endforeach;?>
</body>
</html>