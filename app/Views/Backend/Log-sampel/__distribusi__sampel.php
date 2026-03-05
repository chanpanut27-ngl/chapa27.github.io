<?= $this->extend('Backend/Log-sampel/index'); ?>

<?= $this->section('content_log'); ?>

<div class="table-responsive">
    <table class="table table-hover" id="example">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama pelanggan</th>
                <th>Instansi</th>
                <th>Jenis sampel & Lab. tujuan</th>
                <th>Tanggal & Nama Pj</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            use App\Models\PermintaanPemeriksaanModel;
            $model = new PermintaanPemeriksaanModel();

            $no=1;
            foreach ($items as $row) :
            $id_pelanggan = $row['id_pelanggan'];
            $rest = $model->detail_lab($id_pelanggan);
            ?>
            <tr>
                <td><?= $no++ ?></td>
                <td>
                    <div class="row">
                        <div class="col-auto">
                            <img src="<?= base_url('assets/images/user-1.jpg') ?>" alt="user-image" class="wid-40 rounded-circle">
                        </div>
                        <div class="col">
                            <h6 class="mb-0"><?= $row['kode_pelanggan'] ?></h6>
                            <h6 class="mb-0"><?= $row['nama_pengirim'] ?></h6>
                            <p class="text-muted f-12 mb-0"><?= $row['no_telp_pengirim'] ?></p>
                        </div>
                    </div>
                </td>
                <td><?= $row['instansi'] ?></td>
                <td>
                    <table class="table-bordered" style="border: 1px solid black; width:100%;">
                        <thead>
                            <?php
                            $menu_lab = $this->modelLabTujuan->get_data($kode_pengantar);
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

</div>
<?= $this->endSection(); ?>


