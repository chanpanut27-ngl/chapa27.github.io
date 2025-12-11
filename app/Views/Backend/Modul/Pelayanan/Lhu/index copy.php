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
                        use App\Models\LaboratoriumModel;
                        use App\Models\LaboratoriumTujuanModel;

                        foreach ($items as $row) :  
                            $kode_pengantar = $row['kode_pengantar'];
                        ?>
                        <div class="row">
                            <div class="col-md-2">
                                <h5 class="card-title">Kode pengantar</h5>
                            </div>
                            <div class="col-md-4">
                                <h5 class="card-title" style="font-weight: initial;">: <?= $row['kode_pengantar']; ?></h5>
                            </div>
                            <div class="col-md-2">
                                <h5 class="card-title">Alamat</h5>
                            </div>
                             <div class="col-md-4">
                                <h5 class="card-title" style="font-weight: initial;">: <?= $row['alamat']; ?></h5>
                            </div>
                            <div class="col-md-2">
                                <h5 class="card-title">Pelanggan</h5>
                            </div>
                             <div class="col-md-4">
                                <h5 class="card-title" style="font-weight: initial;">: <?= $row['nama']; ?></h5>
                            </div>
                            <div class="col-md-2">
                                <h5 class="card-title">No.Telepon</h5>
                            </div>
                            <div class="col-md-4">
                                <h5 class="card-title" style="font-weight: initial;">: <?= $row['no_telp']; ?></h5>
                            </div>
                        </div>
                        <?php endforeach;?>
                    </div>
                    <div class="card-body p-2">
                        <?php 
                        $id_lab = ''; 
                        $bg = '';
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
                                    foreach ($menu_lab as $m) :
                                        $namaLab = strtolower($m['nama_lab']);
                                        echo '<br>';
                                        $urlNamaLab = str_replace(' ', '-', $namaLab);
                                        if (@$id_lab == $m['id_lab']) {
                                            $active = 'active bg-success text-light bg-success fw-bold rounded';
                                        }else{
                                            $active = '';
                                        }
                                        ?>
                                        <li class="nav-item">
                                            <a class="nav-link navtabs <?= $active ?>" aria-current="page" href="<?= base_url('pelayanan/proses-lhu/pilih-menu/'.$urlNamaLab.'/'.strtolower($kode_pengantar).'/'.'-'.$m['id_lab']) ?>"><?= $m['nama_lab'] ?></a>
                                        </li>
                                    <?php
                                    endforeach;
                                    $lab_tujuan = new LaboratoriumTujuanModel();
                                    $group_kat_lab = $lab_tujuan->get_data_by_group_kat_lab($kode_pengantar);

                                    foreach ($group_kat_lab  as $rs) : 
                                        $id_kat_lab = $rs['idkatlab'];
                                        $kat_lab = 'Lab. '.$rs['kategori'];
                                    ?>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" role="button" aria-expanded="false"><?= $kat_lab ?></a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="nav-link <?= $id_lab == 'keterangan-'.$id_kat_lab ? 'active bg-success text-light bg-success fw-bold rounded' : ''; ?>" href="<?= base_url('pelayanan/proses-lhu/list-menu/'.strtolower($kode_pengantar).'/keterangan-'.$id_kat_lab) ?>">Keterangan</a>
                                                </li>
                                                <li>
                                                    <a class="nav-link <?= $id_lab == 'kondisi-lingkungan-'.$id_kat_lab ? 'active bg-success text-light bg-success fw-bold rounded' : ''; ?>" href="<?= base_url('pelayanan/proses-lhu/list-menu/'.strtolower($kode_pengantar).'/kondisi-lingkungan-'.$id_kat_lab) ?>">Kondisi lingkungan sekitar sampel</a>
                                                </li>
                                                <li>
                                                    <a class="nav-link <?= $id_lab == 'kaji-ulang-permintaan-kontrak-'.$id_kat_lab ? 'active bg-success text-light bg-success fw-bold rounded' : ''; ?>" href="<?= base_url('pelayanan/proses-lhu/list-menu/'.strtolower($kode_pengantar).'/kaji-ulang-permintaan-kontrak-'.$id_kat_lab) ?>">Kaji ulang permintaan & kontrak</a>
                                                </li>
                                                <li>
                                                    <a class="nav-link" aria-current="page" href="<?= base_url('pelayanan/proses-lhu/list-menu/'.strtolower($kode_pengantar).'/penanggung_jawab') ?>">Penanggung jawab</a>
                                                </li>
                                            </ul>
                                        </li>
                                    <?php endforeach;?>
                                        <li class="nav-item">
                                            <a class="nav-link navtabs <?= @$id_lab == 'resume' ? 'active bg-success text-light fw-bold rounded' : ''; ?>" <?= @$id_lab == 'resume' ? $bg : ''; ?> aria-current="page" href="<?= base_url('pelayanan/proses-lhu/list-menu/'.strtolower($kode_pengantar).'/resume') ?>">Resume</a>
                                        </li>
                                    </ul>
                                </li>
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


