<?php
    $routes->group('/', function ($routes) {
        $routes->get('', 'Admin::index');
        $routes->get('dashboard', 'User::dashboard');
    });
?>