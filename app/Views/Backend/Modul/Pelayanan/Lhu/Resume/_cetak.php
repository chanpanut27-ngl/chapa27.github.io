
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>" id="main-style-link" >
    
    <title><?= $kode_pengantar ?>_Pengantar_LHU</title>
    
    <style media="print">
        /* Sembunyikan elemen dengan ID ci-logo dan kelas no-print saat mencetak */
        #toolbarContainer, .no-print, button {
            display: none !important;
        }
    </style>
    <script>
        // window.print();
    </script>
</head>
<body>
    <div class="d-flex justify-content-end align-items-center mr-2">
        <button class="btn btn-info rounded btn-sm" onclick="window.print()" title="Cetak" style="text-align: right;">
            <span class="fa-solid fa-print"></span> Cetak
        </button>
    </div>
    <?php
    use App\Models\SampelLingkunganModel;
    use App\Models\PenanggungJawabLhuModel;
    $sampel_lingkungan = new SampelLingkunganModel();
    $konversi_tanggal = new PenanggungJawabLhuModel();

    foreach ($data_pelanggan as $dp) {
        $nama = $dp['nama'];
        $alamat = $dp['alamat'];
    }

    // lingkungan kondisi sekitar sampel 
    foreach ($kondisi_lingkungan as $ra) {
        $kondisi_ling_sampel = $ra['kondisi_lingkungan_sekitar_sampel'];
        $catatan_abnoramalitas = $ra['catatan_abnormalitas'];
    }

    // keterangan 
    foreach ($keterangan as $ket) {
        $ket_lhu = $ket['keterangan'];
        $paramater_tidak_dapat_di_uji = $ket['paramater_tidak_dapat_di_uji'];
        $sub_kontrak = $ket['sub_kontrak'];
        $kontrak_diulang = $ket['kontrak_diulang'];
        $permintaan_khusus = $ket['permintaan_khusus'];
    }
    
    // kaji ulang
    foreach ($kaji_ulang as $kl) {
        $alat_utama = $kl['alat_utama'];
        $alat_dukung = $kl['alat_pendukung'];
        $personil_lab = $kl['personil_lab'];
        $metode_pemeriksaan = $kl['metode_pemeriksaan'];
        $uji_mutu = $kl['uji_mutu'];
        $reagensa_dan_media = $kl['reagensa_dan_media'];
    }   

    //penanggung jawab
    foreach ($penanggung_jawab as $pj) {
        $nama_pjb = $pj['nama_pjb'];
        $no_telp_pjb = $pj['no_telp_pjb'];
        $penerima_sampel = $pj['penerima_sampel'];
        $no_telp_ps = $pj['no_telp_penerima'];
        $tgl_terima_sampel = $pj['tgl_terima_sampel'];
        $jam_terima_sampel = $pj['jam_terima_sampel'];
    }
