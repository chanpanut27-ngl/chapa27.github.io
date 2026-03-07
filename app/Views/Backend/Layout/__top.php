<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Application BBLKM Jakarta made using Bootstrap 5 design framework">
    <meta name="keywords" content="Dashboard UI Kit, Bootstrap 5, Admin Template, Admin Dashboard, CRM, CMS, Bootstrap Admin Template">
    <meta name="author" content="Program Layanan BBLKM Jakarta">
    <title><?= $title ?></title>
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
    <!-- [Style Preset CSS Files] -->
    <?= link_tag('assets/css/style-preset.css'); ?>
    <!-- [Custom CSS] -->
    <?= link_tag('assets/css/custom.css'); ?>
    <!-- [Timeline CSS] -->
    <?= link_tag('assets/css/timeline.css'); ?>
    <!-- [topAssets] start -->
    <?= $this->renderSection('topAssets'); ?>
    <!-- [topAssets] end -->
     <style>
        html {scroll-behavior: smooth;}
     </style>
</head>
<!-- [Head] end -->
<!-- [Body] Start -->

<body data-pc-preset="preset-1" data-pc-direction="ltr" data-pc-theme="light">
<!-- [ Pre-loader ] start -->
<div class="loader-bg">
    <div class="loader-track">
        <div class="loader-fill"></div>
    </div>
</div>