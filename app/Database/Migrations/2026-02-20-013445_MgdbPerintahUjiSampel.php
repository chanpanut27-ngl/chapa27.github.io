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
            'ka_ins_prola' => [
                'type'           => 'VARCHAR',
                'constraint'     => '100'
            ],
            'ka_ins_lab' => [
                'type'           => 'VARCHAR',
                'constraint'     => '100'
            ],
            'analis_lab' => [
                'type'           => 'VARCHAR',
                'constraint'     => '100'
            ],
            'analis_lab' => [
                'type'           => 'VARCHAR',
                'constraint'     => '150'
            ],
            'tgl_kirim_sampel_dari_prola' => [
                'type'           => 'DATE'
            ],
            'tgl_terima_sampel_ke_kains_lab' => [
                'type'           => 'DATE'
            ],
            'tgl_selesai_sampel' => [
                'type'           => 'DATE'
            ],
            'tgl_terima_sampel' => [
                'type'           => 'DATE'
            ],
            'kode_pengantar' => [
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
                'type' => 'DATETIME'
            ],
            'deleted_at datetime default current_timestamp',
            'deleted_by'     => [
                'type'       => 'VARCHAR',
                'constraint' => '100'
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
