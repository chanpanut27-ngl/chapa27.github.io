<div class="card">
    <div class="card-header bg-light p-2">
        <h4 style="font-family: arial;"><span class="pc-micon"><span class="fa-solid fa-user"></span> <?= $title; ?></h4>
    </div>
        <div class="card-body" style="text-align: center;">
        <?php foreach ($profil as $rows) : ?>
        <?php if ($rows['foto'] != null) {
            ?>
        <img src="<?= base_url('assets/images/user-1.jpg'); ?>" alt="" class="img-fluid img-circle">
        <?php } else {
            ?>
        <img src="<?= base_url('assets/images/default.svg'); ?>" alt="" class="img-fluid img-circle">

        <?php
            }
            ?>
        <div class="mb-2 mt-3">
            <label><b><?= $rows['nama'] ?></b></label>
        </div>
        <div class="mb-2">
            <label><?= $rows['nip'] ?></label>
        </div>
        <?php endforeach;?>
    </div>
</div>