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
                'type'           => 'VARCHAR',
                'constraint'     => 100
            ],
            'tgl_terima_sampel' => [
                'type'           => 'DATE'
            ],
            'jam_terima_sampel' => [
                'type'           => 'TIME'
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
            'created_by'     => [
                'type'       => 'VARCHAR',
                'constraint' => '100'
            ],
            'updated_by'     => [
                'type'       => 'VARCHAR',
                'constraint' => '100'
            ],
            'deleted_at' => [
                'type' => 'DATETIME'
            ],
            'deleted_at datetime default current_timestamp',
            'deleted_by'     => [
                'type'       => 'VARCHAR',
                'constraint' => '100'
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

