<?php
 
  /* Permintaan Pemeriksaan */
        $routes->group('pelanggan/pelayanan/pemeriksaan', function ($routes) {
        $routes->get('', 'Pelanggan\Pemeriksaan::index');
        $routes->get('list-data', 'Pelanggan\Pemeriksaan::list');
        $routes->get('delete-all-data/(:any)', 'Pelanggan\Pemeriksaan::delete_all_data/$1');
        $routes->get('show-permintaan-sampel/(:any)', 'Pelanggan\Pemeriksaan::detail_permintaan_sampel/$1');

    });
?>