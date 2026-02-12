<?= $this->extend('Backend/Modul/Pelayanan/Lab/index'); ?>

<?= $this->section('content_menu'); ?>
<div class="row p-0">
            <!-- [ sample-page ] start -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header p-2">
                        <div class="d-flex justify-content-end align-items-center gap-1">
                            <button type="button" class="btn btn-secondary btn-sm rounded btn-refresh-data">
                                <span class="pc-micon"><span class="fa-solid fa-refresh"></span></span>
                            </button>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary btn-sm rounded btn-tambah" data-id="<?= $id_kat_lab; ?>" data-kode="<?= $kode_pengantar;?>">
                                <span class="pc-micon"><span class="fa-solid fa-plus-square"></span></span> Tambah Data
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5><?= $title; ?></h5>
                        <div class="view-data"></div>
                    </div>
                </div>
            </div>
            <!-- [ sample-page ] end -->
        </div>
<div class="view-modal" style="display: none;"></div>
<?= $this->endSection(); ?>

<?= $this->section('bottomAssets'); ?>
<script src="<?= base_url('assets/js/plugins/sweetalert2.all.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/custom.js'); ?>"></script>
<script>
    function listData() {
        var id_kat_lab = $('.btn-tambah').data("id");
        var kode_pengantar = $('.btn-tambah').data('kode');
        $.ajax({
            url: "<?= site_url('pelayanan/pengantar-lab/kaji-ulang-kontrak/list-data'); ?>",
            dataType: 'json',
            data:{
                 id_kat_lab:id_kat_lab,
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

        var id_kat_lab = $('.btn-tambah').data("id");
        var kode_pengantar = $('.btn-tambah').data('kode');
        $(".btn-tambah").click(function(e) {
            e.preventDefault();
            $.ajax({
                url: "<?= site_url('pelayanan/pengantar-lab/kaji-ulang-kontrak/add-data'); ?>",
                dataType: 'json',
                cache:false,
                data:{
                 id_kat_lab:id_kat_lab,
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