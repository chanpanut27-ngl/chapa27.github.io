<?php

/* Jenis sampel */
$routes->group('master-data/jenis-sampel', function ($routes) {
    $routes->get('', 'JenisSampelMaster::index');
    $routes->get('list-data', 'JenisSampelMaster::list');
    $routes->get('add-data', 'JenisSampelMaster::new');
    $routes->post('create-data', 'JenisSampelMaster::create');
    $routes->get('edit-data/(:num)', 'JenisSampelMaster::edit/$1');
    $routes->post('update-data', 'JenisSampelMaster::update');
    $routes->delete('delete-data/(:num)', 'JenisSampelMaster::delete/$1');
    $routes->get('detail-parameter/(:num)', 'JenisSampelMaster::show_parameter/$1');
});

?>