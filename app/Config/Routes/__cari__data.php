<?php

$routes->post('cari-sampel', 'CariData::cari_sampel');
$routes->post('cari-peraturan', 'CariData::cari_peraturan');
$routes->post('cari-metode', 'CariData::cari_metode');

$routes->get('show-data/lab-pemeriksaan/(:num)', 'CariData::show_lab_pemeriksaan/$1');

