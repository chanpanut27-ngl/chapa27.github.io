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
                            <h2 class="mb-0"><b><span class="fa-solid fa-user"></span> <?=lang('Auth.loginTitle')?></b></h2>
                            <a href="<?= base_url('register') ?>" class="link-primary">Belum punya akun ?</a>
                        </div>
    					<?= view('Myth\Auth\Views\_message_block') ?>
                        <form action="<?= url_to('login') ?>" method="post">
						<?= csrf_field() ?>
                        <?php if ($config->validFields === ['email']): ?>
                        <div class="form-group mb-3">
                        <label for="login" class="form-label"><?=lang('Auth.email')?></label>
                        <input type="email" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>"
								   name="login" placeholder="<?=lang('Auth.email')?>">
							<div class="invalid-feedback">
								<?= session('errors.login') ?>
							</div>
                        </div>
                        <?php else : ?>
                        <div class="form-group mb-3">
                        <label for="login" class="form-label"><?=lang('Auth.emailOrUsername')?></label>
                       <input type="text" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>"
								   name="login" placeholder="<?=lang('Auth.emailOrUsername')?>">
							<div class="invalid-feedback">
								<?= session('errors.login') ?>
							</div>
                        </div>
                        <?php endif; ?>
                        <div class="form-group mb-3">
                        <label for="password" class="form-label"><?=lang('Auth.password')?></label>
                        <input type="password" name="password" class="form-control  <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?=lang('Auth.password')?>">
							<div class="invalid-feedback">
								<?= session('errors.password') ?>
							</div>
                        </div>
                        <div class="d-flex mt-1 justify-content-between">
                        <?php if ($config->allowRemembering): ?>
                        <div class="form-check">
							<label class="form-check-label">
                            <input type="checkbox" name="remember" class="form-check-input" <?php if (old('remember')) : ?> checked <?php endif ?>>
							<?=lang('Auth.rememberMe')?>
                            </label>
                        </div>
                        <?php endif;?>
                        <h5 class="text-secondary f-w-400">Lupa password ?</h5>
                        </div>
                        <div class="d-grid mt-4">
                        <button type="submit" class="btn btn-primary"><?=lang('Auth.loginAction')?></button>
                        </div>
                        </form>
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
