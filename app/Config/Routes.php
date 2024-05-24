<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Pages::index');
$routes->get('/pages/contact', 'Pages::contact');
$routes->get('/buku', 'buku::index');
$routes->get('/buku/(:segment)', 'Buku::detail/$1');
$routes->delete('/user/(:num)', 'Review::delete/$1');
$routes->post('/review/save', 'review::index');
$routes->post('/review/edit', 'review::edit');
$routes->get('/user/(:any)', 'Review::myReview/$1');
