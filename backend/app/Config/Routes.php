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

$routes->get('login',  'Auth::login');
$routes->post('login', 'Auth::login');

$routes->post('logout', 'Auth::logout');

$routes->get('signup',  'Auth::signup');
$routes->post('signup', 'Auth::signup');
$routes->get('/moodboard', 'Users::moodboard');
$routes->get('/roadmap', 'Users::roadmap');
