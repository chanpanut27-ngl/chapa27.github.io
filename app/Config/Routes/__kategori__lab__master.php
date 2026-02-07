<?php

/* Kategori lab */
$routes->group('master-data/kategori-laboratorium', function ($routes) {
    $routes->get('', 'KategoriLabMaster::index');
    $routes->get('list-data', 'KategoriLabMaster::list');
    $routes->get('add-data', 'KategoriLabMaster::new');
    $routes->post('create-data', 'KategoriLabMaster::create');
    $routes->get('edit-data/(:num)', 'KategoriLabMaster::edit/$1');
    $routes->post('update-data', 'KategoriLabMaster::update');
    $routes->delete('delete-data/(:num)', 'KategoriLabMaster::delete/$1');
});

?>