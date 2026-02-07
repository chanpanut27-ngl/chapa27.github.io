<?php

/* Auth Logins */
$routes->group('master-data/auth-logins', function ($routes) {
    $routes->get('', 'AuthLoginsMaster::index');
    $routes->get('list-data', 'AuthLoginsMaster::list');
});

?>