<?php
/* Log sampel */
    $routes->group('log-sampel', function ($routes) {
        $routes->get('', 'LogSampel::index');
        $routes->get('penerimaan', 'LogSampel::log_penerimaan');
    });

/* Menu Log sampel */

     $routes->group('log-sampel/menu', function ($routes) {
        $routes->get('penerimaan', 'MenuLogSampel::menu_penerimaan');
        $routes->get('penawaran', 'MenuLogSampel::menu_penawaran');
    });

    ?>