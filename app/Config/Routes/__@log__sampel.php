<?php
    /* Log sampel */
    $routes->group('log-sampel', function ($routes) {
        $routes->get('penerimaan', 'LogSampel::log_penerimaan');
        $routes->get('penawaran', 'LogSampel::log_penawaran');
        $routes->get('distribusi-sampel', 'LogSampel::log_distribusi_sampel');
    });

?>