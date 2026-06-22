<?php

namespace App\Controllers;

use App\Models\PengaduanModel;
use App\Models\TanggapanModel;
use App\Models\UserModel;

class Admin extends BaseController
{
    protected PengaduanModel $pengaduanModel;
    protected TanggapanModel $tanggapanModel;
    protected UserModel $userModel;

    public function __construct()
    {
        $this->pengaduanModel = new PengaduanModel();
        $this->tanggapanModel = new TanggapanModel();
        $this->userModel      = new UserModel();
    }

    // ==========================================================
    //  DATA PENGADUAN (dashboard admin)
    // ==========================================================

    /**
     * route: GET /admin_dashboard
     */
    public function dashboard(): string
    {
        $semua = $this->pengaduanModel->semuaDenganPelapor();

        // Dipisah di sisi server supaya view tinggal looping, tidak perlu logic filter di JS.
        $proses  = array_values(array_filter($semua, fn ($row) => $row['status'] !== 'selesai'));
        $selesai = array_values(array_filter($semua, fn ($row) => $row['status'] === 'selesai'));

        return view('admin_dashboard', [
            'daftarProses'  => $proses,
            'daftarSelesai' => $selesai,
        ]);
    }

    /**
     * route: POST /admin_dashboard/hapus/(:num)
     */
    public function hapusPengaduan($id)
    {
        $this->pengaduanModel->delete($id);
        session()->setFlashdata('sukses', 'Data pengaduan berhasil dihapus dari panel.');
        return redirect()->to('/admin_dashboard');
    }

    // ==========================================================
    //  TANGGAPAN
    // ==========================================================

    /**
     * route: GET /admin_tanggapan?id=...
     */
    public function tanggapanForm(): string
    {
        $id = (int) ($this->request->getGet('id') ?? 0);
        $pengaduan = $this->pengaduanModel->detailDenganPelapor($id);

        if (! $pengaduan) {
            session()->setFlashdata('error', 'Laporan pengaduan tidak ditemukan.');
            return redirect()->to('/admin_dashboard');
        }

        return view('admin_tanggapan', ['pengaduan' => $pengaduan]);
    }

    /**
     * route: POST /admin_tanggapan
     */
    public function simpanTanggapan()
    {
        $pengaduanId = (int) $this->request->getPost('pengaduan_id');
        $status      = $this->request->getPost('status');
        $isi         = $this->request->getPost('isi_tanggapan');

        $rules = [
            'pengaduan_id'  => 'required|is_natural_no_zero',
            'status'        => 'required|in_list[proses,selesai]',
            'isi_tanggapan' => 'required|min_length[5]',
        ];

        if (! $this->validate($rules)) {
            session()->setFlashdata('error', implode(' ', $this->validator->getErrors()));
            return redirect()->to('/admin_tanggapan?id=' . $pengaduanId)->withInput();
        }

        $tanggapanId = $this->tanggapanModel->insert([
            'pengaduan_id'  => $pengaduanId,
            'admin_id'      => session()->get('user_id'),
            'isi_tanggapan' => $isi,
        ]);

        if (! $tanggapanId) {
            session()->setFlashdata('error', implode(' ', $this->tanggapanModel->errors()));
            return redirect()->to('/admin_tanggapan?id=' . $pengaduanId)->withInput();
        }

        // skipValidation(true): ini update PARSIAL (cuma kolom status), sedangkan
        // $validationRules di PengaduanModel mewajibkan kategori/deskripsi/dll yang
        // tidak ikut dikirim di sini. Nilai $status sendiri sudah divalidasi in_list[...] di atas.
        $this->pengaduanModel->skipValidation(true)->update($pengaduanId, ['status' => $status]);

        session()->setFlashdata('sukses', 'Tanggapan berhasil disimpan dan status laporan telah diperbarui.');
        return redirect()->to('/admin_dashboard');
    }

    /**
     * route: GET /data_tanggapan
     */
    public function dataTanggapan(): string
    {
        return view('data_tanggapan', ['daftarTanggapan' => $this->tanggapanModel->semuaDenganPengaduan()]);
    }

