<?php
    /* Pelanggan */
        $routes->group('/', ['filter' => 'role:pelanggan'], function ($routes) {
        $routes->get('', 'Pelanggan::index');
        $routes->get('dashboard', 'Pelanggan::dashboard');
    });
?>