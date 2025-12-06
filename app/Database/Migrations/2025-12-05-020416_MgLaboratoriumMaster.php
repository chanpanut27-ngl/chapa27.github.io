<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MgLaboratoriumMaster extends Migration
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
            'kode_lab' => [
                'type'       => 'CHAR',
                'constraint' => '10',
            ],
            'nama_lab' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'lantai' => [
                'type'       => 'INT'
            ],
            'kode_instalasi' => [
                'type'       => 'CHAR',
                'constraint' => '10',
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
            'deleted_at datetime default current_timestamp',
            'deleted_by'     => [
                'type'       => 'VARCHAR',
                'constraint' => '100'
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('master_laboratorium');
    }

    public function down()
    {
        $this->forge->dropTable('master_laboratorium');
    }
}
