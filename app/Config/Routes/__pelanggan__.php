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

    /* File Pelayanan */
        $routes->group('pelanggan/file-pelayanan/reader', function ($routes) {
        $routes->get('standar-pelayanan', 'Pelanggan\FileReader::standar_pelayanan');
        $routes->get('tarif-pelayanan', 'Pelanggan\FileReader::tarif_pelayanan');
    });

    /* Booklet */
        $routes->group('pelanggan/booklet/reader', function ($routes) {
        $routes->get('booklet-2025', 'Pelanggan\BookletReader::booklet_2025');
        $routes->get('booklet-2026', 'Pelanggan\BookletReader::booklet_2026');
        $routes->get('tarif-pnbp', 'Pelanggan\BookletReader::tarif_pnbp');
    });

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

    /* Permintaan Pemeriksaan */
        $routes->group('pelanggan/permintaan-pemeriksaan', function ($routes) {
        $routes->get('', 'Pelanggan\Pemeriksaan::index');
        $routes->get('list-data', 'Pelanggan\Pemeriksaan::list');
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
        $routes->post('detail-sampel', 'Pelanggan\ListPemeriksaan::detail_sampel');
        $routes->post('list-parameter', 'Pelanggan\ListPemeriksaan::list_parameter');
        $routes->get('delete-data-pemeriksaan/(:any)', 'Pelanggan\ListPemeriksaan::delete_data_pemeriksaan/$1');
    });
?>