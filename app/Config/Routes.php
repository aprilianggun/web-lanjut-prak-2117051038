<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/profile/(:any)/(:any)/(:any)', 'UserController::profile/$1/$2/$3');

// Rute untuk menampilkan formulir pembuatan pengguna
$routes->get('/user/create', 'UserController::create');
// Rute untuk memproses formulir pembuatan pengguna
$routes->post('/user/store', 'UserController::store');