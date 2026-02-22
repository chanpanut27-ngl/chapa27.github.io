<?php
    /* Permintaan pelanggan */
    $routes->group('pelayanan/permintaan', function ($routes) {
        $routes->get('', 'Permintaan::index');
        $routes->get('list-data', 'Permintaan::list');
        $routes->get('add-data', 'Permintaan::new');
        $routes->post('create-data', 'Permintaan::create');
        $routes->get('edit-data/(:num)', 'Permintaan::edit/$1');
        $routes->post('update-data', 'Permintaan::update');
        $routes->delete('delete-data/(:num)', 'Permintaan::delete/$1');
    });


     /* Pemeriksaan */
        $routes->group('pelayanan/pemeriksaan', function ($routes) {
        $routes->get('index/(:any)', 'Pemeriksaan::index/$1');
        $routes->get('list-data', 'Pemeriksaan::list');
        $routes->get('add-data', 'Pemeriksaan::new');
        $routes->post('create-data', 'Pemeriksaan::create');
        $routes->get('edit-data/(:num)', 'Pemeriksaan::edit/$1');
        $routes->post('update-data', 'Pemeriksaan::update');
        $routes->delete('delete-data/(:num)', 'Pemeriksaan::delete/$1');
        $routes->get('delete-data-pemeriksaan/(:any)', 'Pemeriksaan::delete_data_pemeriksaan/$1');
    });

    /* Pengantar Lab */
    $routes->group('pelayanan/pengantar-lab', function ($routes) {
        $routes->get('', 'PengantarLab::index');
        $routes->get('list-data', 'PengantarLab::list');
        $routes->get('add-data', 'PengantarLab::new');
        $routes->post('create-data', 'PengantarLab::create');
        $routes->get('edit-data/(:num)', 'PengantarLab::edit/$1');
        $routes->post('update-data', 'PengantarLab::update');
        $routes->delete('delete-data/(:num)', 'PengantarLab::delete/$1');
        $routes->get('setting-lab/(:num)', 'PengantarLab::setting_lab/$1');
        $routes->post('create-setting-lab', 'PengantarLab::create_setting_lab');
    });

    /* Proses Pengantar Lab */
    $routes->group('pelayanan/pengantar-lab/proses', function ($routes) {
        $routes->get('index/(:any)', 'ProsesPengantarLab::index/$1');
        $routes->get('list-menu/(:any)', 'ProsesPengantarLab::list_menu/$1');
        $routes->get('pilih-menu/(:any)', 'ProsesPengantarLab::pilih_menu/$1');
    });


    ?>