<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('login');
    }

    public function dashboard(): string
    {
        return view('dashboard');
    }

    public function form_laporan(): string
    {
        // Menangkap teks kategori dari URL (default 'Kategori Umum' jika kosong)
        $kategori_dipilih = $this->request->getGet('kategori') ?? 'Kategori Umum';
        
        // Membungkus datanya untuk dikirim ke View
        $data = [
            'kategori' => $kategori_dipilih
        ];
        
        return view('form_laporan', $data);
    }

    public function riwayat_laporan(): string
    {
        return view('riwayat_laporan');
    }

    public function registrasi()
    {
        return view('registrasi');
    }

    public function adminDashboard()
    {
        return view('admin_dashboard');
    }

    public function adminTanggapan()
    {
        return view('admin_tanggapan'); // View ini belum kita buat, nanti bisa diarahkan ke halaman lain atau dibuat menyusul
    }

    public function dataTanggapan()
    {
        return view('data_tanggapan');
    }

    public function dataPengguna()
    {
        return view('data_pengguna');
    }

    public function profil($role)
    {
        // Simulasi data user yang sudah diperbaiki tanda kutip dan penamaannya
        $data = [
            'nama'        => ($role == 'admin') ? 'Administrator Kampus' : 'Muhammad Irgi Fahrezha',
            'role'        => $role,
            'nomor_induk' => ($role == 'admin') ? '198012345678' : '2410817210005',
            'email'       => ($role == 'admin') ? 'admin@kampus.ac.id' : 'irgi@mhs.ac.id'
        ];
        
        return view('profil', $data);
    }
}