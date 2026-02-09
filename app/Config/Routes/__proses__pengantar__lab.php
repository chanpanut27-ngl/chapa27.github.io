<?php
/* Proses Pengantar LHU */
$routes->group('pelayanan/pengantar-lab/proses', function ($routes) {
    $routes->get('index/(:any)', 'ProsesPengantarLab::index/$1');
    $routes->get('list-menu/(:any)', 'ProsesPengantarLab::list_menu/$1');
    $routes->get('pilih-menu/(:any)', 'ProsesPengantarLab::pilih_menu/$1');
});

?>