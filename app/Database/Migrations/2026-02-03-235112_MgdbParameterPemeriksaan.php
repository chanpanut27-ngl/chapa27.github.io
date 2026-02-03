<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MgdbParameterPemeriksaan extends Migration
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
            'id_jenis_sampel' => [
                'type'       => 'INT',
                'constraint' => 5,
                'unsigned'   => true,
            ],
            'parameter' => [
                'type'       => 'VARCHAR',
                'constraint' => '150'
            ],
            'metode' => [
                'type'       => 'VARCHAR',
                'constraint' => '150'
            ],
            'harga_per_titik' => [
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
                'type' => 'DATETIME'
            ],
            'deleted_at datetime default current_timestamp',
            'deleted_by'     => [
                'type'       => 'VARCHAR',
                'constraint' => '100'
            ]
         ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_jenis_sampel', 'master_jenis_sampel', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('parameter_pemeriksaan');
    }

    public function down()
    {
        $this->forge->dropTable('parameter_pemeriksaan');
    }
}
