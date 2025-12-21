<?php if (in_groups('admin')) : ?>
<!-- [ Top ] start -->
<?= $this->include('Backend/Layout/_top'); ?>
<!-- [ Top ] end -->

<!-- [ Sidebar Menu ] start -->
<?= $this->include('Backend/Layout/_navbar'); ?>
<!-- [ Sidebar Menu ] end -->

<!-- [ Header Topbar ] start -->
<?= $this->include('Backend/Layout/_header'); ?>
<!-- [ Header ] end -->

<!-- [ Main Content ] start -->
<?= $this->renderSection('content', true); ?>
<!-- [ Main Content ] end -->

<!-- [ Footer ] start -->
<?= $this->include('Backend/Layout/_footer'); ?>
<!-- [ Footer ] end -->

<!-- [ Bottom ] start -->
<?= $this->include('Backend/Layout/_bottom'); ?>
<!-- [ Bottom ] end -->

<?php else : ?>

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
 <?php endif;?>
