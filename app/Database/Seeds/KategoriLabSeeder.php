<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class KategoriLabSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'kategori' => 'Lab.Lingkungan',
                'is_active' => 1,
                'deleted' => 0,
                'created_at' => '2026-02-04 09:45:05',
                'updated_at' => '2026-02-04 09:45:05',
                'created_by' => 'prola',
                'updated_by' => 'prola',
                'deleted_at' => null,
                'deleted_by' => null
            ],
            [
                'kategori' => 'Lab.Penyakit',
                'is_active' => 1,
                'deleted' => 0,
                'created_at' => '2026-02-04 09:45:05',
                'updated_at' => '2026-02-04 09:45:05',
                'created_by' => 'prola',
                'updated_by' => 'prola',
                'deleted_at' => null,
                'deleted_by' => null
            ],
            [
                'kategori' => 'Lab.Kalibrasi',
                'is_active' => 1,
                'deleted' => 0,
                'created_at' => '2026-02-04 09:45:05',
                'updated_at' => '2026-02-04 09:45:05',
                'created_by' => 'prola',
                'updated_by' => 'prola',
                'deleted_at' => null,
                'deleted_by' => null
            ],
            
        ];

        // Menggunakan insertBatch untuk memasukkan banyak data sekaligus [5]
        $this->db->table('master_kategori_lab')->insertBatch($data);
    }

}
