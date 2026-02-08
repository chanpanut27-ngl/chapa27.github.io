<?php
    /* Pelanggan */
        $routes->group('/', function ($routes) {
        $routes->get('', 'Pelanggan::index');
        $routes->get('dashboard', 'Pelanggan::dashboard');
    });

    /* Profil Pelanggan */
        $routes->group('pelanggan/profil', function ($routes) {
        $routes->get('', 'Pelanggan\Profil::index');
        $routes->get('list-data', 'Pelanggan\Profil::list');
        $routes->get('list-foto', 'Pelanggan\Profil::list_foto');
        $routes->get('add-data', 'Pelanggan\Profil::new');
        $routes->post('create-data', 'Pelanggan\Profil::create');
        $routes->get('edit-data/(:num)', 'Pelanggan\Profil::edit/$1');
        $routes->post('update-data', 'Pelanggan\Profil::update');
        $routes->delete('delete-data/(:num)', 'Pelanggan\Profil::delete/$1');
    });

    
    /* Permintaan Pemeriksaan */
        $routes->group('pelanggan/permintaan-pemeriksaan', function ($routes) {
        $routes->get('', 'Pelanggan\Pemeriksaan::index');
        $routes->get('list-data', 'Pelanggan\Pemeriksaan::list');
        $routes->get('delete-all-data/(:any)', 'Pelanggan\Pemeriksaan::delete_all_data/$1');

    });

    /* List Permintaan Pemeriksaan */
        $routes->group('pelanggan/list-pemeriksaan', function ($routes) {
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