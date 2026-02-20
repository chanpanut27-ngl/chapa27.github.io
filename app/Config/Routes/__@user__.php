<?php
    $routes->group('/', ['filter' => 'role:user'], function ($routes) {
        $routes->get('', 'User::index');
        $routes->get('dashboard', 'User::dashboard');
    });
?>