<div class="text-center">
    <?php

    use App\Models\SampelLingkunganModel;
    $sampel_lingkungan = new SampelLingkunganModel();

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

    @$tgl_terima_sampel != null ? 'Jakarta, '. date('d F Y', strtotime(@$tgl_terima_sampel)) : '';

    ?>
    
</div>
<p><h3 style="text-align: center;"><b>PENERIMAAN SAMPEL</b></h3></p><hr style="border: 1px solid;">
<table width="100%">
    <thead>
        <tbody>
            <tr>
                <td width="20%" style="border: 1px solid black;"><b>Asal sampel</b></td>
                <td style="vertical-align: top; border: 1px solid black;"><?= $dp['nama']; ?></td>
                <td width="20%" rowspan="3" style="vertical-align: top; border: 1px solid black;"><b>Kondisi lingkungan sampel</b></td>
                <td style="vertical-align: top;" rowspan="3" style="border: 1px solid black;"><?= @$kondisi_ling_sampel; ?></td>
            </tr>
            <tr>
                <td style="border: 1px solid black;"><b>Alamat</b></td>
                <td style="vertical-align: top; border: 1px solid black;"><?= $dp['alamat'] ?></td>
            </tr>
            <tr>
                <td colspan="2" style="vertical-align: top; border: 1px solid black;"><b>Catatan abnormalitas : </b> <?= @$catatan_abnoramalitas; ?></td>
            </tr>
            <tr>
                <table width="100%">
                    <tbody>
                         <?php
                    // lab tujuan 
                    foreach ($menu_lab as $lab) {
                    ?>
                    <tr>
                            <td colspan="10" style="font-family:Arial;">
                                 <?= strtoupper($lab['nama_lab']);?>
                            </td>
                        </tr>
                        <tr>
                            <td style="font-weight:bold; text-align:center; border: 1px solid black;">No.</td>
                            <td style="font-weight:bold; text-align:center; border: 1px solid black;">Kode sampel</td>
                            <td style="font-weight:bold; text-align:center; border: 1px solid black;">Jenis sampel</td>
                            <td style="font-weight:bold; text-align:center; border: 1px solid black;">Lokasi pengambilan sampel</td>
                            <td style="font-weight:bold; text-align:center; border: 1px solid black;">Tgl dan jam pengambilan sampel</td>
                            <td style="font-weight:bold; text-align:center; border: 1px solid black;">Peraturan baku mutu</td>
                            <td style="font-weight:bold; text-align:center; border: 1px solid black;">Metode pemeriksaan</td>
                            <td style="font-weight:bold; text-align:center; border: 1px solid black;">Volume/berat</td>
                            <td style="font-weight:bold; text-align:center; border: 1px solid black;">Jenis wadah</td>
                            <td style="font-weight:bold; text-align:center; border: 1px solid black;">jenis pengawet</td>
                        </tr>
                         <?php
                         $index = 1;
                         $r = $sampel_lingkungan->get_data($kode_pengantar, $lab['id_lab']);
                        foreach ($r as $row) {
                        $tgl_jam_ambil_sampel = date('d/m/Y', strtotime($row['tgl_ambil_sampel'])).' '. date('H:i', strtotime($row['jam_ambil_sampel']));
                        ?>
                        <tr>
                            <td style="text-align:center; border: 1px solid black;"><?= $index++ ?></td>
                            <td style="text-align:center; border: 1px solid black;"><?= $row['kode_sampel']; ?></td>
                            <td style="border: 1px solid black;"><?= explode(', ', $row['jenis_sampel'])[0]; ?></td>
                            <td style="border: 1px solid black;"><?= $row['lokasi_pengambilan_sampel']; ?></td>
                            <td style="text-align: center; border: 1px solid black;"><?= @$tgl_jam_ambil_sampel;?></td>
                            <td style="border: 1px solid black;"><?= explode(', ', $row['jenis_sampel'])[1]; ?></td>
                            <td style="text-align:center; border: 1px solid black;"><?= $row['metode_pemeriksaan']; ?></td>
                            <td style="text-align: center; border: 1px solid black;"><?= $row['volume_atau_berat']; ?></td>
                            <td style="text-align:center; border: 1px solid black;"><?= $row['jenis_wadah']; ?></td>
                            <td style="text-align:center; border: 1px solid black;"><?= $row['jenis_pengawet']; ?></td>
                        </tr>
                        <?php  }?>
                <?php } ?>
                       
                                <tr>
                                    <table width="100%">
                                        <td>
                                            <tbody>
                                            <tr>
                                                <td style="border: 1px solid black;">
                                                    Keterangan : <br>
                                                    Parameter yang tidak dapat di uji : <?= @$paramater_tidak_dapat_di_uji; ?><br>
                                                    Sub kontrak : <?= @$sub_kontrak; ?><br>
                                                    Kontrak diulang : <?= @$kontrak_diulang; ?><br>
                                                    Permintaan khusus : <?= @$permintaan_khusus; ?><br>
                                                    Kami tidak menjamin kualitas sampel yang tidak sesuai SOP/kriteria penerimaan sampel
                                                </td>
                                                <td>
                                                    <div class="text-center ml-2 bg-danger">
                                                        <p><h3 class="text-white"><b>&nbsp;&nbsp;&nbsp;Tidak Menerima Gratifikasi Dalam Bentuk Apapun</b></h3></p>
                                                    </div>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </td>
                                        <td>
                                            <br>
                                            <p><b><center>KAJI ULANG PERMINTAAN</center></b></p>
                                            <table width="100%" style="border: 1px solid;">
                                            <tr>
                                                <td style="text-align: center; border: 1px solid black;"><b>SUMBER DAYA</b></td>
                                                <td style="text-align: center; border: 1px solid black;"><b>KONDISI</b></td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid black;">Alat utama</td>
                                                <td style="border: 1px solid black;">: <?= @$alat_utama; ?></td>
                                            </tr>
                                            <tr>
                                                    <td style="border: 1px solid black;"><b>Alat pendukung</b></td>
                                                    <td style="border: 1px solid black;">: <?= @$alat_dukung; ?> </td>
                                                </tr>
                                                <tr>
                                                    <td style="border: 1px solid black;"><b>Personil laboratorium</b></td>
                                                    <td style="border: 1px solid black;">: <?= @$personil_lab; ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="border: 1px solid black;"><b>Metode pemeriksaan</b></td>
                                                    <td style="border: 1px solid black;">: <?= @$metode_pemeriksaan; ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="border: 1px solid black;"><b>Uji mutu (Quality control)</b></td>
                                                    <td style="border: 1px solid black;">: <?= @$uji_mutu; ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="border: 1px solid black;"><b>Reagensa dan media</b></td>
                                                    <td style="border: 1px solid black;">: <?= @$reagensa_dan_media; ?></td>
                                                </tr>
                                        </table>
                                        </td>
                                        <td>
                                            <table width="100%">
                                                <tbody style="font-family: arial;">
                                                    <tr>
                                                        <td style="border: 1px solid;">Penanggung jawab</td>
                                                        <td style="border: 1px solid;" style="text-align: center;">Nama & Tanda tangan</td>
                                                        <td style="border: 1px solid;" style="text-align: center;">No.Telepon</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 25%; border: 1px solid;"><b>Petugas sampling/pengambil/pembawa sampel</b></td>
                                                        <td style="border: 1px solid;">: <?= @$nama_pjb; ?></td>
                                                        <td style="border: 1px solid;">: <?= @$no_telp_pjb; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="border: 1px solid;"><b>Penerima sampel</b></td>
                                                        <td style="border: 1px solid;">: <?= @$penerima_sampel; ?></td>
                                                        <td style="border: 1px solid;">: <?= @$no_telp_ps; ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </table>
                                </tr>
                    </tbody>
                </table>
            </tr>
        </tbody>
    </thead>
</table>