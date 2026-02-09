<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
/* Error Page */
require __DIR__ . '/Routes/__error_page__.php';
/* File Peraturan */
require __DIR__ . '/Routes/__file__reader.php';
/* Admin */
require __DIR__ . '/Routes/__admin__.php';
/* Master Instansi */
require __DIR__ . '/Routes/__instansi__master.php';
/* Master Peraturan/Baku Mutu */
require __DIR__ . '/Routes/__peraturan__master.php';
/* Master Penyakit */
require __DIR__ . '/Routes/__penyakit__master.php';
/* Master Instalasi */
require __DIR__ . '/Routes/__instalasi__master.php';
/* Master Kategori Laboratorium */
require __DIR__ . '/Routes/__kategori__lab__master.php';
/* Master Coolbox */
require __DIR__ . '/Routes/__coolbox__master.php';
/* Master Biaya Akomodasi */
require __DIR__ . '/Routes/__biaya__akomodasi__master.php';
/* Master Laboratorium */
require __DIR__ . '/Routes/__laboratorium__master.php';
/* Master Jenis Sampel */
require __DIR__ . '/Routes/__jenis__sampel__master.php';
/* Master Parameter */
require __DIR__ . '/Routes/__parameter__master.php';
/* Master Users */
require __DIR__ . '/Routes/__users__master.php';
/* Master Auth Groups */
require __DIR__ . '/Routes/__auth__groups__master.php';
/* Master Auth Groups Users */
require __DIR__ . '/Routes/__auth__groups__users__master.php';
/* Master Auth Permissions */
require __DIR__ . '/Routes/__auth__permissions__master.php';
/* Master Auth Groups Permissions */
require __DIR__ . '/Routes/__auth__groups__permissions__master.php';
/* Master Auth Logins */
require __DIR__ . '/Routes/__auth__logins__master.php';
/* Pelanggan */
require __DIR__ . '/Routes/__pelanggan__.php';
/* Profil Pegawai */
require __DIR__ . '/Routes/__profil__pegawai.php';
/* Permintaan Pelanggan */
require __DIR__ . '/Routes/__permintaan__pelanggan.php';
/* List Data */
require __DIR__ . '/Routes/__cari__data.php';
/* Coolbox */
require __DIR__ . '/Routes/__coolbox.php';
/* Pelanggan Master */
require __DIR__ . '/Routes/__pelanggan__master.php';
/* Pengantar Laboratorium */
require __DIR__ . '/Routes/__pengantar__lab.php';
/* Laboratorium */
require __DIR__ . '/Routes/__lab__tujuan.php';

