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
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Master Data</a></li>
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
                        <h4><span class="pc-micon"><i class="ti ti-list"></i> <?= $title ?></h4>
                        <div class="d-flex justify-content-end align-items-center gap-1">
                            <button type="button" class="btn btn-success btn-sm rounded btn-refresh-log" title="refresh">
                                <span class="pc-micon"><i class="ti ti-refresh"></i></span>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="card-body">
                                    <div class="view-permintaan"></div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card-body">
                                    <div class="view-penawaran"></div>
                                </div>
                            </div>
                        </div>
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
<script src="<?= base_url('assets/js/custom.js'); ?>"></script>

<script>
    function logPermintaan() {
        $.ajax({
            url: "<?= site_url('log-sampel/permintaan'); ?>",
            dataType: 'json',
            cache: false,
            beforeSend: function() {
                $('.view-permintaan').html('<span class="fa-solid fa-spin fa-spinner"></span>');
            },
            complete: function() {
                $('.view-permintaan').removeAttr('span');
            },
            success: function(response) {
                $(".view-permintaan").html(response.data);
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + ' ' + xhr.responseText + ' ' + thrownError);
            }
        })
    }

     function logPenawaran() {
        $.ajax({
            url: "<?= site_url('log-sampel/penawaran'); ?>",
            dataType: 'json',
            cache: false,
            beforeSend: function() {
                $('.view-penawaran').html('<span class="fa-solid fa-spin fa-spinner"></span>');
            },
            complete: function() {
                $('.view-penawaran').removeAttr('span');
            },
            success: function(response) {
                $(".view-penawaran").html(response.data);
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + ' ' + xhr.responseText + ' ' + thrownError);
            }
        })
    }


    $(document).ready(function() {

        logPermintaan();
        logPenawaran();
        
    })
    
</script>

<?= $this->endSection(); ?>