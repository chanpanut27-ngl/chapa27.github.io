<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MgdbKajiUlangPermintaanKontrak extends Migration
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
            'alat_utama' => [
                'type'       => 'VARCHAR',
                'constraint' => '150'
            ],
            'alat_pendukung' => [
                'type'       => 'VARCHAR',
                'constraint' => '150'
            ],
            'personil_lab' => [
                'type'       => 'VARCHAR',
                'constraint' => '225'
            ],
            'metode_pemeriksaan' => [
                'type'       => 'VARCHAR',
                'constraint' => '150'
            ],
            'uji_mutu' => [
                'type'       => 'VARCHAR',
                'constraint' => '150'
            ],
            'reagensa_dan_media' => [
                'type'       => 'VARCHAR',
                'constraint' => '150'
            ],
            'kode_pengantar' => [
                'type'       => 'CHAR',
                'constraint' => '10'
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
                'type' => 'DATETIME',
                'default' => 'current_timestamp'
            ],
            'deleted_at datetime default current_timestamp',
            'deleted_by'     => [
                'type'       => 'VARCHAR',
                'constraint' => '100'
            ]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('kaji_ulang_permintaan_kontrak');
    }

    public function down()
    {
        $this->forge->dropTable('kaji_ulang_permintaan_kontrak');
    }
}
