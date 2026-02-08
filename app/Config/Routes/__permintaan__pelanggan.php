<?php
        /* Permintaan Pelanggan */
        $routes->group('pelanggan/permintaan-pelanggan', function ($routes) {
        $routes->get('', 'Pelanggan\Permintaan::index');
        $routes->get('list-data', 'Pelanggan\Permintaan::list');
        $routes->get('add-data', 'Pelanggan\Permintaan::new');
        $routes->post('create-data', 'Pelanggan\Permintaan::create');
        $routes->get('edit-data/(:num)', 'Pelanggan\Permintaan::edit/$1');
        $routes->post('update-data', 'Pelanggan\Permintaan::update');
        $routes->delete('delete-data/(:num)', 'Pelanggan\Permintaan::delete/$1');
        $routes->post('list-sampel', 'Pelanggan\Permintaan::update');
    });


    /* Permintaan pelanggan */
    $routes->group('pelayanan-sampel/permintaan-pelangan', function ($routes) {
    $routes->get('', 'Permintaan::index');
    $routes->get('list-data', 'Permintaan::list');
    $routes->get('add-data', 'Permintaan::new');
    $routes->post('create-data', 'Permintaan::create');
    $routes->get('edit-data/(:num)', 'Permintaan::edit/$1');
    $routes->post('update-data', 'Permintaan::update');
    $routes->delete('delete-data/(:num)', 'Permintaan::delete/$1');
    });

?>