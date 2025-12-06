<?= $this->extend('Backend/Modul/Pelayanan-pemeriksaan/Lhu/index'); ?>
<?= $this->section('topAssets'); ?>
<link rel="stylesheet" href="<?= base_url('assets/css/plugins/dataTables.bootstrap5.css'); ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/plugins/select2.min.css'); ?>" id="main-style-link">
<link rel="stylesheet" href="<?= base_url('assets/css/plugins/jquery-ui.css'); ?>">
<?= $this->endSection(); ?>

<?= $this->section('content_menu'); ?>
    <div class="card">
        <div class="card-header p-2">
            <div class="d-flex justify-content-end align-items-center gap-1">    
                <button type="button" class="btn btn-dark btn-sm" id="refBtn">
                    <span class="pc-micon"><i class="fa-solid fa-refresh"></i>
                </button>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary btn-sm btn-tambah" data-id="<?= $id_lab; ?>" data-kode="<?= $kode_pengantar;?>">
                    <span class="pc-micon"><i class="fa-solid fa-plus-square"></i> Tambah Data
                </button>
            </div>
        </div>
        <div class="card-body p-4">
            <div class="view-data"></div>
        </div>
    </div>
<?= $this->endSection(); ?>

<?= $this->section('bottomAssets'); ?>
<script src="<?= base_url('assets/js/plugins/dataTables.js'); ?>"></script>
<script src="<?= base_url('assets/js/plugins/dataTables.bootstrap5.js'); ?>"></script>
<script src="<?= base_url('assets/js/plugins/dataTables.responsive.js'); ?>"></script>
<script src="<?= base_url('assets/js/plugins/sweetalert2@11.js'); ?>"></script>
<script src="<?= base_url('js/jquery-3.7.1.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/plugins/select2.min.js'); ?>"></script>
<script src="https://code.jquery.com/ui/1.14.1/jquery-ui.js"></script>
<script>
    function listData() {
        var id_lab = $('.btn-tambah').data("id");
        var kode_pengantar = $('.btn-tambah').data('kode');
        $.ajax({
            url: "<?= site_url('pelayanan-pemeriksaan/lhu/sampel-lingkungan/list-data'); ?>",
            dataType: 'json',
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


    $(document).ready(function() {
        listData();

        $(".btn-tambah").click(function(e) {
            e.preventDefault();
            var id_lab = $(this).data("id");
            var kode_pengantar = $(this).data('kode');
            $.ajax({
                url: "<?= site_url('pelayanan-pemeriksaan/lhu/sampel-lingkungan/add-data'); ?>",
                dataType: 'json',
                data:{
                    id_lab:id_lab,
                    kode_pengantar:kode_pengantar
                },
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
