<?= $this->extend('Pelanggan/Layout/__main'); ?>

<?= $this->section('topAssets'); ?>
<!-- [Datatables css] --> 
<link rel="stylesheet" href="<?= base_url('assets/css/plugins/dataTables.bootstrap5.css'); ?>">
<!-- [Datepicker css] --> 
<link rel="stylesheet" href="https://code.jquery.com/ui/1.14.1/themes/base/jquery-ui.css">
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
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Pelayanan</a></li>
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
                <?php if (!$profil) : ?>
                    <?php  echo '<div class="alert alert-warning" role="alert">
                                    Silahkan lengkapi data profil anda
                                </div>'; ?>
                <?php else : ?>
                <div class="card">
                    <div class="card-header p-2">
                        <h4><span class="pc-micon"><i class="ti ti-list"></i><?= $title; ?></h4>
                        <div class="d-flex justify-content-end align-items-center">
                            <button type="button" class="btn btn-success btn-sm rounded btn-refresh" title="refresh">
                                <span class="pc-micon"><i class="ti ti-refresh"></i></span>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-end align-items-center">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary btn-sm rounded btn-tambah">
                                <span class="pc-micon"><i class="ti ti-square-plus"></i></span> Tambah Data
                            </button>
                        </div>
                        <div class="view-data"></div>
                    </div>
                </div>
                <?php endif;?>
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
<!-- [Datepicker js] -->
<script src="https://code.jquery.com/ui/1.14.1/jquery-ui.js"></script>

<script>
    function listData() {
        $.ajax({
            url: "<?= site_url('pelanggan/pelayanan/permintaan/list-data') ?>",
            dataType: 'json',
            cache: false,
            beforeSend: function() {
                $('.view-data').html('<span class="fa-solid fa-spin fa-spinner"></span>');
            },
            complete: function() {
                $('.view-data').removeAttr('span');
            },
            success: function(response) {
                $(".view-data").html(response.data);
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError + "\n" + ajaxOptions);
            }
        });
    }

    $(document).ready(function () {

        listData();

        $(".btn-tambah").click(function (e) {
            e.preventDefault();
            $.ajax({
                url: "<?= site_url('pelanggan/pelayanan/permintaan/add-data') ?>",
                dataType: 'json',
                cache: false,
                beforeSend: function() {
                    $('.btn-tambah').html('<span class="fa-solid fa-spin fa-spinner"></span>');
                },
                complete: function() {
                    $('.btn-tambah').html('<i class="ti ti-square-plus"></i> Tambah Data');
                },
                success: function(response) {
                    $(".view-modal").html(response.data).show();
                    $("#exampleModal").modal('show');
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError + "\n" + ajaxOptions);
                }
            })
        })

    });
</script>
<?= $this->endSection(); ?>