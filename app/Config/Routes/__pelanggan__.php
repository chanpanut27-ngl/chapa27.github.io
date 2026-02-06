<?php
    /* Pelanggan */
    $routes->group('/', function ($routes) {
        $routes->get('', 'Pelanggan::index');
        $routes->get('dashboard', 'Pelanggan::dashboard');
    });
?>