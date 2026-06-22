<?php

namespace App\Models;

use CodeIgniter\Model;

class PengaduanModel extends Model
{
    protected $table          = 'pengaduan';
    protected $primaryKey     = 'id';
    protected $returnType     = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields  = true;

    protected $allowedFields  = [
        'user_id', 'kategori', 'tanggal_kejadian', 'deskripsi', 'foto', 'status',
    ];

    protected $useTimestamps  = true;
    protected $dateFormat     = 'datetime';

    protected $validationRules = [
        'user_id'          => 'required|is_natural_no_zero',
        'kategori'         => 'required|max_length[100]',
        'tanggal_kejadian' => 'required|valid_date',
        'deskripsi'        => 'required|min_length[10]',
        'status'           => 'permit_empty|in_list[menunggu,proses,selesai]',
    ];

    /**
     * Ambil daftar pengaduan milik satu mahasiswa, terbaru duluan.
     * Dipakai di halaman riwayat_laporan.
     */
    public function riwayatMilikUser(int $userId): array
    {
        return $this->where('user_id', $userId)
                    ->orderBy('created_at', 'DESC')
                    ->findAll();
    }

    /**
     * Ambil semua pengaduan beserta nama pelapor (join ke users),
     * dipakai di dashboard admin.
     */
    public function semuaDenganPelapor(): array
    {
        return $this->select('pengaduan.*, users.nama as nama_pelapor')
                    ->join('users', 'users.id = pengaduan.user_id')
                    ->orderBy('pengaduan.created_at', 'DESC')
                    ->findAll();
    }

    /**
     * Ambil satu pengaduan + nama pelapor, dipakai di halaman admin_tanggapan.
     */
    public function detailDenganPelapor(int $id): ?array
    {
        return $this->select('pengaduan.*, users.nama as nama_pelapor')
                    ->join('users', 'users.id = pengaduan.user_id')
                    ->where('pengaduan.id', $id)
                    ->first();
    }
}
