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
            'kode_pengantar' => [
                'type'           => 'CHAR',
                'constraint'     => '10'
            ],
            'id_pengantar_lhu' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
            ],
            'id_instalasi' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
            ],
            'sifat_terima_sampel' => [
                'type'           => 'VARCHAR',
                'constraint'     => '100'
            ],
             'parameter_uji' => [
                'type'       => 'VARCHAR',
                'constraint'     => '150'
            ],
            'metode_uji' => [
                'type'       => 'VARCHAR',
                'constraint'     => '150'
            ],
            'keterangan' => [
                'type'       => 'VARCHAR',
                'constraint'     => '150'
            ],
            'analisis_lab' => [
                'type'       => 'TEXT'
            ],
            'petugas_prola' => [
                'type'           => 'VARCHAR',
                'constraint'     => '150'
            ],
            'petugas_lab' => [
                'type'           => 'VARCHAR',
                'constraint'     => '150'
            ],
            'kepala_instalasi' => [
                'type'           => 'VARCHAR',
                'constraint'     => '100'
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
        $this->forge->addForeignKey('id_pengantar_lhu', 'pengantar_lhu', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_instalasi', 'master_instalasi', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('perintah_uji_sampel');
    }

    public function down()
    {
        $this->forge->dropTable('perintah_uji_sampel');
    }
}
