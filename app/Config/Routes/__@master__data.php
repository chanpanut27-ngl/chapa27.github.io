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

    /* Peraturan Baku Mutu */
    $routes->group('master-data/peraturan', function ($routes) {
        $routes->get('', 'PeraturanMaster::index');
        $routes->get('list-data', 'PeraturanMaster::list');
        $routes->get('add-data', 'PeraturanMaster::new');
        $routes->post('create-data', 'PeraturanMaster::create');
        $routes->get('edit-data/(:num)', 'PeraturanMaster::edit/$1');
        $routes->post('update-data', 'PeraturanMaster::update');
        $routes->delete('delete-data/(:num)', 'PeraturanMaster::delete/$1');
    });

?>