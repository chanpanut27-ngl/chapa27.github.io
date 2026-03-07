<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MgdbMasterCoolbox extends Migration
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
            'kode_coolbox' => [
                'type'       => 'CHAR',
                'constraint' => '20',
            ],
            'id_instansi' => [
                'type'       => 'INT',
                'constraint' => 5,
                'unsigned'       => true,
            ],
            'keterangan' => [
                'type'       => 'TEXT'
            ],
            'is_active' => [
                'type'  => 'BOOLEAN',
                'default' => 1
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
        $this->forge->addForeignKey('id_instansi', 'master_instansi', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('master_coolbox');
    }

    public function down()
    {
        $this->forge->dropTable('master_coolbox');
    }
}
