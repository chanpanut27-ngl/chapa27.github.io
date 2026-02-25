<?php
    /* Pelanggan */
        $routes->group('/', ['filter' => 'role:pelanggan'], function ($routes) {
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

    /* Penawaran */
    $routes->group('pelanggan/pelayanan/penawaran', function ($routes) {
        $routes->get('', 'Pelanggan\Penawaran::index');
        $routes->get('list-data', 'Pelanggan\Penawaran::list');
        $routes->get('detail/(:any)', 'Penawaran::show/$1');
        $routes->get('detail-surat', 'Penawaran::show_surat');
        $routes->get('detail-pakta-integritas', 'Penawaran::show_integritas');
        $routes->get('detail-pelanggan', 'Penawaran::show_pelanggan');
        $routes->get('detail-rencana-anggaran-biaya', 'Penawaran::show_rencana_anggaran_biaya');
        $routes->delete('delete-data/(:num)', 'Penawaran::delete/$1');
        $routes->post('create-data', 'Penawaran::create/');
    });

?>