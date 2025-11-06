<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Users::index');
$routes->get('shop', 'Shop::index');
$routes->get('users', 'Users::index');
$routes->get('requests', 'Requests::index');
$routes->get('admin', 'Admin::index');
$routes->get('admin/dashboard', 'Admin::index');

$routes->get('/login',  'Auth::showLoginPage');
$routes->post('/login', 'Auth::login');
$routes->post('/logout', 'Auth::logout');
$routes->get('/signup',  'Auth::showSignupPage');
$routes->post('/signup', 'Auth::signup');
$routes->get('/admin/dashboard',  'Auth::dashboard');
$routes->get('/admin/logout',  'Auth::logout');
$routes->get('/moodboard', 'Users::moodboard');
$routes->get('/roadmap', 'Users::roadmap');
