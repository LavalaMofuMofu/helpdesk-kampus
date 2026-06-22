<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    protected UserModel $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    /**
     * Menampilkan halaman login (route: GET /)
     */
    public function index(): mixed
    {
        // Kalau sudah login, jangan tampilkan login lagi, langsung lempar ke dashboard masing-masing.
        if (session()->get('logged_in')) {
            return $this->redirectSesuaiRole();
        }

        return view('login');
    }

    /**
     * Memproses submit form login (route: POST /login)
     */
    public function login()
    {
        $nomorInduk = trim((string) $this->request->getPost('nomor_induk'));
        $password   = (string) $this->request->getPost('password');

        if ($nomorInduk === '' || $password === '') {
            session()->setFlashdata('error', 'Username/NIM dan password wajib diisi.');
            return redirect()->to('/')->withInput();
        }

        $user = $this->userModel->findByNomorInduk($nomorInduk);

        // Penting: cek user ada DULU baru verifikasi password.
        // Jangan bedakan pesan error "user tidak ada" vs "password salah"
        // supaya orang luar tidak bisa menebak NIM mana yang terdaftar.
        if (! $user || ! password_verify($password, $user['password'])) {
            session()->setFlashdata('error', 'Username/NIM atau password salah.');
            return redirect()->to('/')->withInput();
        }

        session()->set([
            'user_id'     => $user['id'],
            'nama'        => $user['nama'],
            'nomor_induk' => $user['nomor_induk'],
            'email'       => $user['email'],
            'role'        => $user['role'],
            'logged_in'   => true,
        ]);

        return $this->redirectSesuaiRole();
    }

    /**
     * Menampilkan halaman registrasi (route: GET /registrasi)
     */
    public function showRegistrasi(): string
    {
        return view('registrasi');
    }

    /**
     * Memproses submit form registrasi (route: POST /registrasi)
     * Akun baru selalu dibuat dengan role 'mahasiswa' -- pembuatan akun
     * admin hanya boleh lewat panel Data Pengguna oleh admin yang sudah login.
     */
    public function registrasi()
    {
        $rules = [
            'nama'        => 'required|min_length[3]|max_length[100]',
            'nomor_induk' => 'required|min_length[3]|max_length[20]|is_unique[users.nomor_induk]',
            'password'    => 'required|min_length[6]',
        ];

        if (! $this->validate($rules)) {
            session()->setFlashdata('error', implode(' ', $this->validator->getErrors()));
            return redirect()->to('/registrasi')->withInput();
        }

        $id = $this->userModel->insert([
            'nama'        => $this->request->getPost('nama'),
            'nomor_induk' => $this->request->getPost('nomor_induk'),
            'email'       => $this->request->getPost('email'),
            'password'    => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role'        => 'mahasiswa',
        ]);

        if (! $id) {
            session()->setFlashdata('error', implode(' ', $this->userModel->errors()));
            return redirect()->to('/registrasi')->withInput();
        }

        session()->setFlashdata('sukses', 'Akun berhasil dibuat, silakan login.');
        return redirect()->to('/');
    }

    /**
     * Logout: hancurkan session lalu kembali ke halaman login.
     */
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }

    private function redirectSesuaiRole()
    {
        if (session()->get('role') === 'admin') {
            return redirect()->to('/admin_dashboard');
        }

        return redirect()->to('/dashboard');
    }
}