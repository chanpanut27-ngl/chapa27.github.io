<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Mantis is made using Bootstrap 5 design framework. Download the free admin template & use it for your project.">
    <meta name="keywords" content="Mantis, Dashboard UI Kit, Bootstrap 5, Admin Template, Admin Dashboard, CRM, CMS, Bootstrap Admin Template">
    <meta name="author" content="CodedThemes">
    <!-- [Favicon] icon -->
    <?= link_tag(base_url('assets/images/favicon.ico'), 'shortcut icon', 'image/x-icon'); ?>
    <!-- [Google Font] Family -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" id="main-font-link">
    <!-- [Tabler Icons] https://tablericons.com -->
    <?= link_tag('assets/fonts/tabler-icons.min.css'); ?>
    <!-- [Feather Icons] https://feathericons.com -->
    <?= link_tag('assets/fonts/feather.css'); ?>
    <!-- [Font Awesome Icons] https://fontawesome.com/icons -->
    <?= link_tag('assets/fonts/fontawesome.css'); ?>
    <!-- [Material Icons] https://fonts.google.com/icons -->
    <?= link_tag('assets/fonts/material.css'); ?>
    <!-- [Template CSS Files] -->
    <?= link_tag('assets/css/style.css'); ?>
    <!-- [Custom CSS] -->
    <?= link_tag('assets/css/custom.css'); ?>
    <!-- [Style Preset CSS Files] -->
    <?= link_tag('assets/css/style-preset.css'); ?>


    <title>Document</title>
</head>
<body>
    <!-- [ Pre-loader ] start -->
  <div class="loader-bg">
        <div class="loader-track">
        <div class="loader-fill"></div>
        </div>
  </div>
  <!-- [ Pre-loader ] End -->
<?= $this->renderSection('content'); ?>

<!-- Required Js -->
<script src="<?= base_url('assets/js/plugins/popper.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/plugins/simplebar.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/plugins/bootstrap.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/fonts/custom-font.js'); ?>"></script>
<script src="<?= base_url('assets/js/fonts/custom-ant-icon.js'); ?>"></script>
<script src="<?= base_url('assets/js/pcoded.js'); ?>"></script>
<script src="<?= base_url('assets/js/plugins/feather.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/fontawesome.v6.3.0.all.js'); ?>"></script>
<script src="<?= base_url('assets/js/jquery-3.7.1.js'); ?>"></script>
  
  
<script>layout_change('light');</script>
<script>change_box_container('false');</script>
<script>layout_rtl_change('false');</script>
<script>preset_change("preset-1");</script>
<script>font_change("Public-Sans");</script>
  
</body>
</html>