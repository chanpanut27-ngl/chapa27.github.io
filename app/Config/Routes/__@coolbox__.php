<?php
/* posisi coolbox */
$routes->group('coolbox/posisi-coolbox', function ($routes) {
    $routes->get('', 'PosisiCoolbox::index');
    $routes->get('list-data', 'PosisiCoolbox::list');
    $routes->get('add-data', 'PosisiCoolbox::new');
    $routes->post('create-data', 'PosisiCoolbox::create');
    $routes->get('edit-data/(:num)', 'PosisiCoolbox::edit/$1');
    $routes->post('update-data', 'PosisiCoolbox::update');
    $routes->delete('delete-data/(:num)', 'PosisiCoolbox::delete/$1');
    $routes->get('add-foto/(:num)', 'PosisiCoolbox::add_foto/$1');
    $routes->post('upload-foto', 'PosisiCoolbox::upload_foto');
});

$routes->get('cetak/label/posisi-coolbox/(:num)', 'CoolboxMaster::cetak_label/$1');


/* Antrian */
    $routes->group('coolbox/antrian-coolbox', function ($routes) {
        $routes->get('', 'AntrianCoolbox::index');
        $routes->get('list-data', 'AntrianCoolbox::list');
        $routes->get('add-data', 'AntrianCoolbox::new');
        $routes->post('create-data', 'AntrianCoolbox::create');
        $routes->get('edit-data/(:num)', 'AntrianCoolbox::edit/$1');
        $routes->get('cetak-label/(:num)', 'AntrianCoolbox::cetak_label/$1');
        $routes->post('update-data', 'AntrianCoolbox::update');
        $routes->delete('delete-data/(:num)', 'AntrianCoolbox::delete/$1');
    });


?>