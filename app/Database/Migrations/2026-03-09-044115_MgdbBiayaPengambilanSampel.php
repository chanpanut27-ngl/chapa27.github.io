<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MgdbBiayaPengambilanSampel extends Migration
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
                'type'       => 'CHAR',
                'constraint' => '20',
            ],
            'kode_pelanggan' => [
                'type'       => 'CHAR',
                'constraint' => '20',
            ],
            'jumlah_orang' => [
                'type'       => 'INT',
                'constraint' => 5,
            ],
            'jumlah_hari' => [
                'type'       => 'INT',
                'constraint' => 5,
            ],
            'biaya_satuan' => [
                'type'       => 'DECIMAL',
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
        $this->forge->createTable('biaya_penyelenggara');
    }

    public function down()
    {
        $this->forge->dropTable('biaya_penyelenggara');
        
    }
}
