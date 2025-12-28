
<div class="card-body p-0" style="text-align: center;">
    <?php
    foreach ($items as $rows) {
        $foto = $rows['user_image'];
    }
    if ($foto != 'default.svg') {
        $img = '<img src="'.base_url('Uploads/Foto/'.$foto).'" alt="" class="img-fluid img-foto">';
    }else{
        $img = '<img src="'.base_url('assets/images/default.svg').'" alt="" class="img-fluid">';
    }
    ?>
    <div class="mb-2 mt-3">
        <?php echo $img; ?>
    </div>
    <?php foreach ($profil as $rows) : ?>
    <div class="mb-2 mt-3">
        <label><b><?= $rows['instansi'] ?></b></label>
    </div>
    <div class="mb-2">
        <label><?= $rows['email'] ?></label>
    </div>
<?php endforeach;?>
</div>