?>
    <div class="card-body">
        <!-- HEADER --> <!-- start -->
       <?= $this->include('Backend/Modul/Pelayanan/Lhu/Resume/_header'); ?>
        <!-- HEADER --> <!-- end -->

        <h5 style="text-align: center; font-weight:bold;">PENERIMAAN SAMPEL</h5>
        <div class="row">
            <div class="col-md-12 mb-2">
                <table class="table-bordered" style="border: 1px solid black; font-size:11px; width:100%;">
                    <tr>
                        <td width="10%"><b>Asal sampel</b></td>
                        <td width="50%" style="vertical-align: top;"><?= $dp['nama']; ?></td>
                        <td rowspan="3" style="vertical-align: top;"><b>Kondisi lingkungan sampel : </b><?= @$kondisi_ling_sampel; ?></td>
                    </tr>
                    <tr>
                        <td><b>Alamat</b></td>
                        <td style="vertical-align: top;"><?= $dp['alamat'] ?></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="vertical-align: top;"><b>Catatan abnormalitas : </b> <?= @$catatan_abnoramalitas; ?></td>
                    </tr>
                </table>
            </div>
            <div class="col-md-12 mb-2">
                <table class="table-bordered" style="border: 1px solid black; width:100%;">
                    <?php
                    // lab tujuan 
                    foreach ($menu_lab as $lab) :
                    ?>
                        <tr>
                            <td colspan="10" style="font-weight: bold; font-family:Arial;">
                                <?= strtoupper($lab['nama_lab']);?>
                            </td>
                        </tr>
                        <tr style="font-weight:bold; text-align:center; font-size:11px;">
                            <td>No.</td>
                            <td width="10%">Kode Sampel</td>
                            <td>Jenis Sampel</td>
                            <td>Lokasi Pengambilan Sampel</td>
                            <td>Tgl & Jam Pengambilan sampel</td>
                            <td>Peraturan/Baku Mutu</td>
                            <td>Metode Pemeriksaan</td>
                            <td>Volume/Berat</td>
                            <td>Jenis Wadah</td>
                            <td>jenis Pengawet</td>
                        </tr>
                        <?php
                        $index = 1;
                        $r = $sampel_lingkungan->get_data($kode_pengantar, $lab['id_lab']);
                        foreach ($r as $row) {
                        $tgl_jam_ambil_sampel = date('d/m/Y', strtotime($row['tgl_ambil_sampel'])).' '. date('H:i', strtotime($row['jam_ambil_sampel']));
                        ?>
                        <tr style="font-family:arial; font-size:10px;">
                            <td style="text-align: center;"><?= $index++ ?></td>
                            <td style="text-align: center; font-weight:bold;"><?= $row['kode_sampel']; ?></td>
                            <td>&nbsp;<?= $row['jenis_sampel']; ?></td>
                            <td>&nbsp;<?= $row['lokasi_pengambilan_sampel']; ?></td>
                            <td style="text-align: center;"><?= @$tgl_jam_ambil_sampel;?></td>
                            <td>&nbsp;<?= $row['peraturan']; ?></td>
                            <td><?= $row['metode_pemeriksaan']; ?></td>
                            <td style="text-align: center;"><?= $row['volume_atau_berat']; ?></td>
                            <td><?= $row['jenis_wadah']; ?></td>
                            <td><?= $row['jenis_pengawet']; ?></td>
                        </tr>
                        <?php  }?>
                    <?php endforeach; ?>
                </table>
            </div>
                <div style="page-break-before:always;"></div>
                <!-- HEADER --> <!-- start -->
                <?= $this->include('Backend/Modul/Pelayanan/Lhu/Resume/_header'); ?>
                <!-- HEADER --> <!-- end -->
                <div class="col-md-12 mb-2">
                    <table class="table-bordered" style="border: 1px solid black; width:100%;">
                        <tr>
                            <td style="border: 1px solid black;">
                                Keterangan : <?= @$ket_lhu; ?><br>
                                Parameter yang tidak dapat di uji : <?= @$paramater_tidak_dapat_di_uji; ?><br>
                                Sub Kontrak : <?= @$sub_kontrak; ?><br>
                                Kontrak Diulang : <?= @$kontrak_diulang; ?><br>
                                Permintaan Khusus : <?= @$permintaan_khusus; ?><br>
                                <i>Kami tidak menjamin kualitas sampel yang tidak sesuai SOP/kriteria penerimaan sampel</i>
                            </td>
                            <td>
                                <div class="text-center ml-2">
                                    <p><h5><b>&nbsp;&nbsp;&nbsp;Tidak Menerima Gratifikasi Dalam Bentuk Apapun</b></h5></p><br>
                                    <label for="">Waktu Pemeriksaan Sampai ___ Hari Kerja</label>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <table class="table-bordered" style="border: 1px solid black; width:100%;">
                        <tr>
                            <td style="text-align: center; font-size:11px;"><b>SUMBER DAYA</b></td>
                            <td style="text-align: center; font-size:11px;"><b>KONDISI</b></td>
                        </tr>
                        <tr>
                            <td style="font-size: 11px;"><b>Alat Utama</b></td>
                            <td style="font-size: 10px;">&nbsp;<?= @$alat_utama; ?></td>
                        </tr>
                        <tr>
                            <td style="font-size: 11px;"><b>Alat Pendukung</b></td>
                            <td style="font-size: 10px;">&nbsp;<?= @$alat_dukung; ?> </td>
                        </tr>
                        <tr>
                            <td style="font-size: 11px;"><b>Personel Laboratorium</b></td>
                            <td style="font-size: 10px;">&nbsp;<?= @$personil_lab; ?></td>
                        </tr>
                        <tr>
                            <td style="font-size: 11px;"><b>Metode Pemeriksaan</b></td>
                            <td style="font-size: 10px;">&nbsp;<?= @$metode_pemeriksaan; ?></td>
                        </tr>
                        <tr>
                            <td style="font-size: 11px;"><b>Uji Mutu (<i>quality control</i>)</b></td>
                            <td style="font-size: 10px;">&nbsp;<?= @$uji_mutu; ?></td>
                        </tr>
                        <tr>
                            <td style="font-size: 11px;"><b>Reagensa & Media</b></td>
                            <td style="font-size: 10px;">&nbsp;<?= @$reagensa_dan_media; ?></td>
                        </tr> 
                    </table>
                </div>
                <div class="col-md-6">
                    <table class="table-bordered" style="border: 1px solid black; width:100%;">
                        <tr>
                            <th colspan="3" class="text-center">
                               Jakarta, <?= $konversi_tanggal->konversi_tanggal(@$tgl_terima_sampel).', '. date('H:i', strtotime(@$jam_terima_sampel)); ?>
                            </th>
                        </tr>
                        <tr>
                            <th>Penanggung jawab</th>
                            <th style="text-align: center;">Nama & Tanda Tangan</th>
                            <th style="text-align: center;">No.Telepon</th>
                        </tr>
                        <tr>
                            <td style="width: 25%; font-size:11px;"><b>Petugas Sampling/Pengambil/Pembawa Sampel</b></td>
                            <td style="font-size: 10px;"><?= @$nama_pjb; ?></td>
                            <td style="font-size: 10px;"><?= @$no_telp_pjb; ?></td>
                        </tr>
                        <tr>
                            <td style="font-size: 11px;"><b>Penerima Sampel</b></td>
                            <td style="font-size: 10px;"><?= @$penerima_sampel; ?></td>
                            <td style="font-size: 10px;"><?= @$no_telp_ps; ?></td>
                        </tr>
                    </table>
                </div>
        </div>
    </div>
    <script src="<?= base_url('assets/js/plugins/bootstrap.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/fontawesome.v6.3.0.all.js'); ?>"></script>
</body>
</html>