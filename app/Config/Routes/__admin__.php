<?php
    $routes->group('/', ['filter' => 'role:admin'], function ($routes) {
        $routes->get('', 'Admin::index');
        $routes->get('dashboard', 'User::dashboard');
    });
?>