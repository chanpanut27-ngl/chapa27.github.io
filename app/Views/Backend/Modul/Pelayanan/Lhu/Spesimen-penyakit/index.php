<?= $this->extend('Backend/Modul/Pelayanan/Lhu/index'); ?>

<?= $this->section('topAssets'); ?>
<link rel="stylesheet" href="<?= base_url('assets/css/plugins/dataTables.bootstrap5.css'); ?>">
<!-- [Datepicker css] --> 
<link rel="stylesheet" href="https://code.jquery.com/ui/1.14.1/themes/base/jquery-ui.css">
<!-- [Select2 css] --> 
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<?= $this->endSection(); ?>

<?= $this->section('content_menu'); ?>
    <div class="card">
        <div class="card-header p-2">
            <div class="d-flex justify-content-end align-items-center gap-1">    
                <button type="button" class="btn btn-secondary btn-sm rounded btn-refresh-data">
                    <span class="pc-micon"><span class="fa-solid fa-refresh"></span></span>
                </button>
                <!-- Button trigger modal -->
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
<!-- [Datepicker js] -->
<script src="https://code.jquery.com/ui/1.14.1/jquery-ui.js"></script>
<!-- [Select2 js] -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    function listData() {
        var id_lab = $('.btn-tambah').data("id");
        var kode_pengantar = $('.btn-tambah').data('kode');
        $.ajax({
            url: "<?= site_url('pelayanan/lhu/sampel-lingkungan/list-data'); ?>",
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
                url: "<?= site_url('pelayanan/lhu/sampel-lingkungan/add-data'); ?>",
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
