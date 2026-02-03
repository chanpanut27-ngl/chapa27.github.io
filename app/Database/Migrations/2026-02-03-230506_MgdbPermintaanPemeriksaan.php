<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MgdbPermintaanPemeriksaan extends Migration
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
            'jumlah_titik' => [
                'type'       => 'INT',
                'constraint' => 5,
                'unsigned'   => true
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
        $this->forge->createTable('permintaan_pemeriksaan');
    }

    public function down()
    {
        $this->forge->dropTable('permintaan_pemeriksaan');
    }
}
