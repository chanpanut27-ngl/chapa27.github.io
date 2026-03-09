<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MgdbMapPerintahUjiSampel extends Migration
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
            'id_map' => [
                'type'           => 'INT',
                'constraint'     => 5,
            ],
            'id_jenis_sampel' => [
                'type'           => 'INT',
                'constraint'     => 5,
            ],
            'parameter_uji' => [
                'type'       => 'TEXT'
            ],
            'metode_uji' => [
                'type'       => 'TEXT'
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
        $this->forge->createTable('map_perintah_uji_sampel');
    }

    public function down()
    {
        $this->forge->dropTable('map_perintah_uji_sampel');
        
    }
}
