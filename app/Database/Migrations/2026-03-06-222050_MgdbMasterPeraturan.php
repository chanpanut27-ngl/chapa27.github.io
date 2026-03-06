<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MgdbMasterPeraturan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'peraturan' => [
                'type'       => 'VARCHAR',
                'constraint' => '225',
            ],
            'keterangan' => [
                'type'       => 'TEXT'
            ],
            'is_active' => [
                'type'  => 'BOOLEAN',
                'default' => 1
            ],
            'deleted' => [
                'type'  => 'INT',
                'default' => 0
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime on update current_timestamp',
            'created_by'     => [
                'type'       => 'VARCHAR',
                'constraint' => '150'
            ],
            'updated_by'     => [
                'type'       => 'VARCHAR',
                'constraint' => '150'
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'deleted_by'     => [
                'type'       => 'VARCHAR',
                'constraint' => '150'
            ]
         ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('master_peraturan');
    }

    public function down()
    {
        $this->forge->dropTable('master_peraturan');
    }
}
