<?php

use CodeIgniter\Router\RouteCollection;
use DeepCopy\f013\C;

/**
 * @var RouteCollection $routes
 */

/* Error Page 404 */
$routes->set404Override('App\Controllers\ErrorPage::show404');
/* Cetak PDF */
$routes->get('wa/send-message', 'WhatsAppController::sendWhatsAppMessage');

/* Login */
$routes->group('/', function ($routes) {
    $routes->get('', 'User::index');
    $routes->get('dashboard', 'User::dashboard');
});

/* Admin */
$routes->group('/', ['filter' => 'role:admin'], function ($routes) {
    $routes->get('', 'Admin::index');
    $routes->get('dashboard', 'User::dashboard');
});

/* Pelanggan */
$routes->group('/', function ($routes) {
    $routes->get('', 'Pelanggan::index');
    $routes->get('dashboard', 'Pelanggan::dashboard');
});

/* Profil Pelanggan */
$routes->group('pelanggan/profil', function ($routes) {
    $routes->get('', 'Pelanggan\Profil::index');
    $routes->get('list-data', 'Pelanggan\Profil::list');
    $routes->get('add-data', 'Pelanggan\Profil::new');
    $routes->post('create-data', 'Pelanggan\Profil::create');
    $routes->get('edit-data/(:num)', 'Pelanggan\Profil::edit/$1');
    $routes->post('update-data', 'Pelanggan\Profil::update');
    $routes->delete('delete-data/(:num)', 'Pelanggan\Profil::delete/$1');
});

/* Booklet */
$routes->group('pelanggan/booklet/reader', function ($routes) {
    $routes->get('booklet-3', 'Pelanggan\BookletReader::booklet_3');
    $routes->get('harga-pnbp', 'Pelanggan\BookletReader::harga_pnbp');
});

/* File Peraturan */
$routes->group('pelanggan/file-peraturan/reader', function ($routes) {
    $routes->get('standar-pelayanan', 'Pelanggan\FileReader::standar_pelayanan');
    $routes->get('tarif-pelayanan', 'Pelanggan\FileReader::tarif_pelayanan');
});

/* Permintaan Pemeriksaan */
$routes->group('pelanggan/permintaan-pemeriksaan', function ($routes) {
    $routes->get('', 'Pelanggan\Permintaan::index');
    $routes->get('list-data', 'Pelanggan\Permintaan::list');
    $routes->get('add-data', 'Pelanggan\Permintaan::new');
    $routes->post('create-data', 'Pelanggan\Permintaan::create');
    $routes->get('edit-data/(:num)', 'Pelanggan\Permintaan::edit/$1');
    $routes->post('update-data', 'Pelanggan\Permintaan::update');
    $routes->delete('delete-data/(:num)', 'Pelanggan\Permintaan::delete/$1');
});

/* [Module Pelayanan Pemeriksaan] */
/* Pengantar LHU */
$routes->group('pelayanan/pengantar-lhu', function ($routes) {
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

/* Laboratorium Tujuan */
$routes->group('laboratorium-tujuan', function ($routes) {
    $routes->get('index/(:any)', 'LaboratoriumTujuan::index/$1');
    $routes->get('list-data/(:any)', 'LaboratoriumTujuan::list/$1');
    $routes->get('add-data/(:any)', 'LaboratoriumTujuan::new/$1');
    $routes->post('create-data', 'LaboratoriumTujuan::create');
    $routes->get('edit-data/(:num)', 'LaboratoriumTujuan::edit/$1');
    $routes->post('update-data', 'LaboratoriumTujuan::update');
    $routes->delete('delete-data/(:num)', 'LaboratoriumTujuan::delete/$1');
});

/* Proses Pengantar LHU */
$routes->group('pelayanan/pengantar-lhu/proses', function ($routes) {
    $routes->get('index/(:any)', 'ProsesPengantarLhu::index/$1');
    $routes->get('list-menu/(:any)', 'ProsesPengantarLhu::list_menu/$1');
    $routes->get('pilih-menu/(:any)', 'ProsesPengantarLhu::pilih_menu/$1');
});

/* Pelayanan Sampel Lingkungan */
$routes->group('pelayanan/pengantar-lhu/sampel-lingkungan', function ($routes) {
    $routes->get('index/(:any)/(:any)', 'SampelLingkungan::index/$1/$1');
    $routes->get('list-data', 'SampelLingkungan::list');
    $routes->get('add-data', 'SampelLingkungan::new');
    $routes->post('create-data', 'SampelLingkungan::create');
    $routes->get('edit-data/(:any)', 'SampelLingkungan::edit/$1');
    $routes->post('update-data', 'SampelLingkungan::update');
    $routes->delete('delete-data/(:num)', 'SampelLingkungan::delete/$1');
});

/* Pelayanan Spesimen Penyakit */
$routes->group('pelayanan/pengantar-lhu/spesimen-penyakit', function ($routes) {
    $routes->get('index/(:any)/(:any)', 'SpesimenPenyakit::index/$1/$1');
    $routes->get('list-data', 'SpesimenPenyakit::list');
    $routes->get('add-data', 'SpesimenPenyakit::new');
    $routes->post('create-data', 'SpesimenPenyakit::create');
    $routes->get('edit-data/(:any)', 'SpesimenPenyakit::edit/$1');
    $routes->post('update-data', 'SpesimenPenyakit::update');
    $routes->delete('delete-data/(:num)', 'SpesimenPenyakit::delete/$1');
});

/* Pelayanan Keterangan Pengantar LHU Penyakit */
$routes->group('pelayanan/keterangan-penyakit', function ($routes) {
    $routes->get('', 'KeteranganPenyakit::index');
    $routes->get('list-data', 'KeteranganPenyakit::list');
    $routes->get('add-data', 'KeteranganPenyakit::new');
    $routes->post('create-data', 'KeteranganPenyakit::create');
    $routes->get('edit-data/(:num)', 'KeteranganPenyakit::edit/$1');
    $routes->post('update-data', 'KeteranganPenyakit::update');
    $routes->delete('delete-data/(:num)', 'KeteranganPenyakit::delete/$1');
});