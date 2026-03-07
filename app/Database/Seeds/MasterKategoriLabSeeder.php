<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MasterKategoriLabSeeder extends Seeder
{
    public function run()
    {
         $data = [
            [
                'kategori' => 'Lab. Lingkungan',
                'created_at' => '2026-02-04 05:31:03',
                'updated_at' => '2026-02-04 05:31:03',
                'created_by' => 'prola',
                'updated_by' => null,
                'deleted_at' => null,
                'deleted_by' => null,
            ],
            [
                'kategori' => 'Lab. Penyakit',
                'created_at' => '2026-02-04 05:31:03',
                'updated_at' => '2026-02-04 05:31:03',
                'created_by' => 'prola',
                'updated_by' => null,
                'deleted_at' => null,
                'deleted_by' => null,
            ]
        ];

        $this->db->table('master_kategori_lab')->insertBatch($data);
    }
}
