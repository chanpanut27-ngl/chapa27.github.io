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
?>