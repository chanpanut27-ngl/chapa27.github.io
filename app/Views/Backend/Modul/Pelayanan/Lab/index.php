<?= $this->extend('Backend/Layout/__main'); ?>
<?= $this->section('content'); ?>
<div class="pc-container">
    <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript: void(0)"><span class="badge rounded-pill bg-dark">Pelayanan</span></a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Pengantar Laboratorium</a></li>
                            <li class="breadcrumb-item"><a href="#"><?= $title; ?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- [ content ] start -->
        <div class="accordion accordion-flush accordion-color" id="accordionFlushExample">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button bg-green-100 p-2 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="true" aria-controls="flush-collapseOne">
                        <h4><span class="pc-micon"><span class="fa-solid fa-user"></span> Data Pelanggan</h4>
                    </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <?php

                        use App\Models\LaboratoriumTujuanModel;

                        foreach ($items as $row) :  
                                $id_pelanggan = $row['id_pelanggan'];
                                $kode_pengantar = $row['kode_pengantar'];
                        ?>
                        <input type="hidden" id="id-pengantar" value="<?= $row['id_pengantar'] ?>">
                        <div class="row">
                            <div class="col-sm-3 fw-bold">No. Reg</div>
                            <div class="col-sm-3">: <?= $row['no_reg'] ?></div>
                            <div class="col-sm-2 fw-bold">Instansi</div>
                            <div class="col-sm-4">: <?= $row['instansi'] ?></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3 fw-bold">Kode pelanggan</div>
                            <div class="col-sm-3">: <?= $row['kode_pelanggan'] ?></div>
                            <div class="col-sm-2 fw-bold">No. Telp/Hp</div>
                            <div class="col-sm-4">: <?= $row['no_telp'] ?></div>
                        </div>  
                        <div class="row">
                            <div class="col-sm-3 fw-bold">Nama pelanggan/Pengirim</div>
                            <div class="col-sm-3">: <?= $row['nama_pengirim'] ?></div>
                            <div class="col-sm-2 fw-bold">Alamat</div>
                            <div class="col-sm-4">: <?= $row['alamat'] ?></div>
                        </div>  
                        <div class="row">
                            <div class="col-sm-3 fw-bold">Kode Pengantar</div>
                            <div class="col-sm-3">: <?= $row['kode_pengantar'] ?></div>
                            <div class="col-sm-2 fw-bold">No.Telp/Hp pengirim</div>
                            <div class="col-sm-4">: <?= $row['no_telp_pengirim'] ?></div>
                        </div>   
                        <?php endforeach;?>
                    </div>
                    <div class="d-flex justify-content-end align-items-center">
                        <a href="<?= base_url('pelayanan/pengantar-lab') ?>" class="btn bg-gray-400 btn-sm rounded" title="Kembali">
                            <i class="ti ti-arrow-left-circle"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row p-0">
           <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <?php 
                         use App\Models\StatusLayananModel;
                         $status_layanan = new StatusLayananModel();
                         $acepted_penawaran = $status_layanan->
                         where('id_pelanggan', $id_pelanggan)->
                         where('status', 'Penawaran di Terima')->first();
                        
                        if (!$acepted_penawaran) {
                            ?>
                                <div class="alert alert-danger fw-bold" role="alert">
                                    Status Penawaran belum di Terima !
                                </div>
                            <?php
                        } else if (!$menu_lab) {
                            ?>
                                <div class="alert alert-danger fw-bold" role="alert">
                                    Laboratorim tujuan belum di pilih !
                                </div>
                            <?php
                        } else {
                            
                        ?>
                            <ul class="nav nav-tabs">
                                <?php
                                    foreach ($menu_lab as $m) :

                                        $nama_lab = $m['nama_lab'];
                                        ?>
                                        <li class="nav-item">
                                            <a class="nav-link navtabs <?= @$id_lab == $m['id_lab'] ? 'active text-light fw-bold bg-success' : '' ; ?>" href="<?= base_url('pelayanan/pengantar-lab/proses/pilih-menu/'.strtolower($kode_pengantar).'/'.$m['id_lab']) ?>"><?= $nama_lab ?></a>
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
                                                    <a class="nav-link navtabs <?= @$id_lab == 'keterangan-'.$id_kategori_lab ? 'active text-light fw-bold bg-success' : '' ?>" href="<?= base_url('pelayanan/pengantar-lab/proses/pilih-menu/'.strtolower($kode_pengantar).'/keterangan-'.$id_kategori_lab);?>">Keterangan</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link navtabs <?= @$id_lab == 'kondisi-lingkungan-'.$id_kategori_lab ? 'active text-light fw-bold bg-success' : '' ?>" href="<?= base_url('pelayanan/pengantar-lab/proses/pilih-menu/'.strtolower($kode_pengantar).'/kondisi-lingkungan-'.$id_kategori_lab);?>">Kondisi lingkungan</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link navtabs <?= @$id_lab == 'kaji-ulang-permintaan-kontrak-'.$id_kategori_lab ? 'active text-light fw-bold bg-success' : '' ?>" href="<?= base_url('pelayanan/pengantar-lab/proses/pilih-menu/'.strtolower($kode_pengantar).'/kaji-ulang-permintaan-kontrak-'.$id_kategori_lab);?>">Kaji ulang permintaan kontrak</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link navtabs <?= @$id_lab == 'penanggung-jawab-'.$id_kategori_lab ? 'active text-light fw-bold bg-success' : '' ?>" href="<?= base_url('pelayanan/pengantar-lab/proses/pilih-menu/'.strtolower($kode_pengantar).'/penanggung-jawab-'.$id_kategori_lab);?>">Penanggung jawab</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <?php
                                    endforeach;
                                ?>
                                <li class="nav-item">
                                    <a class="nav-link navtabs" href="<?= base_url('pelayanan/pengantar-lab/resume/index/'.strtolower($kode_pengantar));?>">Resume</a>
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
<?= $this->section('bottomAssets'); ?>
<script src="<?= base_url('assets/js/custom.js'); ?>"></script>
<?= $this->endSection() ?>



