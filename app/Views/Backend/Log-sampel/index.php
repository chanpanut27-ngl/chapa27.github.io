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
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Log sampel</a></li>
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
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link navtabs <?= current_url() == base_url('log-sampel/penerimaan') ? 'active bg-primary text-light' : '' ?>" href="<?= base_url('log-sampel/penerimaan') ?>">Penerimaan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link navtabs <?= current_url() == base_url('log-sampel/penawaran') ? 'active bg-warning text-light' : '' ?>" href="<?= base_url('log-sampel/penawaran') ?>">Penawaran</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link navtabs <?= current_url() == base_url('log-sampel/distribusi-sampel') ? 'active bg-info text-light' : '' ?>" href="<?= base_url('log-sampel/distribusi-sampel') ?>">Distribusi sampel</a>
                            </li>
                        </ul>
                        <div class="card-body">
                            <?= $this->renderSection('content_log'); ?>
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
    function statusLayanan(id) 
    {
        $.ajax({
            type: 'get',
            url: '<?= site_url('pelayanan/status-layanan/index/'); ?>' + id,
            dataType: 'json',
            cache: false,
            beforeSend: function() {
                $('.btn-sts-'+id).attr('disable', 'disabled');
                $('.btn-sts-'+id).html('<span class="fa-solid fa-spin fa-spinner"></span>');
            },
            complete: function() {
                $('.btn-sts-'+id).removeAttr('disable');
                $('.btn-sts-'+id).html('<i class="ti ti-pencil f-18"></i>');
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
        new DataTable('#example', {
            responsive: true
        });
    })
</script>
<?= $this->endSection(); ?>