<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Users::index');

$routes->get('login',  'Auth::login');
$routes->post('login', 'Auth::login');

$routes->post('logout', 'Auth::logout');

$routes->get('signup',  'Auth::signup');
$routes->post('signup', 'Auth::signup');
