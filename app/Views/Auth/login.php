

<?= $this->extend('Auth/Layout/index'); ?>
<?= $this->section('content'); ?>
<!-- [ Main Content ] start -->
  <div class="auth-main">
        <div class="auth-wrapper v3">
            <div class="auth-form">
                <div class="auth-header">
                    <a href="#"><img src="<?= base_url('assets/images/logo.webp') ?>" alt="img" class="img-fluid" style="height: 50px;"></a>
                </div>
                <div class="card my-5">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-end mb-4">
                        <h3 class="mb-0"><b><span class="fa-solid fa-user"></span> Login</b></h3>
                        <a href="" class="link-primary">Belum punya akun ?</a>
                        </div>
                        <div class="form-group mb-3">
                        <label class="form-label">Email Address</label>
                        <input type="email" class="form-control" placeholder="Email Address">
                        </div>
                        <div class="form-group mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="d-flex mt-1 justify-content-between">
                        <div class="form-check">
                            <input class="form-check-input input-primary" type="checkbox" id="customCheckc1" checked="">
                            <label class="form-check-label text-muted" for="customCheckc1">Keep me sign in</label>
                        </div>
                        <h5 class="text-secondary f-w-400">Lupa password ?</h5>
                        </div>
                        <div class="d-grid mt-4">
                        <button type="button" class="btn btn-primary">Login</button>
                        </div>
                        <div class="saprator mt-3">
                        </div>
                    </div>
                </div>
                <?= $this->include('Auth/Layout/footer') ?>
            </div>
        </div>
  </div>
<!-- [ Main Content ] end -->
 <?= $this->endSection(); ?>
