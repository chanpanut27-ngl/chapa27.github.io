<?php

/* Auth Groups Permissions */
$routes->group('master-data/auth-groups-permissions', function ($routes) {
    $routes->get('', 'AuthGroupsPermissionsMaster::index');
    $routes->get('list-data', 'AuthGroupsPermissionsMaster::list');
    $routes->get('add-data', 'AuthGroupsPermissionsMaster::new');
    $routes->post('create-data', 'AuthGroupsPermissionsMaster::create');
    $routes->get('edit-data/(:num)', 'AuthGroupsPermissionsMaster::edit/$1');
    $routes->post('update-data', 'AuthGroupsPermissionsMaster::update');
    $routes->get('delete-data', 'AuthGroupsPermissionsMaster::delete');
});

?>