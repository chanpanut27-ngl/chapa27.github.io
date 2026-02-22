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

    /** Coolbox **/
    $routes->group('master-data/coolbox', function ($routes) {
        $routes->get('', 'CoolboxMaster::index');
        $routes->get('list-data', 'CoolboxMaster::list');
        $routes->get('add-data', 'CoolboxMaster::new');
        $routes->post('create-data', 'CoolboxMaster::create');
        $routes->get('edit-data/(:num)', 'CoolboxMaster::edit/$1');
        $routes->post('update-data', 'CoolboxMaster::update');
        $routes->delete('delete-data/(:num)', 'CoolboxMaster::delete/$1');
    });

    /* Biaya Akomodasi */
    $routes->group('master-data/biaya-akomodasi', function ($routes) {
        $routes->get('', 'BiayaAKomodasi::index');
        $routes->get('list-data', 'BiayaAKomodasi::list');
        $routes->get('add-data', 'BiayaAKomodasi::new');
        $routes->post('create-data', 'BiayaAKomodasi::create');
        $routes->get('edit-data/(:num)', 'BiayaAKomodasi::edit/$1');
        $routes->post('update-data', 'BiayaAKomodasi::update');
        $routes->delete('delete-data/(:num)', 'BiayaAKomodasi::delete/$1');
    });

    /* Kategori lab */
    $routes->group('master-data/kategori-laboratorium', function ($routes) {
        $routes->get('', 'KategoriLabMaster::index');
        $routes->get('list-data', 'KategoriLabMaster::list');
        $routes->get('add-data', 'KategoriLabMaster::new');
        $routes->post('create-data', 'KategoriLabMaster::create');
        $routes->get('edit-data/(:num)', 'KategoriLabMaster::edit/$1');
        $routes->post('update-data', 'KategoriLabMaster::update');
        $routes->delete('delete-data/(:num)', 'KategoriLabMaster::delete/$1');
    });

    /* Instalasi */
    $routes->group('master-data/instalasi', function ($routes) {
        $routes->get('', 'InstalasiMaster::index');
        $routes->get('list-data', 'InstalasiMaster::list');
        $routes->get('add-data', 'InstalasiMaster::new');
        $routes->post('create-data', 'InstalasiMaster::create');
        $routes->get('edit-data/(:num)', 'InstalasiMaster::edit/$1');
        $routes->post('update-data', 'InstalasiMaster::update');
        $routes->delete('delete-data/(:num)', 'InstalasiMaster::delete/$1');
    });

    /* Laboratorium */
    $routes->group('master-data/laboratorium', function ($routes) {
        $routes->get('', 'LaboratoriumMaster::index');
        $routes->get('list-data', 'LaboratoriumMaster::list');
        $routes->get('add-data', 'LaboratoriumMaster::new');
        $routes->post('create-data', 'LaboratoriumMaster::create');
        $routes->get('edit-data/(:num)', 'LaboratoriumMaster::edit/$1');
        $routes->post('update-data', 'LaboratoriumMaster::update');
        $routes->delete('delete-data/(:num)', 'LaboratoriumMaster::delete/$1');
    });

    
