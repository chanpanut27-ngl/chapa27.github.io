<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MgdbPermintaanSampel extends Migration
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
                'type'       => 'INT',
                'constraint' => 5
            ],
            'no_reg' => [
                'type'       => 'VARCHAR',
                'constraint' => '255'
            ],
            'id_jenis_sampel' => [
                'type'       => 'INT',
                'constraint' => 5
            ],
            'jumlah_sampel' => [
                'type'       => 'INT',
                'constraint' => 5
            ],
            'ket_peraturan' => [
                'type'       => 'VARCHAR',
                'constraint' => '150'
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
        $this->forge->createTable('permintaan_sampel');
    }

    public function down()
    {
        $this->forge->dropTable('permintaan_sampel');
    }
}
