<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MgdbPengantarLhu extends Migration
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
            'kode_pelanggan' => [
                'type'       => 'CHAR',
                'constraint' => '20'
            ],
            'id_pelanggan' => [
                'type'       => 'INT',
                'constraint' => 5,
                'unsigned'   => true,
            ],
            'tanggal' => [
                'type'       => 'DATE'
            ],
            'tahun' => [
                'type'       => 'YEAR'
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
        $this->forge->addForeignKey('id_pelanggan', 'master_pelanggan', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('pengantar_lhu');
    }

    public function down()
    {
        $this->forge->dropTable('pengantar_lhu');
    }
}
