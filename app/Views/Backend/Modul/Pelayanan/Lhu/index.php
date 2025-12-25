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
        <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="true" aria-controls="flush-collapseOne">
                    <h4 style="font-family: arial;"><span class="pc-micon"><span class="fa-solid fa-user"></span> <?= $title ?></h4>
                </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <?php
                            use App\Models\LaboratoriumTujuanModel;
                            foreach ($items as $row) :  
                                $kode_pengantar = $row['kode_pengantar'];
                        ?>
                        <div class="row" style="font-family: arial;">
                            <div class="col-sm-2">
                                <label class="card-title fw-bold">Kode pengantar</label>
                            </div>
                            <div class="col-sm-4">
                                <label class="card-title" style="font-weight: initial;">: <?= $row['kode_pengantar']; ?></label>
                            </div>
                            <div class="col-sm-2">
                                <label class="card-title fw-bold">Alamat</label>
                            </div>
                                <div class="col-sm-4">
                                <label class="card-title">: <?= $row['alamat']; ?></label>
                            </div>
                            <div class="col-sm-2">
                                <label class="card-title fw-bold">Pelanggan</label>
                            </div>
                                <div class="col-sm-4">
                                <label class="card-title">: <?= $row['nama']; ?></label>
                            </div>
                            <div class="col-sm-2">
                                <label class="card-title fw-bold">No.Telepon</label>
                            </div>
                            <div class="col-sm-4">
                                <label class="card-title">: <?= $row['no_telp']; ?></label>
                            </div>
                        </div>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row p-0">
           <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
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
                            <ul class="nav nav-tabs">
                                <?php
                                    foreach ($menu_lab as $m) :

                                        $nama_lab = $m['nama_lab'];
                                        ?>
                                        <li class="nav-item">
                                            <a class="nav-link navtabs <?= @$id_lab == $m['id_lab'] ? 'active text-light fw-bold bg-success' : '' ; ?>" href="<?= base_url('pelayanan/pengantar-lhu/proses/pilih-menu/'.strtolower($kode_pengantar).'/'.$m['id_lab']) ?>"><?= $nama_lab ?></a>
                                        </li>
                                    <?php
                                    endforeach;
                                    $lab_tujuan = new LaboratoriumTujuanModel();
                                    $group_kat_lab = $lab_tujuan->get_data_by_group_kat_lab($kode_pengantar);
                                    
                                    foreach ($group_kat_lab  as $rs) : 
                                        $kode_pengantar = $rs['kode_pengantar'];
                                        $id_kategori_lab = $rs['idkatlab'];
                                        $kategori_lab = 'Catatan '.$rs['kategori'];
                                        ?>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" role="button" aria-expanded="false"><?= $kategori_lab ?></a>
                                            <ul class="dropdown-menu">
                                                <li class="nav-item">
                                                    <a class="nav-link navtabs <?= @$id_lab == 'keterangan-'.$id_kategori_lab ? 'active text-light fw-bold bg-success' : '' ?>" href="<?= base_url('pelayanan/pengantar-lhu/proses/pilih-menu/'.strtolower($kode_pengantar).'/keterangan-'.$id_kategori_lab);?>">Keterangan</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link navtabs <?= @$id_lab == 'kondisi-lingkungan-'.$id_kategori_lab ? 'active text-light fw-bold bg-success' : '' ?>" href="<?= base_url('pelayanan/pengantar-lhu/proses/pilih-menu/'.strtolower($kode_pengantar).'/kondisi-lingkungan-'.$id_kategori_lab);?>">Kondisi lingkungan</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link navtabs <?= @$id_lab == 'kaji-ulang-permintaan-kontrak-'.$id_kategori_lab ? 'active text-light fw-bold bg-success' : '' ?>" href="<?= base_url('pelayanan/pengantar-lhu/proses/pilih-menu/'.strtolower($kode_pengantar).'/kaji-ulang-permintaan-kontrak-'.$id_kategori_lab);?>">Kaji ulang permintaan kontrak</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link navtabs <?= @$id_lab == 'penanggung-jawab'.$id_kategori_lab ? 'active text-light fw-bold bg-success' : '' ?>" href="<?= base_url('pelayanan/pengantar-lhu/proses/pilih-menu/'.strtolower($kode_pengantar).'/penanggung-jawab-'.$id_kategori_lab);?>">Penanggung jawab</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <?php
                                    endforeach;
                                ?>
                                <li class="nav-item">
                                    <a class="nav-link navtabs <?= @$kode_pengantar == strtolower($kode_pengantar) ? 'active text-light fw-bold bg-success' : '' ?>" href="<?= base_url('pelayanan/pengantar-lhu/resume/'.strtolower($kode_pengantar));?>">Resume</a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('pelayanan/pengantar-lhu') ?>" class="btn btn-info btn-sm" title="Kembali"><span class="fa-solid fa-arrow-left"></span></a>
                                </li>
                            </ul>
                        <?php } ?>
                    </div>
                </div>
                <?= $this->renderSection('content_menu'); ?>
           </div>
        </div>
        <!-- [ content ] end -->
    </div>
</div>
<div class="view-modal" style="display: none;"></div>
<?= $this->endSection(); ?>


