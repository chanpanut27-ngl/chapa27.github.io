<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MgdbSpesimenPenyakit extends Migration
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
            'id_jenis_sampel' => [
                'type'       => 'INT',
                'constraint' => 5,
                'unsigned'   => true
            ],
            'identitas_sampel' => [
                'type'       => 'VARCHAR',
                'constraint' => '255'
            ],
            'tgl_periksa_sampel' => [
                'type'       => 'DATE'
            ],
            'jam_periksa_sampel' => [
                'type'       => 'TIME',
            ],
            'metode_pemeriksaan' => [
                'type'       => 'VARCHAR',
                'constraint' => '255'
            ],
            'volume_atau_berat' => [
                'type'       => 'VARCHAR',
                'constraint' => '150'
            ],
            'jenis_wadah' => [
                'type'       => 'VARCHAR',
                'constraint' => '100'
            ],
            'jenis_pengawet' => [
                'type'       => 'VARCHAR',
                'constraint' => '255'
            ],
            'kode_pengantar' => [
                'type'       => 'CHAR',
                'constraint' => '20'
            ],
            'id_laboratorium' => [
                'type'       => 'INT',
                'constraint' => 5,
                'unsigned'   => true
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
        $this->forge->addForeignKey('id_jenis_sampel', 'master_jenis_sampel', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_laboratorium', 'master_laboratorium', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('pelayanan_spesimen_penyakit');
    }

    public function down()
    {
        $this->forge->dropTable('pelayanan_spesimen_penyakit');
    }
}