/* Jenis sampel */
    $routes->group('master-data/jenis-sampel', function ($routes) {
        $routes->get('', 'JenisSampelMaster::index');
        $routes->get('list-data', 'JenisSampelMaster::list');
        $routes->get('add-data', 'JenisSampelMaster::new');
        $routes->post('create-data', 'JenisSampelMaster::create');
        $routes->get('edit-data/(:num)', 'JenisSampelMaster::edit/$1');
        $routes->post('update-data', 'JenisSampelMaster::update');
        $routes->delete('delete-data/(:num)', 'JenisSampelMaster::delete/$1');
        $routes->get('detail-parameter/(:num)', 'JenisSampelMaster::show_parameter/$1');
    });

    /* Per item sampel */
    $routes->group('master-data/parameter', function ($routes) {
        $routes->get('', 'ParameterMaster::index');
        $routes->get('list-data', 'ParameterMaster::list');
        $routes->get('add-data', 'ParameterMaster::new');
        $routes->post('create-data', 'ParameterMaster::create');
        $routes->get('edit-data/(:num)', 'ParameterMaster::edit/$1');
        $routes->post('update-data', 'ParameterMaster::update');
        $routes->post('list-sampel', 'ParameterMaster::list_sampel');
        $routes->post('detail-sampel', 'ParameterMaster::detail_sampel');
        $routes->delete('delete-data/(:num)', 'ParameterMaster::delete/$1');
    });

    /* Pelanggan */
    $routes->group('master-data/pelanggan', function ($routes) {
        $routes->get('', 'PelangganMaster::index');
        $routes->get('list-data', 'PelangganMaster::list');
        $routes->get('add-data', 'PelangganMaster::new');
        $routes->post('create-data', 'PelangganMaster::create');
        $routes->get('edit-data/(:num)', 'PelangganMaster::edit/$1');
        $routes->post('update-data', 'PelangganMaster::update');
        $routes->delete('delete-data/(:num)', 'PelangganMaster::delete/$1');
    });

    /* Users */
        $routes->group('master-data/users', function ($routes) {
        $routes->get('', 'UsersMaster::index');
        $routes->get('list-data', 'UsersMaster::list');
        $routes->get('add-data', 'UsersMaster::new');
        $routes->post('create-data', 'UsersMaster::create');
        $routes->get('edit-data/(:num)', 'UsersMaster::edit/$1');
        $routes->post('update-data', 'UsersMaster::update');
        $routes->delete('delete-data/(:num)', 'UsersMaster::delete/$1');
    });

    /* Auth Groups */
        $routes->group('master-data/auth-groups', function ($routes) {
        $routes->get('', 'AuthGroupsMaster::index');
        $routes->get('list-data', 'AuthGroupsMaster::list');
        $routes->get('add-data', 'AuthGroupsMaster::new');
        $routes->post('create-data', 'AuthGroupsMaster::create');
        $routes->get('edit-data/(:num)', 'AuthGroupsMaster::edit/$1');
        $routes->post('update-data', 'AuthGroupsMaster::update');
        $routes->delete('delete-data/(:num)', 'AuthGroupsMaster::delete/$1');
    });

    /* Auth Groups Users */
        $routes->group('master-data/auth-groups-users', function ($routes) {
        $routes->get('', 'AuthGroupsUsersMaster::index');
        $routes->get('list-data', 'AuthGroupsUsersMaster::list');
        $routes->get('add-data', 'AuthGroupsUsersMaster::new');
        $routes->post('create-data', 'AuthGroupsUsersMaster::create');
        $routes->get('edit-data/(:num)', 'AuthGroupsUsersMaster::edit/$1');
        $routes->post('update-data', 'AuthGroupsUsersMaster::update');
        $routes->get('delete-data', 'AuthGroupsUsersMaster::delete');
    });

    /* Auth Permissions */
        $routes->group('master-data/auth-permissions', function ($routes) {
        $routes->get('', 'AuthPermissionsMaster::index');
        $routes->get('list-data', 'AuthPermissionsMaster::list');
        $routes->get('add-data', 'AuthPermissionsMaster::new');
        $routes->post('create-data', 'AuthPermissionsMaster::create');
        $routes->get('edit-data/(:num)', 'AuthPermissionsMaster::edit/$1');
        $routes->post('update-data', 'AuthPermissionsMaster::update');
        $routes->delete('delete-data/(:num)', 'AuthPermissionsMaster::delete/$1');
    });


    /* Auth Groups Permissions */
    $routes->group('master-data/auth-groups-permissions', function ($routes) {
        $routes->get('', 'AuthGroupsPermissionsMaster::index');
        $routes->get('list-data', 'AuthGroupsPermissionsMaster::list');
        $routes->get('add-data', 'AuthGroupsPermissionsMaster::new');
        $routes->post('create-data', 'AuthGroupsPermissionsMaster::create');
        $routes->get('edit-data/(:num)', 'AuthGroupsPermissionsMaster::edit/$1');
        $routes->post('update-data', 'AuthGroupsPermissionsMaster::update');
        $routes->get('delete-data', 'AuthGroupsPermissionsMaster::delete');
    });

    /* Auth Logins */
    $routes->group('master-data/auth-logins', function ($routes) {
        $routes->get('', 'AuthLoginsMaster::index');
        $routes->get('list-data', 'AuthLoginsMaster::list');
        $routes->delete('delete-data/(:num)', 'AuthLoginsMaster::delete/$1');
    });

?>