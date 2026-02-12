<?php

/* Pengantar LHU */
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


/* Pelayanan Sampel Lingkungan */
$routes->group('pelayanan/pengantar-lab/sampel-lingkungan', function ($routes) {
    $routes->get('index/(:any)/(:any)', 'SampelLingkungan::index/$1/$1');
    $routes->get('list-data', 'SampelLingkungan::list');
    $routes->get('add-data', 'SampelLingkungan::new');
    $routes->post('create-data', 'SampelLingkungan::create');
    $routes->get('edit-data/(:any)', 'SampelLingkungan::edit/$1');
    $routes->post('update-data', 'SampelLingkungan::update');
    $routes->delete('delete-data/(:num)', 'SampelLingkungan::delete/$1');
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


?>