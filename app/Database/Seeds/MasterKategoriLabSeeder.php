<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MasterKategoriLabSeeder extends Seeder
{
    public function run()
    {
         $data = [
            [
                'kategori' => 'Lab.Lingkungan',
                'is_active' => 1,
                'deleted' => 0,
                'created_at' => '2026-02-04 05:31:03',
                'updated_at' => '2026-02-04 05:31:03',
                'created_by' => 'prola',
                'updated_by' => null,
                'deleted_at' => null,
                'deleted_by' => null,
            ],
            [
                'kategori' => 'Lab.Penyakit',
                'is_active' => 1,
                'deleted' => 0,
                'created_at' => '2026-02-04 05:31:03',
                'updated_at' => '2026-02-04 05:31:03',
                'created_by' => 'prola',
                'updated_by' => null,
                'deleted_at' => null,
                'deleted_by' => null,
            ],
            [
                'kategori' => 'Lab.Kalibrasi',
                'is_active' => 1,
                'deleted' => 0,
                'created_at' => '2026-02-04 05:31:03',
                'updated_at' => '2026-02-04 05:31:03',
                'created_by' => 'prola',
                'updated_by' => null,
                'deleted_at' => null,
                'deleted_by' => null,
            ]
        ];

        // Menggunakan Query Builder
        $this->db->table('master_kategori_lab')->insertBatch($data);
    }
}
