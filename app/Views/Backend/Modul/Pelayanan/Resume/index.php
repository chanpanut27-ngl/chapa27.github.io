<?= $this->extend('Backend/Modul/Pelayanan/Lhu/index'); ?>

<?= $this->section('content_menu'); ?>
<?php

    use App\Models\PenanggungJawabLhuModel;
    use App\Models\SampelLingkunganModel;
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
<div class="card">
    <div class="card-header p-2">
        <div class="d-flex justify-content-end align-items-center gap-1">
            <button class="btn btn-info rounded btn-sm" onclick="openWin();" title="Cetak">
                <span class="pc-micon"><span class="fa-solid fa-print"></span></span>
            </button>
        </div>
    </div>
    <div class="card-body">
        <h4 style="text-align: center;"><b>PENERIMAAN SAMPEL</b></h4><hr style="border: 1px solid;">
        <div class="row">
            <div class="col-md-12 mb-2">
                <table class="table-bordered" style="border: 1px solid black; width:100%;">
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
                    <?php endforeach; ?>
                 </table>
            </div>
            <div class="col-md-12 mb-2">
                <table class="table-bordered" style="border: 1px solid black; width:100%;">
                    <tr>
                        <td style="border: 1px solid black;">
                            Keterangan : <?= @$ket_lhu; ?><br>
                            Parameter yang tidak dapat di uji : <?= @$paramater_tidak_dapat_di_uji; ?><br>
                            Sub kontrak : <?= @$sub_kontrak; ?><br>
                            Kontrak diulang : <?= @$kontrak_diulang; ?><br>
                            Permintaan khusus : <?= @$permintaan_khusus; ?><br>
                            Kami tidak menjamin kualitas sampel yang tidak sesuai SOP/kriteria penerimaan sampel
                        </td>
                        <td>
                            <div class="text-center ml-2 bg-danger">
                                <p><h5 class="text-white"><b>&nbsp;&nbsp;&nbsp;Tidak Menerima Gratifikasi Dalam Bentuk Apapun</b></h5></p>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="col-md-6">
                <table class="table-bordered" style="border: 1px solid black; width:100%;">
                    <tr>
                        <td style="text-align: center;"><b>SUMBER DAYA</b></td>
                        <td style="text-align: center;"><b>KONDISI</b></td>
                    </tr>
                    <tr>
                        <td><b>Alat utama</b></td>
                        <td>: <?= @$alat_utama; ?></td>
                    </tr>
                    <tr>
                        <td><b>Alat pendukung</b></td>
                        <td>: <?= @$alat_dukung; ?> </td>
                    </tr>
                    <tr>
                        <td><b>Personil laboratorium</b></td>
                        <td>: <?= @$personil_lab; ?></td>
                    </tr>
                    <tr>
                        <td><b>Metode pemeriksaan</b></td>
                        <td>: <?= @$metode_pemeriksaan; ?></td>
                    </tr>
                    <tr>
                        <td><b>Uji mutu (<i>quality control</i>)</b></td>
                        <td>: <?= @$uji_mutu; ?></td>
                    </tr>
                    <tr>
                        <td><b>Reagensa dan media</b></td>
                        <td>: <?= @$reagensa_dan_media; ?></td>
                    </tr> 
                </table>
            </div>
            <div class="col-md-6">
                <table class="table-bordered" style="border: 1px solid black; width:100%;">
                    <tr>
                        <th colspan="3" class="text-center">
                            Jakarta, <?= $konversi_tanggal->konversi_tanggal(@$tgl_terima_sampel); ?>
                        </th>
                    </tr>
                    <tr>
                        <th>Penanggung jawab</th>
                        <th style="text-align: center;">Nama & Tanda tangan</th>
                        <th style="text-align: center;">No.Telepon</th>
                    </tr>
                    <tr>
                        <td style="width: 25%;"><b>Petugas sampling/pengambil/pembawa sampel</b></td>
                        <td>: <?= @$nama_pjb; ?></td>
                        <td>: <?= @$no_telp_pjb; ?></td>
                     </tr>
                     <tr>
                        <td><b>Penerima sampel</b></td>
                        <td>: <?= @$penerima_sampel; ?></td>
                        <td>: <?= @$no_telp_ps; ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>

<?= $this->section('bottomAssets'); ?>
<script>
    function openWin() {
        var prtContent = document.getElementById("#kodePengantar");
        var WinPrint = window.open('<?= base_url('pelayanan/resume/cetak-resume/'.strtoupper($kode_pengantar)) ?>', '', 'left=0,top=0,width=1000,height=900,toolbar=0,scrollbars=0,status=0');
        WinPrint.document.write(prtContent.innerHTML);
        WinPrint.document.close();
        WinPrint.focus();
        WinPrint.print();
        WinPrint.close();
    }
</script>
<?= $this->endSection(); ?>