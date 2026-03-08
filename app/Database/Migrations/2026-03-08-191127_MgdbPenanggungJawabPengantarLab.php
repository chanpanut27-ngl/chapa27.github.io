<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MgdbPenanggungJawabPengantarLab extends Migration
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
            'nama_pjb' => [
                'type'       => 'TEXT'
            ],
            'no_telp_pjb' => [
                'type'       => 'CHAR',
                'constraint' => '20'
            ],
            'penerima_sampel' => [
                'type'       => 'VARCHAR',
                'constraint' => '255'
            ],
            'no_telp_penerima' => [
                'type'       => 'CHAR',
                'constraint' => '20'
            ],
            'tgl_terima_sampel' => [
                'type'       => 'DATE'
            ],
            'jam_terima_sampel' => [
                'type'       => 'TIME'
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
        $this->forge->createTable('penanggung_jawab_pengantar');
    }

    public function down()
    {
        $this->forge->dropTable('penanggung_jawab_pengantar');
        
    }
}
