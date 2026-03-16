<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MgdbLembarHasilUji extends Migration
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
            'id_pemeriksaan' => [
                'type'       => 'INT'
            ],
            'id_pelanggan' => [
                'type'       => 'INT'
            ],
            'no_reg' => [
                'type'       => 'CHAR',
                'constraint' => '20',
            ],'id_lab' => [
                'type'       => 'INT',
                'constraint' => 5,
                'unsigned'   => true
            ],
            'id_jenis_sampel' => [
                'type'       => 'INT',
                'constraint' => 5,
                'unsigned'   => true
            ],
            'id_parameter' => [
                'type'       => 'INT',
                'constraint' => 5,
                'unsigned'   => true
            ],
            'satuan' => [
                'type'       => 'VARCHAR',
                'constraint' => '150'
            ],
            'kadar_maksimum' => [
                'type'       => 'VARCHAR',
                'constraint' => '150'
            ],
            'hasil_pengujian' => [
                'type'       => 'VARCHAR',
                'constraint' => '150'
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
        $this->forge->createTable('lembar_hasil_uji');
    }

    public function down()
    {
        $this->forge->dropTable('lembar_hasil_uji');
    }
}
