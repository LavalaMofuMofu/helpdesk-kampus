<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            // Akun 1: Administrator
            [
                'nama'        => 'Administrator Kampus',
                'nomor_induk' => '198012345678',
                'email'       => 'admin@kampus.ac.id',
                'password'    => password_hash('admin123', PASSWORD_DEFAULT), // Password: admin123
                'role'        => 'admin',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
            // Akun 2: Mahasiswa 
            [
                'nama'        => 'Muhammad Fullan', 
                'nomor_induk' => '2410817210005',
                'email'       => 'fullan@mhs.ac.id',
                'password'    => password_hash('mahasiswa123', PASSWORD_DEFAULT), // Password: mahasiswa123
                'role'        => 'mahasiswa',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ]
        ];

        // Mengeksekusi perintah untuk memasukkan data ke tabel users
        $this->db->table('users')->insertBatch($data);
    }
}