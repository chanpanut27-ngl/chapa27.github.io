<?php

 /* Instansi */
    $routes->group('master-data/instansi', function ($routes) {
        $routes->get('', 'InstansiMaster::index');
        $routes->get('list-data', 'InstansiMaster::list');
        $routes->get('add-data', 'InstansiMaster::new');
        $routes->post('create-data', 'InstansiMaster::create');
        $routes->get('edit-data/(:num)', 'InstansiMaster::edit/$1');
        $routes->post('update-data', 'InstansiMaster::update');
        $routes->delete('delete-data/(:num)', 'InstansiMaster::delete/$1');
    });

    /** Penyakit **/
    $routes->group('master-data/penyakit', function ($routes) {
        $routes->get('', 'PenyakitMaster::index');
        $routes->get('list-data', 'PenyakitMaster::list');
        $routes->get('add-data', 'PenyakitMaster::new');
        $routes->post('create-data', 'PenyakitMaster::create');
        $routes->get('edit-data/(:num)', 'PenyakitMaster::edit/$1');
        $routes->post('update-data', 'PenyakitMaster::update');
        $routes->delete('delete-data/(:num)', 'PenyakitMaster::delete/$1');
    });

?>