<?php
 /* List Permintaan Pemeriksaan */
        $routes->group('pelayanan-sampel/permintaan-pemeriksaan', function ($routes) {
        $routes->get('index/(:any)', 'Pemeriksaan::index/$1');
        $routes->get('list-data', 'Pemeriksaan::list');
        $routes->get('add-data', 'Pelanggan\ListPemeriksaan::new');
        $routes->post('create-data', 'Pelanggan\ListPemeriksaan::create');
        $routes->get('edit-data/(:num)', 'Pelanggan\ListPemeriksaan::edit/$1');
        $routes->post('update-data', 'Pelanggan\ListPemeriksaan::update');
        $routes->delete('delete-data/(:num)', 'Pelanggan\ListPemeriksaan::delete/$1');
        $routes->get('delete-data-pemeriksaan/(:any)', 'Pelanggan\ListPemeriksaan::delete_data_pemeriksaan/$1');
    });

?>