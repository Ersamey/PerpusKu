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
$routes->delete('/admin/(:num)', 'Admin::delete/$1');
$routes->post('/review/save', 'review::index');
$routes->post('/buku/save', 'Buku::save');
$routes->post('/buku/update', 'Buku::update');
$routes->delete('/buku/(:num)', 'Buku::delete/$1');
$routes->post('/review/edit', 'review::edit');
$routes->get('/user/(:any)', 'Review::myReview/$1');
$routes->get('/admin', 'Admin::index', ['filter' => 'role:admin']);
$routes->get('/admin/index', 'Admin::index', ['filter' => 'role:admin']);
$routes->post('/admin/save', 'Admin::ubahRole', ['filter' => 'role:admin']);
$routes->get('/perpustakaan', 'Perpustakaan::index', ['filter' => 'role:perpustakaan']);
$routes->get('/perpustakaan/index', 'Perpustakaan::index', ['filter' => 'role:perpustakaan']);
$routes->get('/perpustakaan/buku', 'Buku::listbuku', ['filter' => 'role:perpustakaan']);
$routes->get('/perpustakaan/edit', 'Tersedia::add', ['filter' => 'role:perpustakaan']);
$routes->post('/tersedia/add', 'Tersedia::add', ['filter' => 'role:perpustakaan']);
$routes->post('/tersedia/save', 'Tersedia::editStatus', ['filter' => 'role:perpustakaan']);
$routes->post('/home/editNama', 'Home::editNama', ['filter' => 'role:perpustakaan']);
$routes->post('/home/editAlamat', 'Home::editAlamat', ['filter' => 'role:perpustakaan']);
$routes->post('/home/addProfile', 'Home::addProfile', ['filter' => 'role:perpustakaan']);
$routes->post('/perpustakaan/detail', 'Home::perpus');
$routes->post('/tersedia/tempat', 'Tersedia::tempat', ['filter' => 'role:admin']);
$routes->get('/komentar/(:segment)', 'Buku::getallKomen/$1');
