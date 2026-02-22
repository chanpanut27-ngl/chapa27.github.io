<?php

/* Pelayanan Sampel Lingkungan */
$routes->group('pelayanan/pengantar-lab/sampel-lingkungan', function ($routes) {
    $routes->get('index/(:any)/(:any)', 'SampelLingkungan::index/$1/$1');
    $routes->get('list-data', 'SampelLingkungan::list');
    $routes->get('add-data', 'SampelLingkungan::new');
    $routes->post('create-data', 'SampelLingkungan::create');
    $routes->get('edit-data/(:any)', 'SampelLingkungan::edit/$1');
    $routes->post('update-data', 'SampelLingkungan::update');
    $routes->delete('delete-data/(:num)', 'SampelLingkungan::delete/$1');
});

?>