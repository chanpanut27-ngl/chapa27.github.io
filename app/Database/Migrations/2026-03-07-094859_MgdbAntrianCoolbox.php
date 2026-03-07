<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MgdbAntrianCoolbox extends Migration
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
                'type'           => 'INT',
                'constraint'     => 5
            ],
            'no_antrian' => [
                'type'           => 'CHAR',
                'constraint'     => 20
            ],
            'tgl_terima_coolbox' => [
                'type'           => 'DATE'
            ],
            'jam_terima_coolbox' => [
                'type'           => 'TIME'
            ],
            'foto' => [
                'type'       => 'VARCHAR',
                'constraint' => '255'
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
        $this->forge->createTable('antrian_coolbox');
    }

    public function down()
    {
        $this->forge->dropTable('antrian_coolbox');
    }
}
