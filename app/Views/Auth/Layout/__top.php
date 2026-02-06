<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Application BBLKM Jakarta made using Bootstrap 5 design framework">
    <meta name="keywords" content="Dashboard UI Kit, Bootstrap 5, Admin Template, Admin Dashboard, CRM, CMS, Bootstrap Admin Template">
    <meta name="author" content="Program Layanan BBLKM Jakarta">
    <?= $this->renderSection('title'); ?>
    
     <!-- [Shortcut Icon] -->
    <?= link_tag('assets/images/favicon.ico', 'shortcut icon', 'image/x-icon') ?>
     <!-- [Google Font] Family -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" id="main-font-link">
    <!-- [Tabler Icons] -->
    <?= link_tag('assets/fonts/tabler-icons.min.css'); ?>
    <!-- [Feather Icons] -->
    <?= link_tag('assets/fonts/feather.css'); ?>
    <!-- [Font Awesome Icons] -->
    <?= link_tag('assets/fonts/fontawesome.css'); ?>
    <!-- [Material Icons] -->
    <?= link_tag('assets/fonts/material.css'); ?>
    <!-- [Template CSS Files] -->
    <?= link_tag('assets/css/style.css'); ?>
    <!-- [Custom CSS] -->
    <?= link_tag('assets/css/custom.css'); ?>
    <!-- [Style Preset CSS Files] -->
    <?= link_tag('assets/css/style-preset.css'); ?>
</head>

<body class="login-container">
    <!-- [ Pre-loader ] Start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->