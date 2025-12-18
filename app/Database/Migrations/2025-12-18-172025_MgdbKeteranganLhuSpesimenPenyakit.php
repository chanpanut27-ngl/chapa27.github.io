<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MgdbKeteranganLhuSpesimenPenyakit extends Migration
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
                'type'       => 'VARCHAR',
                'constraint' => '150'
            ],
            'paramater_tidak_dapat_di_uji' => [
                'type'       => 'VARCHAR',
                'constraint' => '150'
            ],
            'sub_kontrak' => [
                'type'       => 'VARCHAR',
                'constraint' => '150'
            ],
            'kontrak_diulang' => [
                'type'       => 'VARCHAR',
                'constraint' => '150'
            ],
            'permintaan_khusus' => [
                'type'       => 'VARCHAR',
                'constraint' => '150'
            ],
            'kode_pengantar' => [
                'type'       => 'VARCHAR',
                'constraint' => '150'
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
        $this->forge->createTable('keterangan_lhu_spes_penyakit');
    }

    public function down()
    {
        $this->forge->dropTable('keterangan_lhu_spes_penyakit');
    }
}
