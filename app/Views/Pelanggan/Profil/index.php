<?= $this->extend('Pelanggan/Layout/_main'); ?>
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
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Data</a></li>
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
                    <div class="card-header bg-light p-2">
                        <h4 style="font-family: arial;"><span class="pc-micon"><span class="fa-solid fa-user"></span> <?= $title; ?></h4>
                    </div>
                    <div class="card-body <?= $profil_pelanggan != null ? 'view-data' : '' ?>">
                    <?php if (!$profil_pelanggan) {
                        echo $this->include('Content/_profil');
                        }
                    ?>
                    <?php
                    if (!$profil_pelanggan) {
                         echo $this->include('Pelanggan/Profil/_add');
                    }
                    ?>
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


<script>
    function listData() {
        $.ajax({
            url: "<?= site_url('pelanggan/profil/list-data'); ?>",
            dataType: 'json',
            beforeSend: function() {
                $('.view-data').html('<span class="fa-solid fa-spin fa-spinner"></span> Loading...');
                $('.invalid-feedback').html('<span class="fa-solid fa-spin fa-spinner"></span>');
            },
            complete: function() {
                $('.view-data').removeAttr('<span class="fa-solid fa-spin fa-spinner"></span>');
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

        $(".form-data").submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "post",
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: 'json',
                cache: false,
                beforeSend: function() {
                    $('.btn-simpan').attr('disable', 'disabled');
                    $('.btn-simpan').html('<i class="fa fa-spin fa-spinner"></i>');
                    $('.invalid-feedback').html('<i class="fa fa-spin fa-spinner"></i>');
                },
                complete: function() {
                    $('.card-body').addClass('view-data');
                    $('.btn-simpan').removeAttr('disable');
                    $('.btn-simpan').html('<i class="fas fa-save"></i> Simpan');
                },
                success: function(response) {
                    var err = response.error
                    if (err) {
                        if (err.instansi) {
                            $('#nama-instansi').addClass('is-invalid');
                            $('.errorNamaInstansi').html(err.instansi);
                        } else {
                            $('#nama-instansi').removeClass('is-invalid');
                            $('.errorNamaInstansi').html('');
                        }
                        if (err.alamat) {
                            $('#alamat').addClass('is-invalid');
                            $('.errorAlamat').html(err.alamat);
                        } else {
                            $('#alamat').removeClass('is-invalid');
                            $('.errorAlamat').html('');
                        }
                        if (err.no_telp) {
                            $('#no-telp').addClass('is-invalid');
                            $('.errorNoTelp').html(err.no_telp);
                        } else {
                            $('#no-telp').removeClass('is-invalid');
                            $('.errorNoTelp').html('');
                        }
                    } else {
                        Swal.fire({
                            title: "Berhasil",
                            text: response.sukses,
                            icon: "success"
                        });
                        listData();
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + ' ' + xhr.responseText + ' ' + thrownError);
                }
            })
        })

    })
</script>
<?= $this->endSection(); ?>