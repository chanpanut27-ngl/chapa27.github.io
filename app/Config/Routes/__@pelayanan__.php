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

    /* Proses Pengantar Lab */
    $routes->group('pelayanan/pengantar-lab/proses', function ($routes) {
        $routes->get('index/(:any)', 'ProsesPengantarLab::index/$1');
        $routes->get('list-menu/(:any)', 'ProsesPengantarLab::list_menu/$1');
        $routes->get('pilih-menu/(:any)', 'ProsesPengantarLab::pilih_menu/$1');
    });


    /* Pelayanan Resume Pengantar Lab */
    $routes->group('pelayanan/pengantar-lab/resume', function ($routes) {
        $routes->get('(:any)', 'ResumePengantarLab::index/$1');
        $routes->get('list-data', 'ResumePengantarLab::list');
    });

    /* Cetak Resume Pengantar Lab */
    $routes->get('cetak/resume/(:any)', 'ResumePengantarLab::cetak/$1');
    $routes->get('cetak/perintah-uji/(:any)', 'PerintahUjiSampel::cetak/$1');
    $routes->get('cetak/label-coolbox/(:any)', 'CoolboxMaster::cetak_label/$1');

    /* Pelayanan Kaji Ulang Kontrak Pengantar Lab */
    $routes->group('pelayanan/pengantar-lab/kaji-ulang-kontrak', function ($routes) {
        $routes->get('', 'KajiUlangKontrakPengantar::index');
        $routes->get('list-data', 'KajiUlangKontrakPengantar::list');
        $routes->get('add-data', 'KajiUlangKontrakPengantar::new');
        $routes->post('create-data', 'KajiUlangKontrakPengantar::create');
        $routes->get('edit-data/(:num)', 'KajiUlangKontrakPengantar::edit/$1');
        $routes->post('update-data', 'KajiUlangKontrakPengantar::update');
        $routes->delete('delete-data/(:num)', 'KajiUlangKontrakPengantar::delete/$1');
    });

    /* Pelayanan Keterangan Pengantar Lab **/
    $routes->group('pelayanan/pengantar-lab/keterangan', function ($routes) {
        $routes->get('', 'KeteranganPengantar::index');
        $routes->get('list-data', 'KeteranganPengantar::list');
        $routes->get('add-data', 'KeteranganPengantar::new');
        $routes->post('create-data', 'KeteranganPengantar::create');
        $routes->get('edit-data/(:num)', 'KeteranganPengantar::edit/$1');
        $routes->post('update-data', 'KeteranganPengantar::update');
        $routes->delete('delete-data/(:num)', 'KeteranganPengantar::delete/$1');
    });

    /* Pelayanan Kondisi Lingkungan Pengantar Lab */
    $routes->group('pelayanan/pengantar-lab/kondisi-lingkungan', function ($routes) {
        $routes->get('', 'KondisiLingkunganPengantar::index');
        $routes->get('list-data', 'KondisiLingkunganPengantar::list');
        $routes->get('add-data', 'KondisiLingkunganPengantar::new');
        $routes->post('create-data', 'KondisiLingkunganPengantar::create');
        $routes->get('edit-data/(:num)', 'KondisiLingkunganPengantar::edit/$1');
        $routes->post('update-data', 'KondisiLingkunganPengantar::update');
        $routes->delete('delete-data/(:num)', 'KondisiLingkunganPengantar::delete/$1');
    });


    /** Perintah uji sampel **/
    $routes->group('pelayanan/perintah-uji-sampel', function ($routes) {
        $routes->get('', 'PerintahUjiSampel::index');
        $routes->get('list-data', 'PerintahUjiSampel::list');
        $routes->get('add-data', 'PerintahUjiSampel::new');
        $routes->post('create-data', 'PerintahUjiSampel::create');
        $routes->get('edit-data', 'PerintahUjiSampel::edit');
        $routes->post('update-data', 'PerintahUjiSampel::update');
        $routes->get('delete-data', 'PerintahUjiSampel::delete');
    });


    /* Instalasi */
    $routes->group('pelayanan/status-layanan', function ($routes) {
        $routes->get('index/(:num)', 'StatusLayanan::index/$1');
        $routes->get('list-data', 'StatusLayanan::list');
        $routes->delete('delete-data/(:num)', 'StatusLayanan::delete/$1');
        $routes->post('create-data', 'StatusLayanan::create/');
    });
    
    /* Penawaran */
    $routes->group('pelayanan/penawaran', function ($routes) {
        $routes->get('', 'Penawaran::index');
        $routes->get('list-data', 'Penawaran::list');
        $routes->get('detail/(:any)', 'Penawaran::show/$1');
        $routes->get('detail-surat', 'Penawaran::show_surat');
        $routes->get('detail-pakta-integritas', 'Penawaran::show_integritas');
        $routes->delete('delete-data/(:num)', 'Penawaran::delete/$1');
        $routes->post('create-data', 'Penawaran::create/');
    });
    
    ?>