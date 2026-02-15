<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AuthPermissionsSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'manage-master',
                'description'    => 'Manajemen Master',
                'created_at' => '2026-02-04 05:31:03',
                'updated_at' => '2026-02-04 05:31:03',
            ],
            [
                'name' => 'manage-user',
                'description'    => 'Manajemen User',
                'created_at' => '2026-02-04 05:31:03',
                'updated_at' => '2026-02-04 05:31:03',
            ],
            [
                'name' => 'manage-coolbox',
                'description' => 'Manajemen Coolbox',
                'created_at' => '2026-02-04 05:31:21',
                'updated_at' => '2026-02-04 05:31:21',
            ],
            [
                'name' => 'manage-pelayanan',
                'description' => 'Manajemen Pelayanan',
                'created_at' => '2026-02-04 05:31:21',
                'updated_at' => '2026-02-04 05:31:21',
            ]
        ];

        // Menggunakan Query Builder
        $this->db->table('auth_permissions')->insertBatch($data);
    }
}
