
<?= $this->extend('Backend/Layout/_main'); ?>
<?= $this->section('content'); ?>
<div class="pc-container">
    <div class="pc-content">
        <h4><?= $title; ?></h4>
        <object data="<?= base_url('File/Permenkes__No.7__2019__AAMI.pdf') ?>" type="application/pdf" width="100%" height="600"></object>
    </div>
</div>
<?= $this->endSection(); ?>

