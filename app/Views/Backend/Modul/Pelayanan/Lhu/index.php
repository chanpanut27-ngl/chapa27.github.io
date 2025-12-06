<?= $this->extend('Backend/Layout/_main'); ?>
<?= $this->section('content'); ?>
<div class="pc-container">
    <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Modul Pelayanan Pemeriksaan</a></li>
                            <li class="breadcrumb-item"><a href="#"><?= $title; ?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row p-0">
            <!-- [ sample-page ] start -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 style="font-family: calibri;"><span class="pc-micon"><span class="fa-solid fa-user"></span> Data Pelanggan</h4>
                    </div>
                    <div class="card-body p-2">
                        <?php foreach ($items as $row) :  
                            $kode_pengantar = $row['kode_pengantar'];
                        ?>
                        <div class="row">
                            <div class="col-md-2">
                                <h5 class="card-title">Kode pengantar</h5>
                            </div>
                            <div class="col-md-4">
                                <h5 class="card-title">: <?= $row['kode_pengantar']; ?></h5>
                            </div>
                            <div class="col-md-2">
                                <h5 class="card-title">Alamat</h5>
                            </div>
                             <div class="col-md-4">
                                <h5 class="card-title">: <?= $row['alamat']; ?></h5>
                            </div>
                            <div class="col-md-2">
                                <h5 class="card-title">Pelanggan</h5>
                            </div>
                             <div class="col-md-4">
                                <h5 class="card-title">: <?= $row['nama']; ?></h5>
                            </div>
                            <div class="col-md-2">
                                <h5 class="card-title">No.Telepon</h5>
                            </div>
                            <div class="col-md-4">
                                <h5 class="card-title">: <?= $row['no_telp']; ?></h5>
                            </div>
                        </div>
                        <?php endforeach;?>
                    </div>
                    <div class="card-body p-2">
                         <?php 
                        $bg = '';
                        if (!$menu_lab) {
                            ?>
                            <div class="alert alert-danger fw-bold" role="alert">
                                Laboratorim tujuan belum di pilih !
                                <a href="<?= base_url('pelayanan-pemeriksaan/pengantar-lhu'); ?>" class="href"> [Kembali]</a>
                            </div>
                            <?php
                        }else{
                        ?>
                            <ul class="nav nav-tabs">
                                <?php
                                    foreach ($menu_lab as $m) :
                                        if (@$id_lab == $m['id_lab']) {
                                            $active = 'active bg-success text-light';
                                            $bg = 'style="background-color:#effeff; color:#497e89; font-weight:bold;"';
                                        }else{
                                            $active = '';
                                            $bg = '';
                                        }
                                        ?>
                                        <li class="nav-item">
                                            <a class="nav-link navtabs <?= $active ?>" <?= $bg ?> aria-current="page" href="<?= base_url('pelayanan-pemeriksaan/proses-lhu/list-menu/'.strtolower($kode_pengantar).'/'.$m['id_lab']) ?>"><?= $m['nama_lab'] ?></a>
                                        </li>
                                        <?php
                                    endforeach;
                                    ?>
                                    <li class="nav-item">
                                        <a class="nav-link navtabs <?= @$id_lab == 'keterangan' ? 'active bg-success text-light' : ''; ?>" <?= @$id_lab == 'keterangan' ? $bg : ''; ?> aria-current="page" href="<?= base_url('pelayanan-pemeriksaan/proses-lhu/list-menu/'.strtolower($kode_pengantar).'/keterangan') ?>">Keterangan</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link navtabs <?= @$id_lab == 'kondisi_lingkungan_sekitar_sampel' ? 'active bg-success text-light' : ''; ?>" <?= @$id_lab == 'kondisi_lingkungan_sekitar_sampel' ? $bg : ''; ?> aria-current="page" href="<?= base_url('pelayanan-pemeriksaan/proses-lhu/list-menu/'.strtolower($kode_pengantar).'/kondisi_lingkungan_sekitar_sampel') ?>">Kondisi lingkungan sekitar sampel</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link navtabs <?= @$id_lab == 'kaji_ulang_permintaan_kontrak' ? 'active bg-success text-light' : ''; ?>" <?= @$id_lab == 'kaji_ulang_permintaan_kontrak' ? $bg : ''; ?> aria-current="page" href="<?= base_url('pelayanan-pemeriksaan/proses-lhu/list-menu/'.strtolower($kode_pengantar).'/kaji_ulang_permintaan_kontrak') ?>">Kaji ulang permintaan & kontrak</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link navtabs <?= @$id_lab == 'penanggung_jawab' ? 'active bg-success text-light' : ''; ?>" <?= @$id_lab == 'penanggung_jawab' ? $bg : ''; ?> aria-current="page" href="<?= base_url('pelayanan-pemeriksaan/proses-lhu/list-menu/'.strtolower($kode_pengantar).'/penanggung_jawab') ?>">Penanggung jawab</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link navtabs <?= @$id_lab == 'resume' ? 'active bg-success text-light' : ''; ?>" <?= @$id_lab == 'resume' ? $bg : ''; ?> aria-current="page" href="<?= base_url('pelayanan-pemeriksaan/proses-lhu/list-menu/'.strtolower($kode_pengantar).'/resume') ?>">Resume</a>
                                    </li>
                            </ul>
                        <?php } ?>
                        <?= $this->renderSection('content_menu'); ?> 
                    </div>
                </div>
            </div>
            <!-- [ sample-page ] end -->
        </div>
    </div>
</div>
<div class="view-modal" style="display: none;"></div>

<?= $this->endSection(); ?>