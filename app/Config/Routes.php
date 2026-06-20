<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');
$routes->get('/dashboard', 'Home::dashboard');
$routes->get('/form_laporan', 'Home::form_laporan');
$routes->get('/riwayat_laporan', 'Home::riwayat_laporan');
$routes->get('/registrasi', 'Home::registrasi');
$routes->get('/admin_dashboard', 'Home::adminDashboard');
$routes->get('/admin_tanggapan', 'Home::adminTanggapan');
$routes->get('/data_tanggapan', 'Home::dataTanggapan');
$routes->get('/data_pengguna', 'Home::dataPengguna');
$routes->get('/profil/(:segment)', 'Home::profil/$1');