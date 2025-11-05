<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Users::index');
$routes->get('admin', 'Admin::index');
$routes->get('shop', 'Shop::index');
$routes->get('users', 'Users::index');
$routes->get('requests', 'Requests::index');
