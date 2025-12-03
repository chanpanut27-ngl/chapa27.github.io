<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

/** Modul Pelayanan Pemeriksaan **/
/** Pengantar LHU **/
$routes->group('pelayanan-pemeriksaan/pengantar-lhu', function ($routes) {
    $routes->get('', 'PengantarLhu::index');
    $routes->get('list-data', 'PengantarLhu::list');
    $routes->get('add-data', 'PengantarLhu::new');
    $routes->post('create-data', 'PengantarLhu::create');
    $routes->get('edit-data/(:num)', 'PengantarLhu::edit/$1');
    $routes->post('update-data', 'PengantarLhu::update');
    $routes->delete('delete-data/(:num)', 'PengantarLhu::delete/$1');
    $routes->get('setting-lab/(:num)', 'PengantarLhu::setting_lab/$1');
    $routes->post('create-setting-lab', 'PengantarLhu::create_setting_lab');
});



$routes->group('file-peraturan/reader', function ($routes) {
    $routes->get('standar-pelayanan', 'FileReader::standar_pelayanan');
    $routes->get('tarif-pelayanan', 'FileReader::tarif_pelayanan');
    $routes->get('permenkes-no2-2023', 'FileReader::permenkes_no2_2023');
    $routes->get('menlhk-no68-2016', 'FileReader::menlhk_no68_2016');
    $routes->get('permenlh-no11-2025', 'FileReader::permenlh_no11_2025');
    $routes->get('permenlh-no12-2025', 'FileReader::permenlh_no12_2025');
    $routes->get('pertek-baku-mutu-limbah-domestik', 'FileReader::pertek_bml_domestik');
    $routes->get('permenkes-no1096-2011', 'FileReader::permenkes_no1096_2011');
    $routes->get('permenkes-no7-aami-2019', 'FileReader::permenkes_no7_aami_2019');
});