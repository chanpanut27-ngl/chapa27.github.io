<?php

/* Peraturan Baku Mutu */
$routes->group('master-data/peraturan', function ($routes) {
    $routes->get('', 'PeraturanMaster::index');
    $routes->get('list-data', 'PeraturanMaster::list');
    $routes->get('add-data', 'PeraturanMaster::new');
    $routes->post('create-data', 'PeraturanMaster::create');
    $routes->get('edit-data/(:num)', 'PeraturanMaster::edit/$1');
    $routes->post('update-data', 'PeraturanMaster::update');
    $routes->delete('delete-data/(:num)', 'PeraturanMaster::delete/$1');
});

?>