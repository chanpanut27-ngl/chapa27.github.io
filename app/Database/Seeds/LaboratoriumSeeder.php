<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class LaboratoriumSeeder extends Seeder
{
    public function run()
    {
         $data = [
            [
                'kode_lab' => 'K',
                'nama_lab' => 'Laboratorium Fisika Kimia Zat Cair',
                'lantai' => 2,
                'id_kat_lab' => 1,
                'kode_instalasi' => 'KI.01',
                'is_active' => 1,
                'deleted' => 0,
                'created_at' => '2026-01-31 10:30:18',
                'updated_at' => '2026-01-31 10:51:13',
                'created_by' => 'prola',
                'updated_by' => null,
                'deleted_at' => null,
                'deleted_by' => null
            ],
            [
                'kode_lab' => 'KP',
                'nama_lab' => 'Laboratorium Fisika Kimia Zat Padat dan B3',
                'lantai' => 4,
                'id_kat_lab' => 1,
                'kode_instalasi' => 'KI.01',
                'is_active' => 1,
                'deleted' => 0,
                'created_at' => '2026-01-31 10:31:01',
                'updated_at' => '2026-01-31 10:51:10',
                'created_by' => 'prola',
                'updated_by' => null,
                'deleted_at' => null,
                'deleted_by' => null
            ],
            [
                'kode_lab' => 'U',
                'nama_lab' => 'Laboratorium Fisika Kimia Udara dan Radiasi',
                'lantai' => 4,
                'id_kat_lab' => 1,
                'kode_instalasi' => 'KI.01',
                'is_active' => 1,
                'deleted' => 0,
                'created_at' => '2026-01-31 10:42:06',
                'updated_at' => '2026-01-31 10:51:06',
                'created_by' => 'prola',
                'updated_by' => null,
                'deleted_at' => null,
                'deleted_by' => null
            ],
            [
                'kode_lab' => 'B',
                'nama_lab' => 'Laboratorium Biologi Lingkungan',
                'lantai' => 4,
                'id_kat_lab' => 1,
                'kode_instalasi' => 'KI.01',
                'is_active' => 1,
                'deleted' => 0,
                'created_at' => '2026-01-31 10:42:58',
                'updated_at' => '2026-01-31 10:51:03',
                'created_by' => 'prola',
                'updated_by' => null,
                'deleted_at' => null,
                'deleted_by' => null
            ],
            [
                'kode_lab' => 'EN',
                'nama_lab' => 'Laboratorium VBPP',
                'lantai' => 2,
                'id_kat_lab' => 1,
                'kode_instalasi' => 'KI.01',
                'is_active' => 1,
                'deleted' => 0,
                'created_at' => '2026-01-31 10:43:48',
                'updated_at' => '2026-01-31 10:51:00',
                'created_by' => 'prola',
                'updated_by' => null,
                'deleted_at' => null,
                'deleted_by' => null
            ],
            [
                'kode_lab' => 'MB',
                'nama_lab' => 'Laboratorium Mikrobiologi & Biomolekuler (PCR)',
                'lantai' => 3,
                'id_kat_lab' => 1,
                'kode_instalasi' => 'KI.01',
                'is_active' => 1,
                'deleted' => 0,
                'created_at' => '2026-01-31 10:44:19',
                'updated_at' => '2026-01-31 10:50:53',
                'created_by' => 'prola',
                'updated_by' => null,
                'deleted_at' => null,
                'deleted_by' => null
            ],
            [
                'kode_lab' => 'PK',
                'nama_lab' => 'Laboratorium Patologi Klinik & Imunologi',
                'lantai' => 3,
                'id_kat_lab' => 2,
                'kode_instalasi' => 'KI.03',
                'is_active' => 1,
                'deleted' => 0,
                'created_at' => '2026-01-31 10:46:20',
                'updated_at' => '2026-01-31 10:50:50',
                'created_by' => 'prola',
                'updated_by' => null,
                'deleted_at' => null,
                'deleted_by' => null
            ],
            
        ];

        // Menggunakan insertBatch untuk memasukkan banyak data sekaligus [5]
        $this->db->table('master_laboratorium')->insertBatch($data);
    }
}
