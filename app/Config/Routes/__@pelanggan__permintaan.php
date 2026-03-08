<?php
    /* Permintaan Pelanggan */
        $routes->group('pelanggan/pelayanan/permintaan', function ($routes) {
        $routes->get('', 'Pelanggan\Permintaan::index');
        $routes->get('list-data', 'Pelanggan\Permintaan::list');
        $routes->get('add-data', 'Pelanggan\Permintaan::new');
        $routes->post('create-data', 'Pelanggan\Permintaan::create');
        $routes->get('edit-data/(:num)', 'Pelanggan\Permintaan::edit/$1');
        $routes->post('update-data', 'Pelanggan\Permintaan::update');
        $routes->delete('delete-data/(:num)', 'Pelanggan\Permintaan::delete/$1');
        $routes->post('list-sampel', 'Pelanggan\Permintaan::update');
    });

     /* Permintaan Pemeriksaan */
        $routes->group('pelanggan/permintaan-pemeriksaan', function ($routes) {
        $routes->get('', 'Pelanggan\Pemeriksaan::index');
        $routes->get('list-data', 'Pelanggan\Pemeriksaan::list');
        $routes->get('delete-all-data/(:any)', 'Pelanggan\Pemeriksaan::delete_all_data/$1');
        $routes->get('show-permintaan-sampel/(:any)', 'Pelanggan\Pemeriksaan::detail_permintaan_sampel/$1');
        $routes->get('periksa-sampel', 'Pelanggan\Pemeriksaan::periksa_sampel');
    });

    /* Permintaan Pemeriksaan Sampel */
    $routes->group('pemeriksaan/permintaan-sampel', function ($routes) {
       $routes->get('edit-data/(:num)', 'PermintaanSampel::edit/$1');
       $routes->delete('delete-data/(:num)', 'PermintaanSampel::delete/$1');
    });
?>