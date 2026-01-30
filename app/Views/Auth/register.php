<?= $this->extend('Auth/Layout/index'); ?>
<?= $this->section('title'); ?>
<title><?= lang('Auth.register'); ?></title>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="auth-main">
    <div class="auth-wrapper v3">
        <div class="auth-form">
        <div class="auth-header">
            <a href="#"><img src="<?= base_url('assets/images/logo.webp') ?>" alt="img" class="img-fluid" style="height: 50px;"></a>
        </div>
        <div class="card my-5">
            <div class="card-body">
            <div class="d-flex justify-content-between align-items-end mb-4">
                <h3 class="mb-0"><b><span class="fa-solid fa-user-plus"></span> <?=lang('Auth.register')?></b></h3>
                <a href="<?= base_url('login') ?>" class="link-primary">Sudah punya akun ?</a>
            </div>
            <?= view('Myth\Auth\Views\_message_block') ?>
            <form action="<?= url_to('register') ?>" method="post">
            <?= csrf_field() ?>
            <!-- <div class="row">
                <div class="col-md-6">
                <div class="form-group mb-3">
                    <label class="form-label">First Name*</label>
                    <input type="text" class="form-control" placeholder="First Name">
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group mb-3">
                    <label class="form-label">Last Name</label>
                    <input type="text" class="form-control" placeholder="Last Name">
                </div>
                </div>
            </div> -->
            <div class="form-group mb-3">
                <label for="email" class="form-label"><?=lang('Auth.email')?></label>
                <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>"
                name="email" aria-describedby="emailHelp" placeholder="<?=lang('Auth.email')?>" value="<?= old('email') ?>">
                <small id="emailHelp" class="form-text text-muted"><?=lang('Auth.weNeverShare')?></small>
            </div>
            <div class="form-group mb-3">
                <label for="username" class="form-label"><?=lang('Auth.username')?></label>
                <input type="text" class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" placeholder="<?=lang('Auth.username')?>" value="<?= old('username') ?>">
            </div>
            <div class="form-group mb-3">
                <label for="password" class="form-label"><?=lang('Auth.password')?></label>
                <input type="password" name="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?=lang('Auth.password')?>" autocomplete="off">
            </div>
            <div class="form-group mb-3">
                <label for="pass_confirm" class="form-label"><?=lang('Auth.repeatPassword')?></label>
                <input type="password" name="pass_confirm" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="<?=lang('Auth.repeatPassword')?>" autocomplete="off">
            </div>
            <div class="d-grid mt-3">
                <button type="submit" class="btn btn-primary"><?=lang('Auth.register')?></button>
            </div>
            </form>
            <div class="saprator mt-3">
                
            </div>
            <div class="row">
                
            </div>
            
            </div>
        </div>
            <?= $this->include('Auth/Layout/footer') ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
