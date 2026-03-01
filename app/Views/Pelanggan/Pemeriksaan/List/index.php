<?= $this->extend('Pelanggan/Layout/__main'); ?>
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
                <?php if (!$profil) : ?>
                    <?php  echo '<div class="alert alert-warning" role="alert">
                                    Silahkan lengkapi data profil anda
                                </div>'; ?>
                <?php else : ?>
                <div class="card">
                    <div class="card-header p-2">
                        <div class="d-flex justify-content-end align-items-center gap-1">
                            <a href="<?= base_url('pelanggan/pelayanan/pemeriksaan') ?>" class="btn bg-gray-400 btn-sm rounded" title="Kembali">
                                <i class="fa-solid fa-arrow-circle-left"></i>
                            </a>
                            <button type="button" class="btn btn-success btn-sm rounded btn-refresh-data">
                                <span class="pc-micon"><i class="ti ti-refresh"></i></span>
                            </button>
                            <button type="button" class="btn btn-danger btn-sm rounded" onclick="deleteAllDataPemeriksaan(<?= $items['id']; ?>)" title="Hapus data">
                                <i class="fa-solid fa-undo"></i> Batal pemeriksaan
                            </button>
                        </div>
                    </div>
                    <div class="accordion accordion-flush accordion-color" id="accordionFlushExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                            <button class="accordion-button bg-green-100 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="true" aria-controls="flush-collapseOne">
                                <h5><span class="pc-micon"><span class="fa-solid fa-user"></span> Data Pelanggan</h5>
                            </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <div class="row">
                                        <div class="col-sm-3"><b>No.Registrasi</b></div>
                                        <div class="col-sm-3">: <?= $items['no_reg'] ?></div>
                                        <div class="col-sm-2"><b>Instansi</b></div>
                                        <div class="col-sm-4">: <?= $items['instansi'] ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3"><b>Nama pengirim</b></div>
                                        <div class="col-sm-3">: <?= $items['nama_pengirim'] ?></div>
                                        <div class="col-sm-2"><b>No.Telp/Hp pengirim</b></div>
                                        <div class="col-sm-3">: <?= $items['no_telp_pengirim'] ?></div>
                                    </div>    
                                    <div class="row">
                                        <div class="col-sm-3"><b>Spesimen/sampel</b></div>
                                        <div class="col-sm-3">: <?= $items['spesimen_atau_sampel'] ?></div>
                                        <div class="col-sm-2"><b>Alamat</b></div>
                                        <div class="col-sm-4">: <?= $items['alamat'] ?></div>
                                    </div>                  
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header p-2">
                            <div class="d-flex justify-content-end align-items-center gap-1">
                                <button type="button" class="btn btn-info btn-sm rounded btn-show-lab" onclick="showPemeriksaanSampel(<?= $items['id']; ?>)" title="Jenis sampel">
                                <i class="ti ti-clipboard"></i> Jenis sampel</button>
                                <!-- Button trigger modal -->
                                 <button type="button" class="btn btn-primary btn-sm rounded btn-tambah" data-id="<?= $items['id'] ?>" data-noreg="<?= $items['no_reg'] ?>">
                                    <span class="pc-micon"><i class="ti ti-square-plus"></i></span> Tambah Data
                                </button>
                            </div>
                        </div>
                        <div class="card-header p-2">
                            <h4><span class="pc-micon"><i class="ti ti-list"></i> <?= $title; ?></h4>
                        </div>
                        <div class="card-body">
                            <div class="view-data"></div>
                        </div>
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
<script src="<?= base_url('assets/js/custom.js'); ?>"></script>
<!-- [Datepicker js] -->
<script src="https://code.jquery.com/ui/1.14.1/jquery-ui.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    function listData() {
        var id_pelanggan = $(".btn-tambah").data("id");
        $.ajax({
            type:"GET",
            url: "<?= site_url('pelanggan/pelayanan/list-pemeriksaan/list-data'); ?>",
            dataType: 'json',
            cache: false,
            cache: false,
            beforeSend: function() {
                $('.view-data').html('<span class="fa-solid fa-spin fa-spinner"></span>');
            },
            complete: function() {
                $('.view-data').removeAttr('span');
            },
            data:{id_pelanggan:id_pelanggan},
            success: function(response) {
                $(".view-data").html(response.data);
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + ' ' + xhr.responseText + ' ' + thrownError);
            }
        })
    }

    function showPemeriksaanSampel(id) {
        
        $.ajax({
            type: 'GET',
            url: '<?= site_url('pelanggan/pelayanan/pemeriksaan/show-permintaan-sampel/'); ?>' + id,
            dataType: 'json',
            cache: false,
            beforeSend: function() {
                $('.btn-show-lab').attr('disable', 'disabled');
                $('.btn-show-lab').html('<i class="fa fa-spin fa-spinner"></i>');
            },
            complete: function() {
                $('.btn-show-lab').removeAttr('disable');
                $('.btn-show-lab').html('<i class="ti ti-clipboard"></i> Jenis sampel');
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

    $("#selectAll").change(function(){
        $(".checkbox").prop('checked', $(this).prop("checked"));
    });

    function toggle(source) {
        checkboxes = document.getElementsByClassName('checkbox');
        for (var i = 0; i < checkboxes.length; i++) {
            checkboxes[i].checked = source.checked;
        }
    }

    function deleteAllDataPemeriksaan(id) {
        var myElement = $('#myId-' + id);
        if (myElement.data('urut')) {
            myElement.addClass('bg bg-danger');
        }
        Swal.fire({
            title: "Yakin untuk menghapus data ?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, Hapus!",
            cancelButtonText: "Tidak",
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: 'get',
                    url: '<?= site_url('pelanggan/pelayanan/pemeriksaan/delete-all-data/'); ?>' + id,
                    dataType: 'json',
                    success: function(response) {
                        if (response.sukses) {
                            Swal.fire({
                                title: "Hapus Data !",
                                text: response.sukses,
                                icon: "success",
                                timer: 2000,
                                width: '400px',
                                padding: '1em'
                            }).then((result) => {
                                if (result.dismiss === Swal.DismissReason.timer) {
                                   listData();
                                }
                            });
                            listData();
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        alert(xhr.status + ' ' + xhr.responseText + ' ' + thrownError);
                    }
                })
            } else {
                myElement.removeClass('bg bg-danger');
            }
        });
    }

    $(document).ready(function() {
        listData();

        $(".btn-tambah").click(function(e) {
            e.preventDefault();
            var id_pelanggan = $(this).data("id");
            var no_reg = $(this).data("noreg");
            $.ajax({
                url: "<?= site_url('pelanggan/pelayanan/list-pemeriksaan/add-data'); ?>",
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