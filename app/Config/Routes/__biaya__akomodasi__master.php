<?php
/* Biaya Akomodasi */
$routes->group('master-data/biaya-akomodasi', function ($routes) {
    $routes->get('', 'BiayaAKomodasi::index');
    $routes->get('list-data', 'BiayaAKomodasi::list');
    $routes->get('add-data', 'BiayaAKomodasi::new');
    $routes->post('create-data', 'BiayaAKomodasi::create');
    $routes->get('edit-data/(:num)', 'BiayaAKomodasi::edit/$1');
    $routes->post('update-data', 'BiayaAKomodasi::update');
    $routes->delete('delete-data/(:num)', 'BiayaAKomodasi::delete/$1');
});
?>