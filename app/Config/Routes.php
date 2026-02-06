<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
/* Error Page 404 */
$routes->set404Override('App\Controllers\ErrorPage::show404');

$routes->get('not-privilege', 'NotEnoughPrivilege::show401');

/* Admin */
$routes->group('/', ['filter' => 'role:admin'], function ($routes) {
    $routes->get('', 'Admin::index');
    $routes->get('dashboard', 'User::dashboard');
});

