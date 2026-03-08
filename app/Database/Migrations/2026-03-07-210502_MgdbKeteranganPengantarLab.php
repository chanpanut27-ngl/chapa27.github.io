<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MgdbKeteranganPengantarLab extends Migration
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
            'keterangan' => [
                'type'       => 'TEXT'
            ],
            'parameter_tidak_dapat_di_uji' => [
                'type'       => 'TEXT'
            ],
            'sub_kontrak' => [
                'type'       => 'TEXT'
            ],
            'kontrak_diulang' => [
                'type'       => 'TEXT'
            ],
            'permintaan_khusus' => [
                'type'       => 'TEXT'
            ],
            'kode_pengantar' => [
                'type'       => 'CHAR',
                'constraint' => '20'
            ],
            'id_kat_lab' => [
                'type'       => 'INT',
                'constraint' => 5
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
        $this->forge->createTable('keterangan_pengantar');
    }

    public function down()
    {
        $this->forge->dropTable('keterangan_pengantar');
    }
}
