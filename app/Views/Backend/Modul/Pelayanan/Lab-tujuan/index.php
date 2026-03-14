<?= $this->extend('Backend/Layout/__main'); ?>
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
                            <li class="breadcrumb-item"><a href="javascript: void(0)"><span class="badge rounded-pill bg-dark">Pelayanan</span></a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Pengantar Laboratorium</a></li>
                            <li class="breadcrumb-item"><a href="#"><?= $title; ?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->

        <!-- [ Main Content ] start -->
        <div class="card-header p-2">
            <div class="d-flex justify-content-end align-items-center gap-1">
                <a href="<?= base_url('pelayanan/pengantar-lab') ?>" class="btn bg-gray-400 btn-sm rounded" title="Kembali">
                    <i class="ti ti-arrow-left-circle"></i>
                </a>
                <button type="button" class="btn btn-success border-0 btn-sm rounded btn-refresh-data">
                    <i class="ti ti-refresh"></i>
                </button>
            </div>
        </div>
        <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button bg-green-100 p-2 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="true" aria-controls="flush-collapseOne">
                        <h4 style="font-family: arial;"><span class="pc-micon"><span class="fa-solid fa-user"></span> Data Pelanggan</h4>
                    </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <?php
                            foreach ($items as $row) :  
                                $id_pelanggan = $row['id_pelanggan'];
                                $kode_pengantar = $row['kode_pengantar'];
                        ?>
                        <input type="hidden" id="kode-pengantar" value="<?= $kode_pengantar; ?>">
                        <div class="row">
                            <div class="col-sm-3 fw-bold">No.Registrasi</div>
                            <div class="col-sm-3">: <?= $row['no_reg'] ?></div>
                            <div class="col-sm-2 fw-bold">Instansi</div>
                            <div class="col-sm-4">: <?= $row['instansi'] ?></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3 fw-bold">Kode pelanggan</div>
                            <div class="col-sm-3">: <?= $row['kode_pelanggan'] ?></div>
                            <div class="col-sm-2 fw-bold">No.Telp/Hp</div>
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
                </div>
            </div>
        </div>
        <div class="row p-0">
            <!-- [ sample-page ] start -->
            <div class="col-sm-12">
                <div class="card">
                    <?php
                    use App\Models\StatusLayananModel;
                         $status_layanan = new StatusLayananModel();
                         $acepted_penawaran = $status_layanan->
                         where('id_pelanggan', $id_pelanggan)->
                         where('status', 'Penawaran di Terima')->first();
                    if (!$acepted_penawaran) {
                            ?>
                            <div class="card-body">
                                <div class="alert alert-danger fw-bold" role="alert">
                                    Status Penawaran belum di Terima !
                                </div>
                            </div>
                            <?php
                    } else {
                    ?>
                    <div class="card-header p-2">
                        <h4><span class="pc-micon"><i class="ti ti-list"></i> <?= $title; ?></h4>
                        <div class="d-flex justify-content-end align-items-center gap-1">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-info btn-sm rounded btn-show-lab" onclick="showLab(<?= $row['id_pelanggan']; ?>)" title="Laboratorium Pemeriksaan">
                                <i class="ti ti-clipboard"></i> Laboratorium Pemeriksaan
                            </button>
                            <button type="button" class="btn btn-primary btn-sm rounded btn-tambah" onclick="addData(<?= $row['id_pengantar']; ?>)" title="Tambah Data">
                                <i class="ti ti-square-plus"></i> Tambah Data
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="view-data"></div>
                    </div>
                    <?php } ?>
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
<script src="<?= base_url('assets/js/custom.js'); ?>"></script>
<script>
    function listData() {
        var kode_pengantar = $("#kode-pengantar").val();
        $.ajax({
            url: "<?= site_url('pelayanan/laboratorium-tujuan/list-data/'); ?>" + kode_pengantar,
            dataType: 'json',
            success: function(response) {
                $(".view-data").html(response.data);
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + ' ' + xhr.responseText + ' ' + thrownError);
            }
        })
    }

    function showLab(id) {
        
        $.ajax({
            type: 'GET',
            url: '<?= site_url('show-data/lab-pemeriksaan/'); ?>' + id,
            dataType: 'json',
            cache: false,
            beforeSend: function() {
                $('.btn-show-lab').attr('disable', 'disabled');
                $('.btn-show-lab').html('<i class="fa fa-spin fa-spinner"></i>');
            },
            complete: function() {
                $('.btn-show-lab').removeAttr('disable');
                $('.btn-show-lab').html('<i class="ti ti-clipboard"></i> Laboratorium Pemeriksaan');
            },
            success: function(response) {
                if (response.sukses) {
                    $(".view-modal").html(response.sukses).show();
                    $("#exampleModal").modal('show');
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + ' ' + xhr.responseText + ' ' + thrownError);
            }
        })
    }

    function addData(id) {
        $.ajax({
            type: 'GET',
            url: '<?= site_url('pelayanan/laboratorium-tujuan/add-data/'); ?>' + id,
            dataType: 'json',
            cache: false,
            beforeSend: function() {
                $('.btn-tambah').attr('disable', 'disabled');
                $('.btn-tambah').html('<span class="fa fa-spin fa-spinner"></span>');
            },
            complete: function() {
                $('.btn-tambah').removeAttr('disable');
                $('.btn-tambah').html('<i class="ti ti-square-plus"></i> Tambah Data');
            },
            success: function(response) {
                if (response.sukses) {
                    $(".view-modal").html(response.sukses).show();
                    $("#exampleModal").modal('show');
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + ' ' + xhr.responseText + ' ' + thrownError);
            }
        })
    }

    $(document).ready(function() {
        listData();
    })
</script>
<?= $this->endSection(); ?>