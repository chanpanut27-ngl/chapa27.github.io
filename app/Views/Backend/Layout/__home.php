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
    </div>
</div>
<?= $this->endSection(); ?>
