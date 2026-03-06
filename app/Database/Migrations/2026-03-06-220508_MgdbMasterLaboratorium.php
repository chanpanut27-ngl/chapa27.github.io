<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MgdbMasterLaboratorium extends Migration
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
                'constraint' => '20'
            ],
            'nama_lab' => [
                'type'       => 'VARCHAR',
                'constraint' => '225'
            ],
            'lantai' => [
                'type'       => 'INT',
                'constraint' => 5
            ],
            'id_kat_lab' => [
                'type'       => 'INT',
                'constraint' => 5,
                'unsigned'   => true,
            ],
            'kode_instalasi' => [
                'type'       => 'CHAR',
                'constraint' => '20'
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
        $this->forge->addForeignKey('id_kat_lab', 'master_kategori_lab', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('master_laboratorium');
    }

    public function down()
    {
        $this->forge->dropTable('master_laboratorium');
    }
}
