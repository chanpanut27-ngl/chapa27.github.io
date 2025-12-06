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
                    <div class="card-header p-6">
                        <h4 style="font-family: calibri;"><span class="pc-micon"><span class="fa-solid fa-list"></span> <?= $title; ?></h4>
                        <div class="d-flex justify-content-end align-items-center gap-1">
                            <button type="button" class="btn btn-dark btn-sm" id="refBtn">
                                <span class="pc-micon"><i class="fa-solid fa-refresh"></i>
                            </button>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary btn-sm btn-tambah">
                                <span class="pc-micon"><i class="fa-solid fa-plus-square"></i> Tambah Data
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
<script src="<?= base_url('assets/js/plugins/sweetalert2@11.js'); ?>"></script>
<script>
    function listData() {
        $.ajax({
            url: "<?= site_url('master-data/laboratorium/list-data'); ?>",
            dataType: 'json',
            success: function(response) {
                $(".view-data").html(response.data);
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
            $.ajax({
                url: "<?= site_url('master-data/laboratorium/add-data'); ?>",
                dataType: 'json',
                cache: false,
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