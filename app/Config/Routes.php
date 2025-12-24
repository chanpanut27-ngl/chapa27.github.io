<?php

use CodeIgniter\Router\RouteCollection;
use DeepCopy\f013\C;

/**
 * @var RouteCollection $routes
 */

/* Error Page 404 */
$routes->set404Override('App\Controllers\ErrorPage::show404');

/* Login */
$routes->group('/', function ($routes) {
    $routes->get('', 'User::index');
    $routes->get('dashboard', 'User::dashboard');
});

/* Admin */
$routes->group('/', ['filter' => 'role:admin'], function ($routes) {
    $routes->get('admin/index', 'Admin::index');
    $routes->get('dashboard', 'User::dashboard');
});