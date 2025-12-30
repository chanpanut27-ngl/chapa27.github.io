<?php 
$page = '';
if (in_groups('Pelanggan')) {
    $page = 'Pelanggan';
}else{
    $page = 'Backend';
}
?>
<!-- [ Top ] start -->
<?= $this->include($page.'/Layout/_top'); ?>
<!-- [ Top ] end -->

<!-- [ Sidebar Menu ] start -->
<?= $this->include($page.'/Layout/_navbar'); ?>
<!-- [ Sidebar Menu ] end -->

<!-- [ Header Topbar ] start -->
<?= $this->include($page.'/Layout/_header'); ?>
<!-- [ Header ] end -->

<!-- [ Main Content ] start -->
<?= $this->renderSection('content', true); ?>
<!-- [ Main Content ] end -->
<?= $this->include('Component/_scroll_top'); ?>

<!-- [ Footer ] start -->
<?= $this->include($page.'/Layout/_footer'); ?>
<!-- [ Footer ] end -->

<!-- [ Bottom ] start -->
<?= $this->include($page.'/Layout/_bottom'); ?>
<!-- [ Bottom ] end -->
