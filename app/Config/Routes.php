<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Pages::index');
$routes->get('/pages/contact', 'Pages::contact');
$routes->get('/buku', 'buku::index');
$routes->get('/buku/add', 'Buku::add', ['filter' => 'role:admin']);
$routes->get('/buku/edit/(:num)', 'buku::edit/$1', ['filter' => 'role:admin']);
$routes->get('/buku/(:segment)', 'Buku::detail/$1');
$routes->delete('/user/(:num)', 'Review::delete/$1');
$routes->post('/review/save', 'review::index');
$routes->post('/buku/save', 'Buku::save');
$routes->post('/buku/update', 'Buku::update');
$routes->delete('/buku/(:num)', 'Buku::delete/$1');
$routes->post('/review/edit', 'review::edit');
$routes->get('/user/(:any)', 'Review::myReview/$1');
$routes->get('/admin', 'Admin::index', ['filter' => 'role:admin']);
$routes->get('/admin/index', 'Admin::index', ['filter' => 'role:admin']);
