<?= $this->extend('Backend/Modul/Pelayanan-pemeriksaan/Lhu/index'); ?>

<?= $this->section('content_menu'); ?>
<div class="row p-0">
            <!-- [ sample-page ] start -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header p-6" style="padding:0px;">
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
                    <div class="card-body">
                        <div class="view-data"></div>
                    </div>
                </div>
            </div>
            <!-- [ sample-page ] end -->
        </div>
<div class="view-modal" style="display: none;"></div>
<?= $this->endSection(); ?>

<?= $this->section('bottomAssets'); ?>
<script src="<?= base_url('assets/js/plugins/sweetalert2@11.js'); ?>"></script>
<script>
    function listData() {
        var id_lab = $('.btn-tambah').data("id");
        var kode_pengantar = $('.btn-tambah').data('kode');
        $.ajax({
            url: "<?= site_url('pelayanan-pemeriksaan/kaji-ulang-permintaan-kontrak/list-data'); ?>",
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
        var id_lab = $('.btn-tambah').data("id");
        var kode_pengantar = $('.btn-tambah').data('kode');
        $(".btn-tambah").click(function(e) {
            e.preventDefault();
            $.ajax({
                url: "<?= site_url('pelayanan-pemeriksaan/kaji-ulang-permintaan-kontrak/add-data'); ?>",
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