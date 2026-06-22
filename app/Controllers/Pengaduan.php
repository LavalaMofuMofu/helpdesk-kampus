<?php

namespace App\Controllers;

use App\Models\PengaduanModel;

class Pengaduan extends BaseController
{
    protected PengaduanModel $pengaduanModel;

    public function __construct()
    {
        $this->pengaduanModel = new PengaduanModel();
    }

    /**
     * Menampilkan form pengaduan (route: GET /form_laporan)
     */
    public function formLaporan(): string
    {
        $kategoriDipilih = $this->request->getGet('kategori') ?? 'Kategori Umum';

        return view('form_laporan', ['kategori' => $kategoriDipilih]);
    }

    /**
     * Memproses submit form pengaduan (route: POST /form_laporan)
     */
    public function simpanLaporan()
    {
        $rules = [
            'kategori_laporan' => 'required',
            'tanggal_kejadian' => 'required|valid_date',
            'deskripsi'        => 'required|min_length[10]',
            'foto'             => 'permit_empty|max_size[foto,2048]|ext_in[foto,jpg,jpeg,png,pdf]',
        ];

        if (! $this->validate($rules)) {
            session()->setFlashdata('error', implode(' ', $this->validator->getErrors()));
            return redirect()->to(current_url() . '?kategori=' . urlencode($this->request->getPost('kategori_laporan')))->withInput();
        }

        $namaFile = null;
        $file = $this->request->getFile('foto');

        if ($file && $file->isValid() && ! $file->hasMoved()) {
            $namaFile = $file->getRandomName();
            // Disimpan di public/uploads/pengaduan supaya bisa diakses langsung lewat URL oleh browser.
            $file->move(FCPATH . 'uploads/pengaduan', $namaFile);
        }

        $id = $this->pengaduanModel->insert([
            'user_id'          => session()->get('user_id'),
            'kategori'         => $this->request->getPost('kategori_laporan'),
            'tanggal_kejadian' => $this->request->getPost('tanggal_kejadian'),
            'deskripsi'        => $this->request->getPost('deskripsi'),
            'foto'             => $namaFile,
            'status'           => 'menunggu',
        ]);

        if (! $id) {
            session()->setFlashdata('error', implode(' ', $this->pengaduanModel->errors()));
            return redirect()->to(current_url() . '?kategori=' . urlencode($this->request->getPost('kategori_laporan')))->withInput();
        }

        session()->setFlashdata('sukses', 'Laporan pengaduan Anda telah berhasil masuk ke sistem Helpdesk.');
        return redirect()->to('/riwayat_laporan');
    }

    /**
     * Menampilkan riwayat laporan milik mahasiswa yang sedang login
     * (route: GET /riwayat_laporan)
     */
    public function riwayatLaporan(): string
    {
        $daftar = $this->pengaduanModel->riwayatMilikUser(session()->get('user_id'));

        return view('riwayat_laporan', ['daftarLaporan' => $daftar]);
    }
}
