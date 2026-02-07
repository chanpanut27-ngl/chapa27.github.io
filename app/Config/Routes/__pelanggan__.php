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
?>