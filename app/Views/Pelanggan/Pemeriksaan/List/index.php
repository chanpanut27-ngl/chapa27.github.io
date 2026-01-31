<?= $this->extend('Pelanggan/Layout/_main'); ?>
<?= $this->section('topAssets'); ?>
<link rel="stylesheet" href="<?= base_url('assets/css/plugins/dataTables.bootstrap5.css'); ?>">
<!-- [Datepicker css] --> 
<link rel="stylesheet" href="https://code.jquery.com/ui/1.14.1/themes/base/jquery-ui.css">
<!-- select2 -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

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
                <?php if (!$profil) : ?>
                    <?php  echo '<div class="alert alert-warning" role="alert">
                                    Silahkan lengkapi data profil anda
                                </div>'; ?>
                <?php else : ?>
                <div class="card">
                    <div class="card-header p-2">
                        <h4 style="font-family: arial;"><span class="pc-micon"><span class="fa-solid fa-list"></span> <?= $title; ?></h4>
                        <div class="d-flex justify-content-end align-items-center gap-1">
                            <button type="button" class="btn btn-secondary btn-sm rounded btn-refresh">
                                <span class="pc-micon"><span class="fa-solid fa-refresh"></span></span>
                            </button>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary btn-sm rounded btn-tambah" data-id="<?= $id_pelanggan ?>" data-noreg="<?= $no_reg ?>">
                                <span class="pc-micon"><span class="fa-solid fa-plus-square"></span></span> Tambah Data
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <td><b>No.Registrasi</b></td>
                                <td>: <?= $items['no_reg'] ?></td>
                                <td><b>No.Telp/Hp</b></td>
                                <td>: <?= $items['no_telp_pengirim'] ?></td>
                            </tr>
                            <tr>
                                <td><b>Nama pengirim</b></td>
                                <td>: <?= $items['nama_pengirim'] ?></td>
                                <td><b>Tgl & jam pengambilan</b></td>
                                <td>: <?= date('d-m-Y', strtotime($items['tgl_ambil_sampel'])).' '.date('H:i', strtotime($items['jam_ambil_sampel'])) ?></td>
                            </tr>
                            <tr>
                                <td><b>Spesimen/sampel</b></td>
                                <td>: <?= $items['spesimen_atau_sampel'] ?></td>
                                <td><b>Lokasi pengambilan sampel/spesimen</b></td>
                                <td>: <?= $items['lokasi_ambil_sampel'] ?></td>
                            </tr>
                            <tr>
                                <td><b>Petugas ambil sampel</b></td>
                                <td>: <?= $items['petugas_ambil_sampel'] ?></td>
                                <td><b>Keterangan tambahan</b></td>
                                <td>: <?= $items['keterangan_tambahan'] ?></td>
                            </tr>
                        </table>
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
<script src="<?= base_url('assets/js/plugins/sweetalert2.all.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/custom.js'); ?>"></script>
<!-- [Datepicker js] -->
<script src="https://code.jquery.com/ui/1.14.1/jquery-ui.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    function listData() {
        $.ajax({
            url: "<?= site_url('pelanggan/list-pemeriksaan/list-data'); ?>",
            dataType: 'json',
            success: function(response) {
                $(".view-data").html(response.data);
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + ' ' + xhr.responseText + ' ' + thrownError);
            }
        })
    }

     $("#selectAll").change(function(){
        $(".checkbox").prop('checked', $(this).prop("checked"));
    });

    function toggle(source) {
        checkboxes = document.getElementsByClassName('checkbox');
        for (var i = 0; i < checkboxes.length; i++) {
            checkboxes[i].checked = source.checked;
        }
    }

    $(document).ready(function() {
        listData();

        $(".btn-tambah").click(function(e) {
            e.preventDefault();
            var id_pelanggan = $(this).data("id");
            var no_reg = $(this).data("noreg");
            $.ajax({
                url: "<?= site_url('pelanggan/list-pemeriksaan/add-data'); ?>",
                dataType: 'json',
                data: {id_pelanggan:id_pelanggan, no_reg:no_reg},
                cache: false,
                beforeSend: function() {
                    $('.btn-tambah').html('<span class="fa-solid fa-spin fa-spinner"></span>');
                },
                complete: function() {
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