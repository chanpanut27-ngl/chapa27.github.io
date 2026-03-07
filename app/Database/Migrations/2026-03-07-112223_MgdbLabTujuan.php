<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MgdbLabTujuan extends Migration
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
                'constraint' => 5,
                'unsigned'   => true,
            ],
            'id_pengantar_lab' => [
                'type'       => 'INT',
                'constraint' => 5,
                'unsigned'   => true,
            ],
            'kode_pengantar' => [
                'type'       => 'CHAR',
                'constraint' => '20'
            ],
            'id_laboratorium' => [
                'type'       => 'INT',
                'constraint' => 5,
                'unsigned'   => true,
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
        $this->forge->addForeignKey('id_pelanggan', 'permintaan_pelanggan', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_pengantar_lab', 'pengantar_lab', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_laboratorium', 'master_laboratorium', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('laboratorium_tujuan');
    }

    public function down()
    {
        $this->forge->dropTable('laboratorium_tujuan');
    }
}
