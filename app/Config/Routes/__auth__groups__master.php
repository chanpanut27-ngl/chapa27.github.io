<?php
/* Auth Groups */
    $routes->group('master-data/auth-groups', function ($routes) {
    $routes->get('', 'AuthGroupsMaster::index');
    $routes->get('list-data', 'AuthGroupsMaster::list');
    $routes->get('add-data', 'AuthGroupsMaster::new');
    $routes->post('create-data', 'AuthGroupsMaster::create');
    $routes->get('edit-data/(:num)', 'AuthGroupsMaster::edit/$1');
    $routes->post('update-data', 'AuthGroupsMaster::update');
    $routes->delete('delete-data/(:num)', 'AuthGroupsMaster::delete/$1');
});

?>