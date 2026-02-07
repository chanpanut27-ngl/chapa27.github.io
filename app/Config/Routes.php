<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
/* Error Page */
require __DIR__ . '/Routes/__error_page__.php';
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
/* File Peraturan */
require __DIR__ . '/Routes/__file__reader.php';

