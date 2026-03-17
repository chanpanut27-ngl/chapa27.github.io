<?= $this->extend('Backend/Log-sampel/index'); ?>

<?= $this->section('content_log'); ?>
<?php

use App\Models\LaboratoriumTujuanModel;
use App\Models\PengantarLabModel;
use App\Models\SampelLingkunganModel;
use App\Models\SpesimenPenyakitModel;

$labtujuan = new LaboratoriumTujuanModel();
$pengantar = new PengantarLabModel();

?>
<div class="table-responsive">
    <table class="table table-hover" id="example">
        <thead>
            <tr>
                <th>#</th>
                <th>Pelanggan</th>
                <th>Instansi</th>
                <th>Jenis sampel & Lab. tujuan</th>
                <th>Tgl/Jam & Nama Pj</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no=1;
            foreach ($items as $row) :
                $id_pelanggan = $row['id_pelanggan'];
                $view_pengantar = $pengantar->where('id_pelanggan', $id_pelanggan)->first();
                $kode_pengantar = $view_pengantar['kode_pengantar'] ?? '';
                $menu_lab = $labtujuan->get_data($kode_pengantar);
            ?>
            <tr>
                <td><?= $no++ ?></td>
                <td>
                    <div class="row">
                        <div class="col-auto">
                            <img src="<?= base_url('assets/images/user-1.jpg') ?>" alt="user-image" class="wid-25 rounded-circle">
                        </div>
                        <div class="col">
                            <h6 class="mb-0"><?= $row['nama_pengirim'] ?></h6>
                            <p class="text-muted f-11 mb-0">No. Reg : <?= $row['no_reg'] ?></p>
                            <p class="text-muted f-11 mb-0">Kode Pelanggan : <?= $row['kode_pelanggan'] ?></p>
                        </div>
                    </div>
                </td>
                <td><?= $row['instansi'] ?></td>
                <td>
                    <?php
                      $view_labtujuan = $labtujuan->get_data_by_group_kat_lab($kode_pengantar);
                      if (!$view_labtujuan) {
                         echo '<div class="alert alert-danger" role="alert">
                                        <i class="ti ti-info-circle"></i> Pengantar lab belum di buat
                                    </div>';
                      } else {
                     
                      foreach ($view_labtujuan as $kl) {
                    ?>
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
                            <tr class="fw-bold text-center" style="font-size: 9pt;">
                                <th>No</th>
                                <th>Kode Sampel</th>
                                <th>Jenis Sampel</th>
                                <th>Peraturan/Baku Mutu</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $index = 1;
                            if ($kl['idkatlab'] == 1) {
                                $pemeriksaan = new SampelLingkunganModel();
                                $r = $pemeriksaan->get_data($kode_pengantar, $lab['id_lab']);
                                foreach ($r as $sl) {
                                $tgl_jam_ambil_sampel = date('d/m/Y', strtotime($sl['tgl_ambil_sampel'])).' '. date('H:i', strtotime($sl['jam_ambil_sampel']));
                            ?>
                            <tr>
                                <td class="p-1 text-center" style="font-size: 9pt;"><?= $index++ ?></td>
                                <td style="font-size: 9pt;"><b><?= $sl['kode_sampel']; ?></b></td>
                                <td style="font-size: 9pt;"><?= $sl['jenis_sampel']; ?></td>
                                <td style="font-size: 9pt;"><?= $sl['peraturan']; ?></td>
                            </tr>
                            <?php  }
                            } else {
                                $pemeriksaan = new SpesimenPenyakitModel();
                                $r = $pemeriksaan->get_data($kode_pengantar, $lab['id_lab']);
                                foreach ($r as $row) {
                                $tgl_jam_ambil_sampel = date('d/m/Y', strtotime($row['tgl_periksa_sampel'])).' '. date('H:i', strtotime($row['jam_periksa_sampel']));
                            ?>
                            <tr>
                                <td style="font-size: 9pt;"><?= $index++ ?></td>
                                <td class="text-center fw-bold" style="font-size: 9pt;"><?= $row['kode_sampel']; ?></td>
                                <td style="font-size: 9pt;"><?= $row['jenis_sampel']; ?></td>
                                <td class="text-center" style="font-size: 9pt;"><?= @$tgl_jam_ambil_sampel;?></td>
                                <td style="font-size: 9pt;"><?= $row['peraturan']; ?></td>
                            </tr>
                        <?php }} endif; endforeach;?>
                        </tbody>
                    </table>
                    <?php } } ?>
                </td>
                <td>
                    <div class="row">
                        <div class="col">
                            <h6 class="mb-0"><?= date('d/m/Y', strtotime($row['created_at'])) ?></h6>
                            <p class="text-muted f-12 mb-0"><?= $row['created_by'] ?></p>
                        </div>
                    </div>
                </td>
                <td class="text-center">
                    <ul class="list-inline <?= !$view_labtujuan ? 'd-none' : '' ?> me-auto mb-0">
                        <li class="list-inline-item align-bottom">
                            <a href="#" class="avtar avtar-xs btn-link-success btn-pc-default btn-sts-<?= $row['id_pelanggan']; ?>" onclick="statusLayanan(<?= $row['id_pelanggan']; ?>)" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            <i class="ti ti-pencil f-18"></i>
                            </a>
                        </li>
                    </ul>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>
<div class="view-modal" style="display: none;"></div>

<?= $this->endSection(); ?>


