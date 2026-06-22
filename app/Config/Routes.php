<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

// ===================== PUBLIC (belum login) =====================
$routes->get('/', 'Auth::index');
$routes->post('/login', 'Auth::login');
$routes->get('/registrasi', 'Auth::showRegistrasi');
$routes->post('/registrasi', 'Auth::registrasi');
$routes->get('/logout', 'Auth::logout');

// ===================== MAHASISWA & ADMIN (wajib login) =====================
// Semua route di grup ini otomatis dilindungi AuthFilter (lihat app/Filters/AuthFilter.php).
// Kalau session belum login, otomatis dilempar balik ke halaman login.
$routes->group('', ['filter' => 'auth'], static function ($routes) {

    $routes->get('/dashboard', 'Home::dashboard');
    $routes->get('/profil/(:segment)', 'Home::profil/$1');

    $routes->get('/form_laporan', 'Pengaduan::formLaporan');
    $routes->post('/form_laporan', 'Pengaduan::simpanLaporan');
    $routes->get('/riwayat_laporan', 'Pengaduan::riwayatLaporan');
});

// ===================== KHUSUS ADMIN =====================
// 'auth' dulu (pastikan login), baru 'adminOnly' (pastikan role-nya admin).
$routes->group('', ['filter' => ['auth', 'adminOnly']], static function ($routes) {

    $routes->get('/admin_dashboard', 'Admin::dashboard');
    $routes->post('/admin_dashboard/hapus/(:num)', 'Admin::hapusPengaduan/$1');

    $routes->get('/admin_tanggapan', 'Admin::tanggapanForm');
    $routes->post('/admin_tanggapan', 'Admin::simpanTanggapan');

    $routes->get('/data_tanggapan', 'Admin::dataTanggapan');
    $routes->post('/data_tanggapan/update/(:num)', 'Admin::updateTanggapan/$1');
    $routes->post('/data_tanggapan/hapus/(:num)', 'Admin::hapusTanggapan/$1');

    $routes->get('/data_pengguna', 'Admin::dataPengguna');
    $routes->post('/data_pengguna/tambah', 'Admin::tambahPengguna');
    $routes->post('/data_pengguna/update/(:num)', 'Admin::updatePengguna/$1');
    $routes->post('/data_pengguna/hapus/(:num)', 'Admin::hapusPengguna/$1');
});