    /**
     * route: POST /data_tanggapan/update/(:num)
     */
    public function updateTanggapan($id)
    {
        $rules = [
            'status'        => 'required|in_list[proses,selesai]',
            'isi_tanggapan' => 'required|min_length[5]',
        ];

        if (! $this->validate($rules)) {
            session()->setFlashdata('error', implode(' ', $this->validator->getErrors()));
            return redirect()->to('/data_tanggapan');
        }

        $tanggapan = $this->tanggapanModel->find($id);

        if (! $tanggapan) {
            session()->setFlashdata('error', 'Data tanggapan tidak ditemukan.');
            return redirect()->to('/data_tanggapan');
        }

        // skipValidation(true) di kedua update di bawah: ini update PARSIAL, sedangkan
        // $validationRules di masing-masing Model mewajibkan kolom lain (pengaduan_id,
        // admin_id, dst) yang tidak ikut dikirim di sini. isi_tanggapan & status
        // sudah divalidasi lewat $rules di atas.
        if (! $this->tanggapanModel->skipValidation(true)->update($id, ['isi_tanggapan' => $this->request->getPost('isi_tanggapan')])) {
            session()->setFlashdata('error', 'Gagal memperbarui tanggapan.');
            return redirect()->to('/data_tanggapan');
        }

        $this->pengaduanModel->skipValidation(true)->update($tanggapan['pengaduan_id'], ['status' => $this->request->getPost('status')]);

        session()->setFlashdata('sukses', 'Data tanggapan telah berhasil diperbarui.');
        return redirect()->to('/data_tanggapan');
    }

    /**
     * route: POST /data_tanggapan/hapus/(:num)
     * Catatan: ini cuma menghapus baris tanggapannya, status pengaduan di tabel
     * pengaduan tetap seperti terakhir (tidak otomatis dikembalikan ke 'proses').
     */
    public function hapusTanggapan($id)
    {
        $this->tanggapanModel->delete($id);
        session()->setFlashdata('sukses', 'Data tanggapan berhasil dihapus.');
        return redirect()->to('/data_tanggapan');
    }

    // ==========================================================
    //  DATA PENGGUNA
    // ==========================================================

    /**
     * route: GET /data_pengguna
     */
    public function dataPengguna(): string
    {
        return view('data_pengguna', ['daftarPengguna' => $this->userModel->orderBy('created_at', 'ASC')->findAll()]);
    }

    /**
     * route: POST /data_pengguna/tambah
     */
    public function tambahPengguna()
    {
        $password = (string) $this->request->getPost('password');

        if (strlen($password) < 6) {
            session()->setFlashdata('error', 'Password minimal 6 karakter.');
            return redirect()->to('/data_pengguna')->withInput();
        }

        $id = $this->userModel->insert([
            'nama'        => $this->request->getPost('nama'),
            'nomor_induk' => $this->request->getPost('nomor_induk'),
            'role'        => $this->request->getPost('role'),
            'password'    => password_hash($password, PASSWORD_DEFAULT),
        ]);

        // insert() pada UserModel mengembalikan insert ID kalau berhasil, atau false kalau validasi gagal
        // (mis. NIM sudah dipakai -- lihat $validationRules di UserModel). Errors-nya diambil dari Model
        // supaya pesannya konsisten dengan pesan custom yang sudah didefinisikan di sana.
        if (! $id) {
            session()->setFlashdata('error', implode(' ', $this->userModel->errors()));
            return redirect()->to('/data_pengguna')->withInput();
        }

        session()->setFlashdata('sukses', 'Data pengguna baru telah berhasil ditambahkan.');
        return redirect()->to('/data_pengguna');
    }

    /**
     * route: POST /data_pengguna/update/(:num)
     */
    public function updatePengguna($id)
    {
        $data = [
            'id'          => $id, // Wajib disertakan: dipakai Model untuk substitusi placeholder {id} pada rule is_unique[...,id,{id}] di UserModel, supaya NIM milik baris ini sendiri tidak dianggap "sudah dipakai". Otomatis dibuang lagi sebelum query UPDATE karena 'id' bukan bagian dari $allowedFields.
            'nama'        => $this->request->getPost('nama'),
            'nomor_induk' => $this->request->getPost('nomor_induk'),
            'role'        => $this->request->getPost('role'),
        ];

        // Password baru sifatnya opsional saat edit -- cuma di-update kalau diisi.
        $passwordBaru = $this->request->getPost('password');
        if (! empty($passwordBaru)) {
            $data['password'] = password_hash($passwordBaru, PASSWORD_DEFAULT);
        }

        if (! $this->userModel->update($id, $data)) {
            session()->setFlashdata('error', implode(' ', $this->userModel->errors()));
            return redirect()->to('/data_pengguna');
        }

        session()->setFlashdata('sukses', 'Data pengguna telah berhasil diperbarui.');
        return redirect()->to('/data_pengguna');
    }

    /**
     * route: POST /data_pengguna/hapus/(:num)
     */
    public function hapusPengguna($id)
    {
        if ((int) $id === (int) session()->get('user_id')) {
            session()->setFlashdata('error', 'Tidak bisa menghapus akun yang sedang Anda gunakan untuk login.');
            return redirect()->to('/data_pengguna');
        }

        $this->userModel->delete($id);
        session()->setFlashdata('sukses', 'Pengguna berhasil dihapus dari sistem.');
        return redirect()->to('/data_pengguna');
    }
}
