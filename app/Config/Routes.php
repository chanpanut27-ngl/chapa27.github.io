<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

/*________ Error Page 404 ________*/
$routes->set404Override('App\Controllers\ErrorPage::show404');
/*________ Permission Page 404 ________*/
$routes->get('not-privilege', 'NotEnoughPrivilege::show401');


/*________ Admin ________*/
require __DIR__ . '/Routes/__@admin__.php';
/*________ User ________*/
require __DIR__ . '/Routes/__@user__.php';
/*________ Pelanggan ________*/
require __DIR__ . '/Routes/__@pelanggan__.php';
/*________ Pelanggan permintaan ________*/
require __DIR__ . '/Routes/__@pelanggan__permintaan.php';
/*________ Pelanggan pemeriksaan ________*/
require __DIR__ . '/Routes/__@pelanggan__pemeriksaan.php';
/*________ Cari data ________*/
require __DIR__ . '/Routes/__@cari__data.php';
/*________ File reader ________*/
require __DIR__ . '/Routes/__@file__reader.php';
/*________ Master data ________*/
require __DIR__ . '/Routes/__@master__data.php';
/*________ Coolbox ________*/
require __DIR__ . '/Routes/__@coolbox__.php';
/*________ Profil pegawai ________*/
require __DIR__ . '/Routes/__@profil__pegawai.php';
/*________ Export excel ________*/
require __DIR__ . '/Routes/__@export__excel.php';
/*________ Lab tujuan ________*/
require __DIR__ . '/Routes/__@lab__tujuan.php';




