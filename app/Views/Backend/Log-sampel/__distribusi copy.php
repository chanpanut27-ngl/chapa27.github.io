<?= $this->extend('Backend/Log-sampel/index'); ?>

<?= $this->section('content_log'); ?>

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

use App\Models\LaboratoriumTujuanModel;
use App\Models\PengantarLabModel;
use App\Models\PermintaanPemeriksaanModel;
use App\Models\SampelLingkunganModel;
use App\Models\SpesimenPenyakitModel;

            $model = new PermintaanPemeriksaanModel();

            $no=1;
            foreach ($items as $row) :
            $id_pelanggan = $row['id_pelanggan'];
            $rest = $model->detail_lab($id_pelanggan);
            $kode_pelanggan = $row['kode_pelanggan'];

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
                        $m_pengantar_lab = new PengantarLabModel();
                            $rest_plab = $m_pengantar_lab->where('id_pelanggan', $id_pelanggan)->first();
                            $kode_pengantar = $rest_plab['kode_pengantar'];
                            $m_lab_tujuan = new LaboratoriumTujuanModel();

                             $menu_lab = $m_lab_tujuan->get_data($kode_pengantar);
                             $group_lab_tujuan = $m_lab_tujuan->get_data_by_group_kat_lab($kode_pengantar);
                             foreach ($group_lab_tujuan as $kl) : 
                            
                        ?>

                        <table class="table-bordered" style="border: 1px solid black; width:100%;">
                            <thead>
                                <?php
                                foreach ($menu_lab as $lab) :
                                    if ($kl['idkatlab'] == $lab['id_kat_lab']) :
                                ?>
                                <tr>
                                    <td colspan="10" class="p-1 fw-bold" style="font-size: 9pt;">
                                        <?= ucfirst($lab['nama_lab']);?>
                                    </td>
                                </tr>
                                <tr class="fw-bold text-center">
                                    <th class="p-1 text-center" style="font-size: 9pt;">No</th>
                                    <th class="p-1" style="font-size: 9pt;">Kode Sampel</th>
                                    <th class="p-1 text-center" style="font-size: 9pt;">Jenis Sampel</th>
                                    <th class="p-1" style="font-size: 9pt;"><?= $kl['idkatlab'] == '1' ? 'Lokasi pengambilan' : 'Identitas'; ?></th>
                                    <th class="p-1" style="font-size: 9pt; text-align:center;">Tgl & Jam Pengambilan Sampel</th>
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
                                    <td class="p-1" style="font-size: 9pt; text-align:center;"><?= $sl['kode_sampel']; ?></td>
                                    <td class="p-1" style="font-size: 9pt;"><?= $sl['jenis_sampel']; ?></td>
                                    <td class="p-1" style="font-size: 9pt;"><?= $sl['lokasi_pengambilan_sampel']; ?></td>
                                    <td class="p-1 text-center" style="font-size: 9pt;"><?= @$tgl_jam_ambil_sampel;?></td>
                                </tr>
                                <?php  }
                                } else {
                                    $pemeriksaan = new SpesimenPenyakitModel();
                                    $r = $pemeriksaan->get_data($kode_pengantar, $lab['id_lab']);
                                    foreach ($r as $sp) {
                                    $tgl_jam_ambil_sampel = date('d/m/Y', strtotime($sp['tgl_periksa_sampel'])).' '. date('H:i', strtotime($sp['jam_periksa_sampel']));
                                ?>
                                <tr>
                                    <td class="p-1" style="font-size: 9pt;"><?= $index++ ?></td>
                                    <td class="p-1 text-center fw-bold" style="font-size: 9pt;"><?= $sp['kode_sampel']; ?></td>
                                    <td class="p-1" style="font-size: 9pt;"><?= $sp['jenis_sampel']; ?></td>
                                    <td class="p-1" style="font-size: 9pt;"><?= $sp['identitas_sampel']; ?></td>
                                    <td class="p-1 text-center" style="font-size: 9pt;"><?= @$tgl_jam_ambil_sampel;?></td>
                                    <td class="p-1" style="font-size: 9pt;"><?= $sp['peraturan']; ?></td>
                                    <td class="p-1" style="font-size: 9pt;"><?= $sp['metode_pemeriksaan']; ?></td>
                                    <td class="p-1 text-center" style="font-size: 9pt;"><?= $sp['volume_atau_berat']; ?></td>
                                    <td class="p-1" style="font-size: 9pt;"><?= $sp['jenis_wadah']; ?></td>
                                    <td class="p-1" style="font-size: 9pt;"><?= $sp['jenis_pengawet']; ?></td>
                                </tr>
                            <?php }} endif; endforeach; endforeach;?>
                        </tbody>
                    </table>
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
                    <ul class="list-inline me-auto mb-0">
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


