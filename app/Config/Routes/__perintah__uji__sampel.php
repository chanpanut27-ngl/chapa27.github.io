<?php
/** Perintah uji sampel **/
$routes->group('pelayanan/perintah-uji-sampel', function ($routes) {
    $routes->get('', 'PerintahUjiSampel::index');
    $routes->get('list-data', 'PerintahUjiSampel::list');
    $routes->get('add-data', 'PerintahUjiSampel::new');
    $routes->post('create-data', 'PerintahUjiSampel::create');
    $routes->get('edit-data', 'PerintahUjiSampel::edit');
    $routes->post('update-data', 'PerintahUjiSampel::update');
    $routes->get('delete-data', 'PerintahUjiSampel::delete');
});


// app/Config/Routes.php
$routes->get('qrcode/(:any)', 'QrCodeController::generate/$1');
// Or a default route:
$routes->get('qrcode', 'QrCodeController::index');


