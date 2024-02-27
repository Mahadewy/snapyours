<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Beranda::login');
$routes->get('/beranda', 'Beranda::beranda');
$routes->get('/login', 'Beranda::login');
$routes->get('/register', 'Beranda::register');
$routes->get('/profile/(:num)', 'Beranda::profile/$1');
$routes->get('/editprofile/(:num)', 'Beranda::editprofile/$1');
$routes->get('/unggah', 'Beranda::unggah');
$routes->post('/unggahfoto', 'Unggah::upload');
$routes->post('/valid_login', 'Auth::valid_login');
$routes->post('/valid_register', 'Auth::valid_register');
$routes->get('/galeri/(:num)', 'komentar::galeri/$1');
$routes->post('/komentar-save/(:num)', 'Komentar::save/$1');
$routes->post('/update/(:num)', 'Editprofile::update/$1');
$routes->get('/delete/(:num)', 'Unggah::delete/$1');
$routes->get('/auth/activate/(:any)', 'Auth::activate/$1');
$routes->post('/search', 'Search::search');
$routes->get('/(:num)', 'Beranda::kategori/$1');
$routes->get('/editpostingan/(:num)', 'Unggah::edit/$1');
$routes->post('/updatepostingan/(:num)', 'Unggah::update/$1');
$routes->get('/like/(:num)', 'Komentar::like/$1');
$routes->get('/unlike/(:num)', 'Komentar::unlike/$1');