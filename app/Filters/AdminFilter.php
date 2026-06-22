<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

/**
 * AdminFilter: dipasang SETELAH AuthFilter pada route admin.
 * Jadi saat filter ini jalan, user dipastikan sudah login;
 * di sini kita tinggal cek apakah role-nya 'admin'.
 */
class AdminFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();

        if ($session->get('role') !== 'admin') {
            session()->setFlashdata('error', 'Halaman ini khusus untuk Administrator.');
            return redirect()->to('/dashboard');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Tidak ada proses setelah response untuk filter ini.
    }
}
