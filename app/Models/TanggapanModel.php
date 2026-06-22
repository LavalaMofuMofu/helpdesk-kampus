<?php

namespace App\Models;

use CodeIgniter\Model;

class TanggapanModel extends Model
{
    protected $table          = 'tanggapan';
    protected $primaryKey     = 'id';
    protected $returnType     = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields  = true;

    protected $allowedFields  = ['pengaduan_id', 'admin_id', 'isi_tanggapan'];

    protected $useTimestamps  = true;
    protected $dateFormat     = 'datetime';

    protected $validationRules = [
        'pengaduan_id'  => 'required|is_natural_no_zero',
        'admin_id'      => 'required|is_natural_no_zero',
        'isi_tanggapan' => 'required|min_length[5]',
    ];

    /**
     * Ambil semua tanggapan lengkap dengan info pengaduan terkait
     * (kategori, status, isi laporan), dipakai di halaman data_tanggapan.
     */
    public function semuaDenganPengaduan(): array
    {
        return $this->select('tanggapan.*, pengaduan.kategori, pengaduan.deskripsi, pengaduan.status, pengaduan.created_at as tanggal_laporan')
                    ->join('pengaduan', 'pengaduan.id = tanggapan.pengaduan_id')
                    ->orderBy('tanggapan.created_at', 'DESC')
                    ->findAll();
    }
}
