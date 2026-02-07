<?php

/* Auth Groups Users */
    $routes->group('master-data/auth-groups-users', function ($routes) {
    $routes->get('', 'AuthGroupsUsersMaster::index');
    $routes->get('list-data', 'AuthGroupsUsersMaster::list');
    $routes->get('add-data', 'AuthGroupsUsersMaster::new');
    $routes->post('create-data', 'AuthGroupsUsersMaster::create');
    $routes->get('edit-data/(:num)', 'AuthGroupsUsersMaster::edit/$1');
    $routes->post('update-data', 'AuthGroupsUsersMaster::update');
    $routes->get('delete-data', 'AuthGroupsUsersMaster::delete');
});

?>