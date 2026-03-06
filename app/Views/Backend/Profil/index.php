<?= $this->extend('Backend/Layout/__main'); ?>

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
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-header p-3">
                        <h4><span class="pc-micon"><span class="fa-solid fa-image"></span> Foto Profil</h4>
                    </div>
                    <div class="view-foto"></div>
                </div>
            </div>
            <div class="col-sm-9">
                <div class="card">
                    <div class="card-header p-3">
                        <h4><span class="pc-micon"><span class="fa-solid fa-user"></span> <?= $title; ?></h4>
                    </div>
                    <div class="card-body <?= $profil != null ? 'view-data' : '' ?>">
                    <?php if (!$profil) {
                           echo '<div class="alert alert-warning" role="alert">
                                    Silahkan lengkapi data profil anda
                                </div>';
                        }
                    ?>
                    <?php
                    if (!$profil) {
                        echo $this->include('Backend/Profil/__add');
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
<?= $this->endSection(); ?>

<?= $this->section('bottomAssets'); ?>
<script src="<?= base_url('assets/js/plugins/sweetalert2.all.min.js'); ?>"></script>

<script>
    function listData() {
        $.ajax({
            url: "<?= site_url('profil-pegawai/list-data'); ?>",
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

    function listFoto() {
        $.ajax({
            url: "<?= site_url('profil-pegawai/list-foto'); ?>",
            dataType: 'json',
            beforeSend: function() {
                $('.view-foto').html('<span class="fa-solid fa-spin fa-spinner"></span> Loading...');
                $('.invalid-feedback').html('<span class="fa-solid fa-spin fa-spinner"></span>');
            },
            complete: function() {
                $('.view-foto').removeAttr('<span class="fa-solid fa-spin fa-spinner"></span>');
            },
            success: function(response) {
                $(".view-foto").html(response.data);
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + ' ' + xhr.responseText + ' ' + thrownError);
            }
        })
    }

    $(document).ready(function() {
        listData();
        listFoto();

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
                            if (err.nama) {
                            $('#nama').addClass('is-invalid');
                            $('.errorNama').html(err.nama);
                        } else {
                            $('#nama').removeClass('is-invalid');
                            $('.errorNama').html('');
                        }
                        if (err.nik) {
                            $('#nik').addClass('is-invalid');
                            $('.errorNik').html(err.nik);
                        } else {
                            $('#nik').removeClass('is-invalid');
                            $('.errorNik').html('');
                        }
                        if (err.nip) {
                            $('#nip').addClass('is-invalid');
                            $('.errorNip').html(err.nip);
                        } else {
                            $('#nip').removeClass('is-invalid');
                            $('.errorNip').html('');
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
                        listFoto();
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + ' ' + xhr.responseText + ' ' + thrownError);
                }
            })
        });

    })
</script>
<?= $this->endSection(); ?>