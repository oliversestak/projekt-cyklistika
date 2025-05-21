<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Main::stranka1');
$routes->get('main/stranka1', 'Main::stranka1');
$routes->get('main/etapa/(:num)', 'Main::etapa/$1');
$routes->get('main/editEtapa/(:num)', 'Main::editEtapa/$1');
$routes->post('main/updateEtapa', 'Main::updateEtapa');
