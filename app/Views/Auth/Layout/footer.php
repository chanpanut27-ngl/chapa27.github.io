<?php

use CodeIgniter\I18n\Time;
?>
<div class="auth-footer row">
<!-- <div class=""> -->
    <div class="col my-1">
        <p class="m-0">Copyright © <?= Time::now()->getYear() ?> <a href="#">Program Layanan BBLKM Jakarta</a></p>
    </div>
    <div class="col-auto my-1">
        <?= date('d-m-Y', strtotime(Time::now())); ?>
    </div>
<!-- </div> -->
</div>