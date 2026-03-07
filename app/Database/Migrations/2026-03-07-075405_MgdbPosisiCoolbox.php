<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MgdbPosisiCoolbox extends Migration
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
            'id_coolbox' => [
                'type'       => 'INT',
                'constraint' => 5,
                'unsigned'       => true,
            ],
            'status' => [
                'type'       => 'INT',
                'constraint' => 1
            ],
            'tanggal' => [
                'type'       => 'DATE',
            ],
            'jam' => [
                'type'       => 'TIME',
            ],
            'keterangan' => [
                'type'       => 'TEXT'
            ],
            'foto' => [
                'type'       => 'VARCHAR',
                'constraint' => '255'
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
        $this->forge->addForeignKey('id_coolbox', 'master_coolbox', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('posisi_coolbox');
    }

    public function down()
    {
        $this->forge->dropTable('posisi_coolbox');
    }
}
