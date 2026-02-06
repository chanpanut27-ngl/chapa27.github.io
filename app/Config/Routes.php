<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
/* Admin */
$routes->group('/', ['filter' => 'role:admin'], function ($routes) {
    $routes->get('', 'Admin::index');
    $routes->get('dashboard', 'User::dashboard');
});

