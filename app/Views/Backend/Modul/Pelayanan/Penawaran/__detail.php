<?php

use App\Models\StatusLayananModel;
?>
<?= $this->extend('Backend/Layout/__main'); ?>
<?= $this->section('topAssets'); ?>
<link rel="stylesheet" href="<?= base_url('assets/css/plugins/dataTables.bootstrap5.css'); ?>">
<!-- [Datepicker css] --> 
<link rel="stylesheet" href="https://code.jquery.com/ui/1.14.1/themes/base/jquery-ui.css">
<!-- select2 -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="pc-container" data-id="<?= $no_reg; ?>">
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
                <div class="card">
                    <div class="card-header p-2">
                        <div class="d-flex justify-content-end align-items-center gap-1">
                            <a href="<?= base_url('pelayanan/permintaan') ?>" class="btn btn-secondary btn-sm btn-rounded" title="Kembali"><span class="fa-solid fa-arrow-circle-left"></span></a>
                        </div>
                    </div>
                    <div class="accordion accordion-flush accordion-color mb-2" id="accordionFlushExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                            <button class="accordion-button bg-green-100 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="true" aria-controls="flush-collapseOne">
                                <h5><span class="pc-micon"><i class="ti ti-user"></i> Data Pelanggan</h5>
                            </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse" data-bs-parent="#accordionFlushExample">
                                </div>
                                <div class="accordion-body">
                                    <div class="show-pelanggan"></div>                                
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion accordion-flush accordion-color mb-2" id="accordionSurat">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                            <button class="accordion-button bg-green-100 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="true" aria-controls="flush-collapseOne">
                                <h5><span class="pc-micon"><i class="ti ti-file"></i> Surat permintaan</h5>
                            </button>
                            </h2>
                            <div id="flush-collapseTwo" class="accordion-collapse" data-bs-parent="#accordionSurat">
                                <div class="accordion-body">
                                    <div class="show-surat"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion accordion-flush accordion-color" id="accordionPaktaIntegritas">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                            <button class="accordion-button bg-green-100 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="true" aria-controls="flush-collapseThree">
                                <h5><span class="pc-micon"><i class="ti ti-file"></i> Pakta Integritas</h5>
                            </button>
                            </h2>
                            <div id="flush-collapseThree" class="accordion-collapse" data-bs-parent="#accordionPaktaIntegritas">
                                <div class="accordion-body">
                                    <div class="show-pakta-integritas"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion accordion-flush accordion-color" id="accordionRencanaAnggaranBiaya">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                            <button class="accordion-button bg-green-100 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="true" aria-controls="flush-collapseFour">
                                <h5><span class="pc-micon"><i class="ti ti-file"></i> Rencana Anggaran Biaya</h5>
                            </button>
                            </h2>
                            <div id="flush-collapseFour" class="accordion-collapse" data-bs-parent="#accordionRencanaAnggaranBiaya">
                                <div class="accordion-body">
                                    <div class="show-rencana-anggaran-biaya"></div>
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
<!-- [Datepicker js] -->
<script src="https://code.jquery.com/ui/1.14.1/jquery-ui.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    function showDataSurat() {
        var no_reg = $(".pc-container").data("id");
        $.ajax({
            type:"GET",
            url: "<?= site_url('pelayanan/penawaran/detail-surat'); ?>",
            dataType: 'json',
            cache: false,
            data:{no_reg:no_reg},
            beforeSend: function() {
                $('.show-surat').html('<span class="fa-solid fa-spin fa-spinner"></span>');
            },
            complete: function() {
                $('.show-surat').removeAttr('span');
            },
            success: function(response) {
                $(".show-surat").html(response.data);
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + ' ' + xhr.responseText + ' ' + thrownError);
            }
        })
    }

    function showDataPaktaIntegritas() {
        var no_reg = $(".pc-container").data("id");
        $.ajax({
            type:"GET",
            url: "<?= site_url('pelayanan/penawaran/detail-pakta-integritas'); ?>",
            dataType: 'json',
            cache: false,
            data:{no_reg:no_reg},
            beforeSend: function() {
                $('.show-pakta-integritas').html('<span class="fa-solid fa-spin fa-spinner"></span>');
            },
            complete: function() {
                $('.show-pakta-integritas').removeAttr('span');
            },
            success: function(response) {
                $(".show-pakta-integritas").html(response.data);
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + ' ' + xhr.responseText + ' ' + thrownError);
            }
        })
    }

    function showDataPelanggan() {
        var no_reg = $(".pc-container").data("id");
        $.ajax({
            type:"GET",
            url: "<?= site_url('pelayanan/penawaran/detail-pelanggan'); ?>",
            dataType: 'json',
            cache: false,
            data:{no_reg:no_reg},
            beforeSend: function() {
                $('.show-pelanggan').html('<span class="fa-solid fa-spin fa-spinner"></span>');
            },
            complete: function() {
                $('.show-pelanggan').removeAttr('span');
            },
            success: function(response) {
                $(".show-pelanggan").html(response.data);
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + ' ' + xhr.responseText + ' ' + thrownError);
            }
        })
    }

    function showDataRencanaAnggaranBiaya() {
        var no_reg = $(".pc-container").data("id");
        $.ajax({
            type:"GET",
            url: "<?= site_url('pelayanan/penawaran/detail-rencana-anggaran-biaya'); ?>",
            dataType: 'json',
            cache: false,
            data:{no_reg:no_reg},
            beforeSend: function() {
                $('.show-rencana-anggaran-biaya').html('<span class="fa-solid fa-spin fa-spinner"></span>');
            },
            complete: function() {
                $('.show-rencana-anggaran-biaya').removeAttr('span');
            },
            success: function(response) {
                $(".show-rencana-anggaran-biaya").html(response.data);
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + ' ' + xhr.responseText + ' ' + thrownError);
            }
        })
    }

    $(document).ready(function() {
        showDataSurat();
        showDataPaktaIntegritas();
        showDataPelanggan();
        showDataRencanaAnggaranBiaya();
    })
</script>
<?= $this->endSection(); ?>