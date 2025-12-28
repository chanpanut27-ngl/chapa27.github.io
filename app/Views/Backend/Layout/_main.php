<?php 
$page = '';

if (in_groups('superadmin')) {
    $page = 'Backend';
} else if (in_groups('admin')) {
    $page = 'Backend';
} else if (in_groups('user')) {
    $page = 'Backend';
} else if (in_groups('pelanggan')) {
    $page = 'Pelanggan';
} else {
    $page = 'Pelanggan';
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
