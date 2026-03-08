<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MgdbKondisiLingkunganPengantarLab extends Migration
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
            'kondisi_lingkungan_sekitar_sampel' => [
                'type'       => 'TEXT'
            ],
            'catatan_abnormalitas' => [
                'type'       => 'TEXT'
            ],
            'kode_pengantar' => [
                'type'       => 'CHAR',
                'constraint' => '20'
            ],
            'id_kat_lab' => [
                'type'       => 'INT'
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
        $this->forge->createTable('kondisi_lingkungan_pengantar');
    }

    public function down()
    {
        $this->forge->dropTable('kondisi_lingkungan_pengantar');
    }
}
