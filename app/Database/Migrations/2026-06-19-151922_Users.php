<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'nomor_induk' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
                'unique'     => true, // NIM/NIP tidak boleh ada yang kembar
            ],
            'password' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'role' => [
                'type'       => 'ENUM',
                'constraint' => ['admin', 'mahasiswa'],
                'default'    => 'mahasiswa',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        
        // Membuat Primary Key
        $this->forge->addKey('id', true);
        
        // Mengeksekusi pembuatan tabel
        $this->forge->createTable('users');
    }

    public function down()
    {
        // Perintah untuk menghapus tabel (saat rollback)
        $this->forge->dropTable('users');
    }
}