<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MgPenyakitMaster extends Migration
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
            'penyakit' => [
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
            'deleted_at datetime default current_timestamp',
            'deleted_by'     => [
                'type'       => 'VARCHAR',
                'constraint' => '100'
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('master_penyakit');
    }

    public function down()
    {
        $this->forge->dropTable('master_penyakit');
    }
}
