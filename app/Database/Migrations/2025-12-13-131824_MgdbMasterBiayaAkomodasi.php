<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MgdbMasterBiayaAkomodasi extends Migration
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
            'uraian' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
            ],
            'transport' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
            ],
            'uang_harian' => [
                'type'       => 'DECIMAL'
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
        $this->forge->createTable('master_biaya_akomodasi');
    }

    public function down()
    {
        $this->forge->dropTable('master_biaya_akomodasi');
    }
}
