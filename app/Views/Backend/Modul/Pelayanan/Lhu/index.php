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
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Pengantar LHU</a></li>
                            <li class="breadcrumb-item"><a href="#"><?= $title; ?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

            <!-- [ content ] start -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header p-2">
                        <h4 style="font-family: arial;"><span class="pc-micon"><span class="fa-solid fa-user"></span> Data Pelanggan</h4>
                    </div>
                    <div class="card-body p-2">
                        <?php
                        foreach ($items as $row) :  
                            $kode_pengantar = $row['kode_pengantar'];
                        ?>
                        <div class="row" style="font-family: arial;">
                            <div class="col-md-2">
                                <label class="card-title fw-bold">Kode pengantar</label>
                            </div>
                            <div class="col-md-4">
                                <label class="card-title" style="font-weight: initial;">: <?= $row['kode_pengantar']; ?></label>
                            </div>
                            <div class="col-md-2">
                                <label class="card-title fw-bold">Alamat</label>
                            </div>
                             <div class="col-md-4">
                                <label class="card-title">: <?= $row['alamat']; ?></label>
                            </div>
                            <div class="col-md-2">
                                <label class="card-title fw-bold">Pelanggan</label>
                            </div>
                             <div class="col-md-4">
                                <label class="card-title">: <?= $row['nama']; ?></label>
                            </div>
                            <div class="col-md-2">
                                <label class="card-title fw-bold">No.Telepon</label>
                            </div>
                            <div class="col-md-4">
                                <label class="card-title">: <?= $row['no_telp']; ?></label>
                            </div>
                        </div>
                        <?php endforeach;?>
                    </div>
                    <div class="card-body p-2">
                        <?php 
                        if (!$menu_lab) {
                            ?>
                            <div class="alert alert-danger fw-bold" role="alert">
                                Laboratorim tujuan belum di pilih !
                                <a href="<?= base_url('pelayanan/pengantar-lhu'); ?>" class="href"> [Kembali]</a>
                            </div>
                            <?php
                        }else{
                        ?>
                            <ul class="nav nav-tabs mb-1">
                                <?php
                                $bg = '';
                                $active = '';
                                    foreach ($menu_lab as $m) :
                                        $nama_lab = $m['nama_lab'];
                                        ?>
                                        <li class="nav-item">
                                            <a class="nav-link navtabs <?= @$id_lab == $m['id_lab'] ? 'active text-light fw-bold bg-success' : '' ; ?>" href="<?= base_url('pelayanan/proses-pengantar-lhu/pilih-menu/'.strtolower($kode_pengantar).'/'.$m['id_lab']) ?>"><?= $nama_lab ?></a>
                                        </li>
                                    <?php
                                    endforeach;
                                ?>
                            </ul>
                        <?php } ?>
                        <?= $this->renderSection('content_menu'); ?> 
                    </div>
                </div>
            </div>
            <!-- [ content ] end -->
    </div>
</div>
<div class="view-modal" style="display: none;"></div>

<?= $this->endSection(); ?>


