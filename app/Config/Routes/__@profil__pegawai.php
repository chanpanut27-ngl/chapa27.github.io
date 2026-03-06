<?php
/* Profil Pegawai */
    $routes->group('profil-pegawai', function ($routes) {
    $routes->get('', 'ProfilPegawai::index');
    $routes->get('list-data', 'ProfilPegawai::list');
    $routes->get('list-foto', 'ProfilPegawai::list_foto');
    $routes->get('add-data', 'ProfilPegawai::new');
    $routes->post('create-data', 'ProfilPegawai::create');
    $routes->post('update-data', 'ProfilPegawai::update');
    $routes->post('upload-foto', 'ProfilPegawai::do_upload');
    $routes->delete('delete-data/(:num)', 'ProfilPegawai::delete/$1');

});

?>