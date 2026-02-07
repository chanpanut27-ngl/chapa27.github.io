<?php

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

?>