<?php
   /* Export excel */
    $routes->group('export-excel', function ($routes) {
        $routes->get('instalasi', 'ExportController::xls_instalasi');
        $routes->get('laboratorium', 'ExportController::xls_laboratorium');
        $routes->get('jenis-sampel', 'ExportController::xls_jenis_sampel');
        $routes->get('peraturan', 'ExportController::xls_peraturan');
    });