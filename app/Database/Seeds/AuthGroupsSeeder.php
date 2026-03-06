<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AuthGroupsSeeder extends Seeder
{
    public function run()
    {
         $data = [
            [
                'name' => 'admin',
                'description'    => 'Site Administrator',
                'created_at' => '2026-02-04 05:31:03',
                'updated_at' => NULL,
                'created_by' => 'prola',
                'updated_by' => ''
            ],
            [
                'name' => 'user',
                'description'    => 'Site User',
                'created_at' => '2026-02-04 05:31:03',
                'updated_at' => NULL,
                'created_by' => 'prola',
                'updated_by' => ''
            ],
            [
                'name' => 'pelanggan',
                'description' => 'Site Pelanggan',
                'created_at' => '2026-02-04 05:31:21',
                'updated_at' => NULL,
                'created_by' => 'prola',
                'updated_by' => ''
            ]
        ];

        // Menggunakan Query Builder
        $this->db->table('auth_groups')->insertBatch($data);
    }
}
