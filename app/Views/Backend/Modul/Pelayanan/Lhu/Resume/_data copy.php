
<?= $this->extend('Backend/Modul/Pelayanan/Lhu/index'); ?>

<?= $this->section('content_menu'); ?>
<?php 
foreach ($group_lab_tujuan as $kl) : 
    if ($kl['idkatlab']) :
    ?>
    <h4 style="text-align: center;"><b>PENERIMAAN SAMPEL</b></h4><hr style="border: 1px solid;">
    <div class="row">
        <div class="col-md-12 mb-2">
            <table class="table-bordered" style="border: 1px solid black; width:100%;">
                <tr>
                    <td width="10%"><b>Asal sampel</b></td>
                    <td width="50%" style="vertical-align: top;"><?= $dp['nama']; ?></td>
                    <td rowspan="3" style="vertical-align: top;"><b>Kondisi lingkungan sampel : </b><?= @$kondisi_lingkungan['kondisi_lingkungan_sekitar_sampel']; ?></td>
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
                        <th>No.</th>
                        <th width="10%">Kode sampel</th>
                        <th>Jenis sampel</th>
                        <th><?= $kl['idkatlab'] == '1' ? 'Lokasi pengambilan sampel' : 'Identitas sampel'; ?></th>
                        <th>Tgl dan jam pengambilan sampel</th>
                        <th>Peraturan baku mutu</th>
                        <th>Metode pemeriksaan</th>
                        <th>Volume/berat</th>
                        <th>Jenis wadah</th>
                        <th>jenis pengawet</th>
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
                        <td><?= $index++ ?></td>
                        <td style="text-align: center;"><b><?= $row['kode_sampel']; ?></b></td>
                        <td><?= $row['jenis_sampel']; ?></td>
                        <td><?= $row['lokasi_pengambilan_sampel']; ?></td>
                        <td style="text-align: center;"><?= @$tgl_jam_ambil_sampel;?></td>
                        <td><?= $row['peraturan']; ?></td>
                        <td><?= $row['metode_pemeriksaan']; ?></td>
                        <td style="text-align: center;"><?= $row['volume_atau_berat']; ?></td>
                        <td><?= $row['jenis_wadah']; ?></td>
                        <td><?= $row['jenis_pengawet']; ?></td>
                    </tr>
                    <?php  }
                    } else {
                        $pemeriksaan = new SpesimenPenyakitModel();
                        $r = $pemeriksaan->get_data($kode_pengantar, $lab['id_lab']);
                        foreach ($r as $row) {
                        $tgl_jam_ambil_sampel = date('d/m/Y', strtotime($row['tgl_periksa_sampel'])).' '. date('H:i', strtotime($row['jam_periksa_sampel']));
                    ?>
                    <tr>
                        <td><?= $index++ ?></td>
                        <td style="text-align: center;"><b><?= $row['kode_sampel']; ?></b></td>
                        <td><?= $row['jenis_sampel']; ?></td>
                        <td><?= $row['identitas_sampel']; ?></td>
                        <td style="text-align: center;"><?= @$tgl_jam_ambil_sampel;?></td>
                        <td><?= $row['peraturan']; ?></td>
                        <td><?= $row['metode_pemeriksaan']; ?></td>
                        <td style="text-align: center;"><?= $row['volume_atau_berat']; ?></td>
                        <td><?= $row['jenis_wadah']; ?></td>
                        <td><?= $row['jenis_pengawet']; ?></td>
                    </tr>
                <?php }} endif; endforeach;?>
                </tbody>
            </table>
        </div>
    </div>     
<?php 
endif;
endforeach; ?>
<?= $this->endSection(); ?>
