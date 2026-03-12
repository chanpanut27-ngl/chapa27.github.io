<?= $this->extend('Backend/Layout/__main'); ?>
<?= $this->section('content'); ?>
<div class="pc-container">
    <div class="pc-content">
      <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <!-- <div class="page-header-title">
                            <h5 class="m-b-10">Home</h5>
                        </div> -->
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active"><a href="javascript: void(0)">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
         <!-- [ Main Content ] start -->
        <div class="row p-0">
            <!-- [ sample-page ] start -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>
                            <i class="ti ti-home"></i> BBLKM Jakarta
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-xl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h6 class="mb-2 f-w-400 text-muted fw-bold">Total Permintaan</h6>
                                        <h4 class="mb-3">5 <span class="badge bg-light-primary border border-primary"><i class="ti ti-trending-up"></i> <?= 5/100 ?>%</span></h4>
                                        <p class="mb-0 text-muted text-sm">You made an extra <span class="text-primary">35,000</span> this year
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h6 class="mb-2 f-w-400 text-muted fw-bold">Total Permintaan</h6>
                                        <h4 class="mb-3">5 <span class="badge bg-light-primary border border-primary"><i class="ti ti-trending-up"></i> <?= 5/100 ?>%</span></h4>
                                        <p class="mb-0 text-muted text-sm">You made an extra <span class="text-primary">35,000</span> this year
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h6 class="mb-2 f-w-400 text-muted fw-bold">Total Permintaan</h6>
                                        <h4 class="mb-3">5 <span class="badge bg-light-primary border border-primary"><i class="ti ti-trending-up"></i> <?= 5/100 ?>%</span></h4>
                                        <p class="mb-0 text-muted text-sm">You made an extra <span class="text-primary">35,000</span> this year
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h6 class="mb-2 f-w-400 text-muted fw-bold">Total Permintaan</h6>
                                        <h4 class="mb-3">5 <span class="badge bg-light-primary border border-primary"><i class="ti ti-trending-up"></i> <?= 5/100 ?>%</span></h4>
                                        <p class="mb-0 text-muted text-sm">You made an extra <span class="text-primary">35,000</span> this year
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <!-- [ Main Content ] end -->
    </div>
</div>
<?= $this->endSection(); ?>
