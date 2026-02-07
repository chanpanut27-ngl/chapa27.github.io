<?php

/** Kumpulan file **/
/* File Peraturan */
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

/* Booklet */
$routes->group('file-booklet/reader', function ($routes) {
    $routes->get('booklet-2025', 'BookletReader::booklet_2025');
    $routes->get('booklet-2026', 'BookletReader::booklet_2026');
    $routes->get('tarif-pnbp', 'BookletReader::tarif_pnbp');
});

?>