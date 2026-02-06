<?php 
$page = '';
if (in_groups('pelanggan')) {
    $page = 'Pelanggan';
} else{
    $page = 'Backend';
}
?>
<!-- [ Top ] start -->
<?= $this->include($page.'/Layout/__top'); ?>
<!-- [ Top ] end -->

<!-- [ Sidebar Menu ] start -->
<?= $this->include($page.'/Layout/__navbar'); ?>
<!-- [ Sidebar Menu ] end -->

<!-- [ Header Topbar ] start -->
<?= $this->include($page.'/Layout/__header'); ?>
<!-- [ Header ] end -->

<!-- [ Main Content ] start -->
<?= $this->renderSection('content'); ?>
<!-- [ Main Content ] end -->
<?= $this->include('Component/_scroll_top'); ?>

<!-- [ Footer ] start -->
<?= $this->include($page.'/Layout/__footer'); ?>
<!-- [ Footer ] end -->

<!-- [ Bottom ] start -->
<?= $this->include($page.'/Layout/__bottom'); ?>
<!-- [ Bottom ] end -->

