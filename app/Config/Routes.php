<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Pages::index');
$routes->get('/pages/contact', 'Pages::contact');
$routes->get('/buku', 'buku::index');
$routes->get('/buku/(:segment)', 'Buku::detail/$1');
$routes->get('/tersedia', 'Tersedia::index');
$routes->get('/tersedia/(:segment)', 'Tersedia::index/$1');
