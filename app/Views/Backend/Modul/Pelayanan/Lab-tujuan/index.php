<?= $this->extend('Backend/Layout/_main'); ?>
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
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Modul Pelayanan Pemeriksaan</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Pengantar LHU</a></li>
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
                    <div class="card-header p-2">
                        <h4 style="font-family: arial;"><span class="pc-micon"><span class="fa-solid fa-user"></span> Data Pelanggan</h4>
                    </div>
                    <div class="card-body p-2">
                        <?php foreach ($items as $row) :  
                            $kode_pengantar = $row['kode_pengantar'];
                        ?>
                        <input type="hidden" id="kode-pengantar" value="<?= $kode_pengantar ?>">
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
                </div>
            </div>
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header p-2">
                        <h4 style="font-family: arial;"><span class="pc-micon"><span class="fa-solid fa-list"></span> <?= $title; ?></h4>
                        <div class="d-flex justify-content-end align-items-center gap-1">
                            <button type="button" class="btn btn-secondary btn-sm rounded btn-refresh-data">
                                <span class="pc-micon"><span class="fa-solid fa-refresh"></span>
                            </button>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary btn-sm rounded" onclick="addData(<?= $row['id_pengantar']; ?>)" title="Tambah laboratorium tujuan">
                                <span class="fa-solid fa-plus-square"></span> Tambah Data
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
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
<script src="<?= base_url('assets/js/custom.js'); ?>"></script>
<script>
    function listData() {
        var kode_pengantar = $("#kode-pengantar").val();
        $.ajax({
            url: "<?= site_url('laboratorium-tujuan/list-data/'); ?>" + kode_pengantar,
            dataType: 'json',
            success: function(response) {
                $(".view-data").html(response.data);
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + ' ' + xhr.responseText + ' ' + thrownError);
            }
        })
    }

    function addData(id) {
            $.ajax({
                type: 'get',
                url: '<?= site_url('laboratorium-tujuan/add-data/'); ?>' + id,
                dataType: 'json',
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

        $(".btn-refresh-data").click(function() {
            $.ajax({
                cache: false,
                beforeSend: function() {
                    $('.btn-refresh-data').html('<span class="fa fa-spin fa-spinner"></span>');
                },
                success: function() {
                    listData();
                    $('.btn-refresh-data').html('<span class="fa-solid fa-refresh"></span>');
                }
            })
        })

    })
</script>
<?= $this->endSection(); ?>