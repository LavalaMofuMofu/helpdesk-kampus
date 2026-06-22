<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;

    // Kolom yang boleh diisi lewat insert()/update()
    protected $allowedFields    = ['nama', 'nomor_induk', 'email', 'password', 'role'];

    // Timestamps otomatis (kolom created_at & updated_at)
    protected $useTimestamps    = true;
    protected $dateFormat       = 'datetime';

    // Validasi dasar. Aturan unique untuk nomor_induk di-skip saat update
    // baris yang sama, makanya pakai placeholder {id} (CI4 otomatis ganti).
    protected $validationRules = [
        'id'          => 'permit_empty|is_natural_no_zero',
        'nama'        => 'required|min_length[3]|max_length[100]',
        'nomor_induk' => 'required|min_length[3]|max_length[20]|is_unique[users.nomor_induk,id,{id}]',
        'email'       => 'permit_empty|valid_email|max_length[100]',
        'role'        => 'required|in_list[admin,mahasiswa]',
    ];

    protected $validationMessages = [
        'nomor_induk' => [
            'is_unique' => 'NIM/NIP ini sudah terdaftar, gunakan nomor lain.',
        ],
    ];

    /**
     * Cari user berdasarkan nomor_induk (dipakai saat login).
     */
    public function findByNomorInduk(string $nomorInduk): ?array
    {
        return $this->where('nomor_induk', $nomorInduk)->first();
    }

    /**
     * Hitung statistik pengaduan milik satu user (dipakai di halaman profil mahasiswa).
     * Catatan: query manual ke tabel pengaduan, bukan lewat PengaduanModel,
     * supaya tidak ada dependensi melingkar antar Model.
     */
    public function hitungStatistikPengaduan(int $userId): array
    {
        $db = \Config\Database::connect();

        $total   = $db->table('pengaduan')->where('user_id', $userId)->countAllResults();
        $proses  = $db->table('pengaduan')->where('user_id', $userId)->where('status', 'proses')->countAllResults();
        $selesai = $db->table('pengaduan')->where('user_id', $userId)->where('status', 'selesai')->countAllResults();

        return ['total' => $total, 'proses' => $proses, 'selesai' => $selesai];
    }
}
