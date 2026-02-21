<?php
 
  /* Permintaan Pemeriksaan */
        $routes->group('pelanggan/pelayanan/pemeriksaan', function ($routes) {
        $routes->get('', 'Pelanggan\Pemeriksaan::index');
        $routes->get('list-data', 'Pelanggan\Pemeriksaan::list');
        $routes->get('delete-all-data/(:any)', 'Pelanggan\Pemeriksaan::delete_all_data/$1');
        $routes->get('show-permintaan-sampel/(:any)', 'Pelanggan\Pemeriksaan::detail_permintaan_sampel/$1');
    });

    /* List Permintaan Pemeriksaan */
        $routes->group('pelanggan/pelayanan/list-pemeriksaan', function ($routes) {
        $routes->get('index/(:any)', 'Pelanggan\ListPemeriksaan::index/$1');
        $routes->get('list-data', 'Pelanggan\ListPemeriksaan::list');
        $routes->get('add-data', 'Pelanggan\ListPemeriksaan::new');
        $routes->post('create-data', 'Pelanggan\ListPemeriksaan::create');
        $routes->get('edit-data/(:num)', 'Pelanggan\ListPemeriksaan::edit/$1');
        $routes->post('update-data', 'Pelanggan\ListPemeriksaan::update');
        $routes->delete('delete-data/(:num)', 'Pelanggan\ListPemeriksaan::delete/$1');
        $routes->get('delete-data-pemeriksaan/(:any)', 'Pelanggan\ListPemeriksaan::delete_data_pemeriksaan/$1');
    });
?>