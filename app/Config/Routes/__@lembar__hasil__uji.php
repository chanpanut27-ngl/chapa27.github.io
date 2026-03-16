<?php
/* Lembar hasil uji */
    $routes->group('pelayanan/lembar-hasil-uji', function ($routes) {
        $routes->get('', 'LembarHasilUji::index');
        $routes->post('search-data', 'LembarHasilUji::show');
    });
    ?>