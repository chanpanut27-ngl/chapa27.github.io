<?php

/* Instalasi */
$routes->group('master-data/instalasi', function ($routes) {
    $routes->get('', 'InstalasiMaster::index');
    $routes->get('list-data', 'InstalasiMaster::list');
    $routes->get('add-data', 'InstalasiMaster::new');
    $routes->post('create-data', 'InstalasiMaster::create');
    $routes->get('edit-data/(:num)', 'InstalasiMaster::edit/$1');
    $routes->post('update-data', 'InstalasiMaster::update');
    $routes->delete('delete-data/(:num)', 'InstalasiMaster::delete/$1');
});

?>