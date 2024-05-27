<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Pages::index');
$routes->get('/listbuku', 'listbuku::index');
$routes->get('/pages/contact', 'Pages::contact');
$routes->get('/buku', 'buku::index');
$routes->get('/buku/(:segment)', 'Buku::detail/$1');
// $routes->get('/tersedia/(:segment)', 'Tersedia::index/$1'); hanya untuk cek data yang tersedia
$routes->get('/review/(:segment)', 'Review::index/$1');
$routes->post('/review/save', 'review::index');
$routes->get('/listbuku/buku', 'ListBuku::');
 