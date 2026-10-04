<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

// Public pages
$routes->get('/', 'Pages::index');
$routes->get('/about', 'Pages::about');

// Authentication
$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::attemptLogin');
$routes->get('/logout', 'Auth::logout');

// Protected Customer routes
$routes->get('/customers', 'Customers::index', ['filter' => 'auth']);
$routes->get('/customers/new', 'Customers::new', ['filter' => 'auth']);
$routes->post('/customers/create', 'Customers::create', ['filter' => 'auth']);
$routes->get('/customers/edit/(:num)', 'Customers::edit/$1', ['filter' => 'auth']);
$routes->post('/customers/update/(:num)', 'Customers::update/$1', ['filter' => 'auth']);

// Protected User routes
$routes->get('/users', 'Users::index', ['filter' => 'auth']);
$routes->get('/users/new', 'Users::new', ['filter' => 'auth']);
$routes->post('/users/create', 'Users::create', ['filter' => 'auth']);
$routes->get('/users/edit/(:num)', 'Users::edit/$1', ['filter' => 'auth']);
$routes->post('/users/update/(:num)', 'Users::update/$1', ['filter' => 'auth']);