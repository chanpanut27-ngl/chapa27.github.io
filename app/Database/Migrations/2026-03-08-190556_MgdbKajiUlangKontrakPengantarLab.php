<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MgdbKajiUlangKontrakPengantarLab extends Migration
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
                'type'       => 'TEXT'
            ],
            'alat_pendukung' => [
                'type'       => 'TEXT'
            ],
            'personil_lab' => [
                'type'       => 'TEXT'
            ],
            'metode_pemeriksaan' => [
                'type'       => 'TEXT'
            ],
            'uji_mutu' => [
                'type'       => 'TEXT'
            ],
            'reagensa_dan_media' => [
                'type'       => 'TEXT'
            ],
            'kode_pengantar' => [
                'type'       => 'CHAR',
                'constraint' => '10'
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
        $this->forge->createTable('kaji_ulang_kontrak_pengantar');
    }

    public function down()
    {
        $this->forge->dropTable('kaji_ulang_kontrak_pengantar');
        
    }
}
