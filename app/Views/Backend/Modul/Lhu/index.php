<?= $this->extend('Backend/Layout/__main'); ?>
<?= $this->section('topAssets'); ?>
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
                            <li class="breadcrumb-item"><a href="javascript: void(0)"><span class="badge rounded-pill bg-dark">Pelayanan</span></a></li>
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
                        <h4><span class="pc-micon"><i class="ti ti-search"></i> <?= $title; ?></h4>
                    </div>
                    <form action="<?= base_url('pelayanan/lembar-hasil-uji/search-data'); ?>" class="search-data">
                        <?= csrf_field(); ?>
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold" for="no-reg">No. Reg</label>
                                        <input type="text" name="no_reg" class="form-control" id="no-reg" placeholder="Masukkan no.reg ...">
                                        <div class="invalid-feedback errorNoReg"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer p-2">
                            <button type="submit" class="btn btn-primary btn-sm rounded btn-cari"><i class="ti ti-search"></i> Cari</button>
                            <button type="reset" class="btn btn-danger btn-sm rounded"><i class="ti ti-x"></i> Batal</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="card-body">
                    <div class="view-data"></div>
                </div>
            </div>
            <!-- [ sample-page ] end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>

<?= $this->endSection(); ?>

<?= $this->section('bottomAssets'); ?>
<script>
   
    $(document).ready(function() {

        $(".search-data").submit(function (e) {
            e.preventDefault();

            $.ajax({
                type: "POST",
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: 'json',
                cache: false,
                beforeSend: function() {
                    $('.btn-cari').attr('disable', 'disabled');
                    $('.btn-cari').html('<span class="fa-solid fa-spin fa-spinner"></span>');
                },
                success: function(response) {
                    var error = response.error;

                    if (error) {
                        
                            if (error.no_reg) {
                                $('#no-reg').addClass('is-invalid');
                                $('.errorNoReg').html(error.no_reg);
                            } else {
                                $('#no-reg').removeClass('is-invalid');
                                $('.errorNoReg').html('');
                            }
                            Swal.fire({
                                title: "Gagal",
                                text: response.error,
                                icon: "error",
                                timer: 2000,
                                width: '400px',
                                padding: '1em'
                            });
                            
                    } else {
                        $(".view-data").html(response.data);
                    }
                },
                complete: function() {
                    $('.view-data').removeAttr('span');
                    $('.btn-cari').removeAttr('disable');
                    $('.btn-cari').html('<i class="ti ti-search"></i> Cari');
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError + "\n" + ajaxOptions);
                }
            })

        })
    })
</script>
<?= $this->endSection(); ?>