<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\PengaduanModel;

class Home extends BaseController
{
    /**
     * route: GET /dashboard
     * Halaman pilihan kategori untuk mahasiswa. Isinya statis (7 kategori tetap),
     * jadi tidak perlu data dari database.
     */
    public function dashboard(): string
    {
        return view('dashboard');
    }

    /**
     * route: GET /profil/(:segment)
     * Catatan: segmen $role di URL ($1 dari Routes.php) sekarang hanya dipakai
     * sebagai fallback kalau session somehow kosong. Sumber data sebenarnya
     * adalah session user yang sedang login + query statistik dari database,
     * BUKAN lagi data simulasi seperti sebelumnya.
     */
    public function profil($role = null): string
    {
        $userModel      = new UserModel();
        $pengaduanModel = new PengaduanModel();
        $userId         = session()->get('user_id');

        if (session()->get('role') === 'admin') {
            // Untuk admin, statistik yang relevan adalah ringkasan SELURUH sistem,
            // bukan punya admin itu sendiri (admin tidak membuat pengaduan).
            $semua = $pengaduanModel->findAll();
            $statistik = [
                'total'   => count($semua),
                'proses'  => count(array_filter($semua, fn ($p) => $p['status'] === 'proses')),
                'selesai' => count(array_filter($semua, fn ($p) => $p['status'] === 'selesai')),
            ];
        } else {
            $statistik = $userModel->hitungStatistikPengaduan($userId);
        }

        $data = [
            'nama'        => session()->get('nama'),
            'role'        => session()->get('role'),
            'nomor_induk' => session()->get('nomor_induk'),
            'email'       => session()->get('email') ?: '-',
            'statistik'   => $statistik,
        ];

        return view('profil', $data);
    }
}
