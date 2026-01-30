
<?= $this->extend('Backend/Layout/_main'); ?>
<?= $this->section('content'); ?>
<div class="pc-container">
    <div class="pc-content">
        <h4><?= $title; ?></h4>
        <object data="<?= base_url('File/Permenkes__No.2__2023.pdf') ?>" type="application/pdf" width="100%" height="600"></object>
    </div>
</div>
<?= $this->endSection(); ?>
