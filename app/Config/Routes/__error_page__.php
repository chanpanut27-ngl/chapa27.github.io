<?php
    /* Error Page 404 */
    $routes->set404Override('App\Controllers\ErrorPage::show404');
    /* Permission Page 404 */
    $routes->get('not-privilege', 'NotEnoughPrivilege::show401');
?>