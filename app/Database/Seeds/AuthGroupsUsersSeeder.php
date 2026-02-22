<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AuthGroupsUsersSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'group_id' => 3,
                'user_id'    => 2,
                'created_at' => '2026-02-04 05:31:03',
                'updated_at' => '2026-02-04 05:31:03',
            ]
        ];

        // Menggunakan Query Builder
        $this->db->table('auth_groups_users')->insertBatch($data);
    }
}
