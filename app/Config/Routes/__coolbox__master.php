<?php
/** Coolbox **/
$routes->group('master-data/coolbox', function ($routes) {
    $routes->get('', 'CoolboxMaster::index');
    $routes->get('list-data', 'CoolboxMaster::list');
    $routes->get('add-data', 'CoolboxMaster::new');
    $routes->post('create-data', 'CoolboxMaster::create');
    $routes->get('edit-data/(:num)', 'CoolboxMaster::edit/$1');
    $routes->post('update-data', 'CoolboxMaster::update');
    $routes->delete('delete-data/(:num)', 'CoolboxMaster::delete/$1');
});

?>