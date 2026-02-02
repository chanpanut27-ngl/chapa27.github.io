<?php

use App\Models\PengantarLhuModel;
?>
<?= $this->extend('Backend/Modul/Pelayanan/Lhu/index'); ?>

<?= $this->section('topAssets'); ?>
<link rel="stylesheet" href="<?= base_url('assets/css/plugins/dataTables.bootstrap5.css'); ?>">
<!-- [Datepicker css] --> 
<link rel="stylesheet" href="https://code.jquery.com/ui/1.14.1/themes/base/jquery-ui.css">
<!-- [Select2 css] --> 
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<?= $this->endSection(); ?>

<?= $this->section('content_menu'); ?>
<?php 
$pengantar_lhu = new PengantarLhuModel();
$rest_ = $pengantar_lhu->where('kode_pengantar', $kode_pengantar)->first();
?>
    <div class="card">
        <div class="card-header p-2">
            <div class="d-flex justify-content-end align-items-center gap-1">    
                <button type="button" class="btn btn-secondary btn-sm rounded btn-refresh-data">
                    <span class="pc-micon"><span class="fa-solid fa-refresh"></span></span>
                </button>
                <a href="<?= base_url('pelayanan/pengantar-lhu') ?>" class="btn btn-success btn-sm btn-rounded" title="Kembali"><span class="fa-solid fa-arrow-circle-left"></span></a>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-warning btn-sm rounded btn-show-lab" onclick="showLab(<?= $rest_['id_pelanggan'] ?>);" title="Detail Lab">
                    <span class="fa-solid fa-eye"></span> Detail Lab. Pemeriksaan
                </button>
                <button type="button" class="btn btn-primary btn-sm rounded btn-tambah" data-id="<?= $id_lab; ?>" data-kode="<?= $kode_pengantar;?>">
                    <span class="pc-micon"><span class="fa-solid fa-plus-square"></span></span> Tambah Data
                </button>
            </div>
        </div>
        <div class="card-body p-2">
            <div class="view-data"></div>
        </div>
    </div>
<?= $this->endSection(); ?>

<?= $this->section('bottomAssets'); ?>
<script src="<?= base_url('assets/js/plugins/dataTables.js'); ?>"></script>
<script src="<?= base_url('assets/js/plugins/dataTables.bootstrap5.js'); ?>"></script>
<script src="<?= base_url('assets/js/plugins/dataTables.responsive.js'); ?>"></script>
<script src="<?= base_url('assets/js/plugins/sweetalert2.all.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/jquery-3.7.1.js'); ?>"></script>
<script src="<?= base_url('assets/js/custom.js'); ?>"></script>

<!-- [Datepicker js] -->
<script src="https://code.jquery.com/ui/1.14.1/jquery-ui.js"></script>
<!-- [Select2 js] -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    function listData() {
        var id_lab = $('.btn-tambah').data("id");
        var kode_pengantar = $('.btn-tambah').data('kode');
        $.ajax({
            url: "<?= site_url('pelayanan/pengantar-lhu/sampel-lingkungan/list-data'); ?>",
            dataType: 'json',
            cache: false,
            data:{
                 id_lab:id_lab,
                 kode_pengantar:kode_pengantar
            },
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
            url: '<?= site_url('pelayanan-sampel/data-pemeriksaan/detail-lab/'); ?>' + id,
            dataType: 'json',
            cache: false,
            beforeSend: function() {
                $('.btn-show-lab').attr('disable', 'disabled');
                $('.btn-show-lab').html('<i class="fa fa-spin fa-spinner"></i>');
            },
            complete: function() {
                $('.btn-show-lab').removeAttr('disable');
                $('.btn-show-lab').html('<span class="fa-solid fa-eye"></span> Detail Lab. Pemeriksaan');
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

        $(".btn-tambah").click(function(e) {
            e.preventDefault();
            var id_lab = $(this).data("id");
            var kode_pengantar = $(this).data('kode');
            $.ajax({
                url: "<?= site_url('pelayanan/pengantar-lhu/sampel-lingkungan/add-data'); ?>",
                dataType: 'json',
                cache: false,
                data:{
                    id_lab:id_lab,
                    kode_pengantar:kode_pengantar
                },
                beforeSend: function() {
                    $('.btn-tambah').attr('disable', 'disabled');
                    $('.btn-tambah').html('<span class="fa-solid fa-spin fa-spinner"></span>');
                    $('.invalid-feedback').html('<span class="fa-solid fa-spin fa-spinner"></span>');
                },
                complete: function() {
                    $('.btn-tambah').removeAttr('disable');
                    $('.btn-tambah').html('<span class="fa-solid fa-plus-square"></span> Tambah Data');
                },
                success: function(response) {
                    $(".view-modal").html(response.data).show();
                    $("#exampleModal").modal('show');
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            })
        })
    })
</script>

<?= $this->endSection(); ?>
