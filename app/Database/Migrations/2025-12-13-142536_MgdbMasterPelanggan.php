<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MgdbMasterPelanggan extends Migration
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
                'constraint' => '10',
            ],
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
            ],
            'alamat' => [
                'type'       => 'TEXT'
            ],
            'no_telp' => [
                'type'       => 'CHAR',
                'constraint' => '20',
            ],
            'nama_pjb' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
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
        $this->forge->createTable('master_pelanggan');
    }

    public function down()
    {
        $this->forge->dropTable('master_pelanggan');
    }
}
