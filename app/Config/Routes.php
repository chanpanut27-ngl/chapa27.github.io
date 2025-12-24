<?php

use CodeIgniter\Router\RouteCollection;
use DeepCopy\f013\C;

/**
 * @var RouteCollection $routes
 */

/* Error Page 404 */
$routes->set404Override('App\Controllers\ErrorPage::show404');

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
    $routes->get('', 'PermintaanPelanggan::index');
    $routes->get('list-data', 'PermintaanPelanggan::list');
    $routes->get('add-data', 'PermintaanPelanggan::new');
    $routes->post('create-data', 'PermintaanPelanggan::create');
    $routes->get('edit-data/(:num)', 'PermintaanPelanggan::edit/$1');
    $routes->post('update-data', 'PermintaanPelanggan::update');
    $routes->delete('delete-data/(:num)', 'PermintaanPelanggan::delete/$1');
});
