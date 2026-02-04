<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class InstalasiSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'kode_instalasi' => 'KI.01',
                'nama_instalasi' => 'Instalasi Laboratorium Kesehatan Lingkungan, Vektor dan Binatang Pembawa Penyakit',
                'id_kat_lab' => 1,
                'is_active' => 1,
                'deleted' => 0,
                'created_at' => '2026-01-31 08:11:20',
                'updated_at' => '2026-01-31 08:22:52',
                'created_by' => 'prola',
                'updated_by' => 'prola',
                'deleted_at' => null,
                'deleted_by' => null
            ],
            [
                'kode_instalasi' => 'KI.02',
                'nama_instalasi' => 'Instalasi Laboratorium Mikrobiologi dan Biomolekuler',
                'id_kat_lab' => 1,
                'is_active' => 1,
                'deleted' => 0,
                'created_at' => '2026-01-31 08:11:42',
                'updated_at' => '2026-01-31 08:15:28',
                'created_by' => 'prola',
                'updated_by' => 'prola',
                'deleted_at' => null,
                'deleted_by' => null
            ],
            [
                'kode_instalasi' => 'KI.03',
                'nama_instalasi' => 'Instalasi Laboratorium Patologi Klinik dan Imunologi',
                'id_kat_lab' => 2,
                'is_active' => 1,
                'deleted' => 0,
                'created_at' => '2026-01-31 08:16:30',
                'updated_at' => '2026-01-31 08:16:30',
                'created_by' => 'prola',
                'updated_by' => null,
                'deleted_at' => null,
                'deleted_by' => null
            ],
            [
                'kode_instalasi' => 'KI.04',
                'nama_instalasi' => 'Instalasi Laboratorium Kalibrasi',
                'id_kat_lab' => 3,
                'is_active' => 0,
                'deleted' => 0,
                'created_at' => '2026-01-31 08:23:25',
                'updated_at' => '2026-01-31 10:28:57',
                'created_by' => 'prola',
                'updated_by' => 'prola',
                'deleted_at' => null,
                'deleted_by' => null
            ],
            [
                'kode_instalasi' => 'KI.05',
                'nama_instalasi' => 'Instalasi Sampling dan Media Reagensia',
                'id_kat_lab' => null,
                'is_active' => 0,
                'deleted' => 0,
                'created_at' => '2026-01-31 08:23:40',
                'updated_at' => '2026-01-31 10:28:14',
                'created_by' => 'prola',
                'updated_by' => 'prola',
                'deleted_at' => null,
                'deleted_by' => null
            ],
            [
                'kode_instalasi' => 'KI.06',
                'nama_instalasi' => 'Instalasi K3, Limbah dan Biorepository',
                'id_kat_lab' => null,
                'is_active' => 0,
                'deleted' => 0,
                'created_at' => '2026-01-31 08:23:54',
                'updated_at' => '2026-01-31 10:29:35',
                'created_by' => 'prola',
                'updated_by' => 'prola',
                'deleted_at' => null,
                'deleted_by' => null
            ],
        ];

        // Menggunakan insertBatch untuk memasukkan banyak data sekaligus [5]
        $this->db->table('master_instalasi')->insertBatch($data);
    }
}
