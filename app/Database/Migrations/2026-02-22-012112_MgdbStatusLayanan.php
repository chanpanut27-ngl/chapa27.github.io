<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MgdbStatusLayanan extends Migration
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
                'type'       => 'INT'
            ],
            'keterangan' => [
                'type'       => 'TEXT'
            ],
            'status' => [
                'type'       => 'VARCHAR',
                'constraint' => '255'
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
            ]
         ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('status_layanan');
    }

    public function down()
    {
        $this->forge->dropTable('status_layanan');
    }
}
