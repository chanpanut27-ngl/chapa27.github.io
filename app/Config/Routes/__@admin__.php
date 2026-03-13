<?php
    $routes->group('/', function ($routes) {
        $routes->get('', 'Admin::index');
        $routes->get('dashboard', 'User::dashboard');
    });


    $routes->add('/adminlang/(:any)', 'SelectLanguage::adminlang');
    $routes->add('/frontlang/(:any)', 'SelectLanguage::frontlang');
?>