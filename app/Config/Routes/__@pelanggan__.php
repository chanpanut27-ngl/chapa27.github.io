<?php
    /* Pelanggan */
        $routes->group('/', ['filter' => 'role:pelanggan'], function ($routes) {
        $routes->get('', 'Pelanggan::index');
        $routes->get('dashboard', 'Pelanggan::dashboard');
    });

    /* Profil Pelanggan */
    $routes->group('pelanggan/profil', function ($routes) {
        $routes->get('', 'Pelanggan\Profil::index');
        $routes->get('list-data', 'Pelanggan\Profil::list');
        $routes->get('list-foto', 'Pelanggan\Profil::list_foto');
        $routes->get('add-data', 'Pelanggan\Profil::new');
        $routes->post('create-data', 'Pelanggan\Profil::create');
        $routes->get('edit-data/(:num)', 'Pelanggan\Profil::edit/$1');
        $routes->post('update-data', 'Pelanggan\Profil::update');
        $routes->delete('delete-data/(:num)', 'Pelanggan\Profil::delete/$1');
    });
?>