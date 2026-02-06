<?php
    $routes->group('/', function ($routes) {
        $routes->get('', 'User::index');
        $routes->get('dashboard', 'User::dashboard');
    });
?>