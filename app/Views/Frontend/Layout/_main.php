<!-- [ Top ] start -->
<?= $this->include('Frontend/Layout/_top'); ?>
<!-- [ Top ] end -->

<!-- [ Sidebar Menu ] start -->
<?= $this->include('Frontend/Layout/_navbar'); ?>
<!-- [ Sidebar Menu ] end -->

<!-- [ Header Topbar ] start -->
<?= $this->include('Frontend/Layout/_header'); ?>
<!-- [ Header ] end -->

<!-- [ Main Content ] start -->
<?= $this->renderSection('content', true); ?>
<!-- [ Main Content ] end -->

<!-- [ Footer ] start -->
<?= $this->include('Frontend/Layout/_footer'); ?>
<!-- [ Footer ] end -->

<!-- [ Bottom ] start -->
<?= $this->include('Frontend/Layout/_bottom'); ?>
<!-- [ Bottom ] end -->

