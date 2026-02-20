<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

/*________ Error Page 404 ________*/
$routes->set404Override('App\Controllers\ErrorPage::show404');
/*________ Permission Page 404 ________*/
$routes->get('not-privilege', 'NotEnoughPrivilege::show401');


