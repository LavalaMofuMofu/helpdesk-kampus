<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

/**
 * AuthFilter: memastikan request datang dari user yang sudah login.
 * Kalau session 'logged_in' tidak ada, lempar balik ke halaman login
 * dengan pesan flashdata.
 */
class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();

        if (! $session->get('logged_in')) {
            session()->setFlashdata('error', 'Silakan login terlebih dahulu untuk mengakses halaman ini.');
            return redirect()->to('/');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Tidak ada proses setelah response untuk filter ini.
    }
}
