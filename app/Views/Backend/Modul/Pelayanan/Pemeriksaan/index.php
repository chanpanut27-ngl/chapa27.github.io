oke<?= $this->extend('Pelanggan/Layout/_main'); ?>
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
                <div class="card">
                    <div class="card-header p-2">
                        <h4 style="font-family: arial;"><span class="pc-micon"><span class="fa-solid fa-list"></span> <?= $title; ?></h4>
                        <div class="d-flex justify-content-end align-items-center gap-1">
                            <button type="button" class="btn btn-secondary btn-sm rounded btn-refresh" title="Refresh data">
                                <span class="pc-micon"><span class="fa-solid fa-refresh"></span></span>
                            </button>
                            <a href="<?= base_url('pelayanan-sampel/data-permintaan') ?>" class="btn btn-success btn-sm btn-rounded" title="Kembali"><span class="fa-solid fa-arrow-left"></span></a>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary btn-sm rounded btn-tambah" data-id="<?= $id_pelanggan ?>" data-noreg="<?= $no_reg ?>">
                                <span class="pc-micon"><span class="fa-solid fa-plus-square"></span></span> Tambah Data
                            </button>
                        </div>
                    </div>
                    <div class="accordion accordion-flush accordion-color" id="accordionFlushExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="true" aria-controls="flush-collapseOne">
                                <h5><span class="pc-micon"><span class="fa-solid fa-user"></span> Data Pelanggan</h5>
                            </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body" style="border:1px solid;">
                                    <div class="row">
                                        <div class="col-sm-3"><b>No.Registrasi</b></div>
                                        <div class="col-sm-3">: <?= $items['no_reg'] ?></div>
                                        <div class="col-sm-3"><b>No.Telp/Hp</b></div>
                                        <div class="col-sm-3">: <?= $items['no_telp_pengirim'] ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3"><b>Nama pengirim</b></div>
                                        <div class="col-sm-3">: <?= $items['nama_pengirim'] ?></div>
                                        <div class="col-sm-3"><b>Tgl & jam pengambilan sampel</b></div>
                                        <div class="col-sm-3">: <?= date('d-m-Y', strtotime($items['tgl_ambil_sampel'])).' '.date('H:i', strtotime($items['jam_ambil_sampel'])) ?></div>
                                    </div>    
                                    <div class="row">
                                        <div class="col-sm-3"><b>Spesimen/sampel</b></div>
                                        <div class="col-sm-3">: <?= $items['spesimen_atau_sampel'] ?></div>
                                        <div class="col-sm-3"><b>Lokasi pengambilan sampel/spesimen	</b></div>
                                        <div class="col-sm-3">: <?= $items['lokasi_ambil_sampel'] ?></div>
                                    </div>  
                                    <div class="row">
                                        <div class="col-sm-3"><b>Petugas pengambilan sampel</b></div>
                                        <div class="col-sm-3">: <?= $items['spesimen_atau_sampel'] ?></div>
                                        <div class="col-sm-3"><b>Keterangan tambahan</b></div>
                                        <div class="col-sm-3">: <?= $items['keterangan_tambahan'] ?></div>
                                    </div>   
                                    <div class="row">
                                        <div class="col-sm-3"><b>Instansi</b></div>
                                        <div class="col-sm-9">: <?= $items['instansi'] ?></div>
                                    </div>                                
                                </div>
                            </div>
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