<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MgdbMasterJenisSampel extends Migration
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
            'kode_sampel' => [
                'type'       => 'CHAR',
                'constraint' => '20'
            ],
            'jenis_sampel' => [
                'type'       => 'VARCHAR',
                'constraint' => '255'
            ],
            'id_peraturan' => [
                'type'       => 'INT',
                'constraint' => 5,
                'unsigned'   => true
            ],
            'pnbp' => [
                'type'       => 'DECIMAL'
            ],
            'id_lab' => [
                'type'       => 'INT',
                'constraint' => 5,
                'unsigned'   => true,
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
        $this->forge->addForeignKey('id_lab', 'master_laboratorium', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_peraturan', 'master_peraturan', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('master_jenis_sampel');
    }

    public function down()
    {
        $this->forge->dropTable('master_jenis_sampel');
    }
}
