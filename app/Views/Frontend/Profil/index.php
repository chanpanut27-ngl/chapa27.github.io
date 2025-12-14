<?= $this->extend('Frontend/Layout/_main'); ?>
<?= $this->section('topAssets'); ?>
<link rel="stylesheet" href="<?= base_url('assets/css/plugins/dataTables.bootstrap5.css'); ?>">
<?= $this->endSection(); ?>
<?= $this->section('content'); ?>
<div class="pc-container">
    <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Data</a></li>
                            <li class="breadcrumb-item"><a href="#"><?= $title; ?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->

        <!-- [ Main Content ] start -->
        <div class="row p-0">
            <!-- [ sample-page ] start -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header bg-light p-2">
                        <h4 style="font-family: arial;"><span class="pc-micon"><span class="fa-solid fa-user"></span> <?= $title; ?></h4>
                        <div class="d-flex justify-content-end align-items-center gap-1">
                            <button type="button" class="btn btn-secondary btn-sm rounded btn-refresh">
                                <span class="pc-micon"><span class="fa-solid fa-refresh"></span></span>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('master-data/instansi/create-data'); ?>" class="form-data">
                            <?= csrf_field(); ?>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="nama-instansi" class="form-label h5">Instansi</label>
                                    <input type="text" name="nama_instansi" class="form-control" id="nama-instansi" autocomplete="off">
                                    <div class="invalid-feedback errorNamaInstansi"></div>
                                </div>
                                <div class="mb-3">
                                    <label for="alamat" class="form-label h5">Alamat</label>
                                    <textarea name="alamat" class="form-control" id="alamat"></textarea>
                                    <div class="invalid-feedback errorAlamat"></div>
                                </div>
                                <div class="mb-3">
                                    <label for="no-telp" class="form-label h5">No.Telp</label>
                                    <input type="text" name="no_telp" class="form-control" id="no-telp">
                                    <div class="invalid-feedback errorNoTelp"></div>
                                </div>
                                <div class="mb-3">
                                    <label for="wilayah" class="form-label h5">Wilayah</label>
                                    <input type="text" name="wilayah" class="form-control" id="wilayah">
                                    <div class="invalid-feedback errorWilayah"></div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary btn-sm rounded btn-simpan"><span class="fa-solid fa-save"></span> Simpan</button>
                                <button type="button" class="btn btn-secondary btn-sm rounded" data-bs-dismiss="modal"><span class="fa-solid fa-close"></span> Tutup</button>
                            </div>
                        </form>
                        <div class="view-data"></div>
                    </div>
                </div>
            </div>
            <!-- [ sample-page ] end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<div class="view-modal" style="display: none;"></div>
<?= $this->endSection(); ?>

<?= $this->section('bottomAssets'); ?>
<script src="<?= base_url('assets/js/plugins/dataTables.js'); ?>"></script>
<script src="<?= base_url('assets/js/plugins/dataTables.bootstrap5.js'); ?>"></script>
<script src="<?= base_url('assets/js/plugins/dataTables.responsive.js'); ?>"></script>
<script src="<?= base_url('assets/js/plugins/sweetalert2.all.min.js'); ?>"></script>

<?= $this->endSection(); ?>