
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>" id="main-style-link" >
    <title><?= $kode_pengantar.'_Pengantar_LHU' ?></title>
    
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
<body class="p-1">
<?php
    use App\Models\KondisiLingkunganPengantarModel;
    use App\Models\SampelLingkunganModel;
    use App\Models\SpesimenPenyakitModel;

    $kl_sampel = new KondisiLingkunganPengantarModel(); 
    $spesimen_penyakit = new SpesimenPenyakitModel();

    foreach ($data_pelanggan as $dp) {
        $alamat = $dp['alamat'];
    }
?>
    <div class="d-flex justify-content-end align-items-center gap-1">
        <button type="button" class="btn btn-secondary btn-sm rounded btn-refresh-data">
            <span class="pc-micon"><i class="fa-solid fa-refresh"></i>
        </button>
        <button class="btn btn-info rounded btn-sm" onclick="window.print()" title="Cetak" style="text-align: right;">
            <span class="fa-solid fa-print"></span> Cetak
        </button>
    </div>
    <div class="card-body"> 
        <?php 
        foreach ($group_lab_tujuan as $kl) : 
            $r = $kl_sampel->where('kode_pengantar', $kode_pengantar)->findAll();
            foreach ($r as $x) {
                if ($kl['idkatlab'] == $x['id_kat_lab']) {
                    $klss = $x['kondisi_lingkungan_sekitar_sampel'];
                }
            }
            ?>
        <!-- HEADER --> <!-- start -->
        <?= $this->include('Component/_kop_surat'); ?>
        <!-- HEADER --> <!-- end -->

        <h4 style="text-align: center;"><b>PENERIMAAN SAMPEL</b><br>
        _______________________________________________________________________________________________
        </h4>
        <div class="row">
            <div class="col-md-12 mb-2">
                <table class="table-bordered" style="border: 1px solid black; width:100%;">
                    <tr>
                        <td width="10%"><b>Asal sampel</b></td>
                        <td width="50%" style="vertical-align: top;"><?= $dp['nama']; ?></td>
                        <td rowspan="3" style="vertical-align: top;"><b>Kondisi lingkungan sampel : </b><?= $klss; ?></td>
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
            <div class="col-md-6 mb-2">
                <table style="border: 2px solid black; width:100%;">
                    <tbody>
                        <tr>
                            <td>Keterangan :</td>
                        </tr>
                        <tr>
                            <td>Parameter yang tidak dapat di uji :</td>
                        </tr>
                        <tr>
                            <td>Sub kontrak :</td>
                        </tr>
                        <tr>
                            <td>Kontrak diulang :</td>
                        </tr>
                        <tr>
                            <td>Permintaan khusus :</td>
                        </tr>
                        <tr>
                            <td>
                                <b>Kami tidak menjamin kualitas sampel yang tidak sesuai SOP/kriteria penerimaan sampel</b>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-6 mb-2"  style="border:2px solid black; align-items: center;justify-content: center;display:flex;">
                <h3 class="text-center">
                    <b>Tidak Menerima Gratifikasi Dalam Bentuk Apapun</b>
                </h3>
            </div>
        </div>    
        <div style="page-break-before:always;"></div>

        <?php 
        endforeach; ?>
    </div>
</div>
    <script src="<?= base_url('assets/js/plugins/bootstrap.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/fontawesome.v6.3.0.all.js'); ?>"></script>
    <script src="<?= base_url('assets/js/custom.js'); ?>"></script>
</body>
</html>