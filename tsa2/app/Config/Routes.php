<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */


$routes->get('/', 'Tasks::today');
$routes->get('/tasks', 'Tasks::index');
$routes->get('/profile', 'Pages::profile');
$routes->get('/about', 'Pages::about');


$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::attemptLogin');
$routes->get('/logout', 'Auth::logout');


$routes->get('/tasks/new', 'Tasks::new', ['filter' => 'auth']);
$routes->post('/tasks/create', 'Tasks::create', ['filter' => 'auth']);
$routes->get('/tasks/edit/(:num)', 'Tasks::edit/$1', ['filter' => 'auth']);
$routes->post('/tasks/update/(:num)', 'Tasks::update/$1', ['filter' => 'auth']);
$routes->post('/tasks/archive/(:num)', 'Tasks::archive/$1', ['filter' => 'auth']);