<?php
/* Users */
    $routes->group('master-data/users', function ($routes) {
    $routes->get('', 'UsersMaster::index');
    $routes->get('list-data', 'UsersMaster::list');
    $routes->get('add-data', 'UsersMaster::new');
    $routes->post('create-data', 'UsersMaster::create');
    $routes->get('edit-data/(:num)', 'UsersMaster::edit/$1');
    $routes->post('update-data', 'UsersMaster::update');
    $routes->delete('delete-data/(:num)', 'UsersMaster::delete/$1');
});
?>