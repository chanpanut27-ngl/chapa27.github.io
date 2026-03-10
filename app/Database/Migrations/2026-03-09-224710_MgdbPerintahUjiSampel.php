<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MgdbPerintahUjiSampel extends Migration
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
            'id_pengantar_lab' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
            ],
            'id_instalasi' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
            ],
            'sifat_pemeriksaan' => [
                'type'           => 'VARCHAR',
                'constraint'     => '100'
            ],
            'tgl_terima_sampel' => [
                'type'           => 'DATE'
            ],
            'tgl_kirim_sampel_dari_prola' => [
                'type'           => 'DATE'
            ],
            'tgl_terima_sampel_ke_kains_lab' => [
                'type'           => 'DATE'
            ],
            'tgl_selesai_sampel_ke_kains_lab' => [
                'type'           => 'DATE'
            ],
            'tgl_terima_sampel_ke_analis_lab' => [
                'type'          => 'DATE'
            ],
            'kode_pengantar' => [
                'type'           => 'CHAR',
                'constraint'     => '20'
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
        $this->forge->createTable('perintah_uji_sampel');
    }

    public function down()
    {
        $this->forge->dropTable('perintah_uji_sampel');
    }
}
