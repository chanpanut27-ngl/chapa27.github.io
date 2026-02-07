<?php
/* Auth Permissions */
    $routes->group('master-data/auth-permissions', function ($routes) {
    $routes->get('', 'AuthPermissionsMaster::index');
    $routes->get('list-data', 'AuthPermissionsMaster::list');
    $routes->get('add-data', 'AuthPermissionsMaster::new');
    $routes->post('create-data', 'AuthPermissionsMaster::create');
    $routes->get('edit-data/(:num)', 'AuthPermissionsMaster::edit/$1');
    $routes->post('update-data', 'AuthPermissionsMaster::update');
    $routes->delete('delete-data/(:num)', 'AuthPermissionsMaster::delete/$1');
});
?>