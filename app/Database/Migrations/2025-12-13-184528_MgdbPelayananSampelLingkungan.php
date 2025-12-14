<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MgdbPelayananSampelLingkungan extends Migration
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
            'lokasi_pengambilan_sampel' => [
                'type'       => 'VARCHAR',
                'constraint' => '255'
            ],
            'tgl_ambil_sampel' => [
                'type'       => 'DATE'
            ],
            'jam_ambil_sampel' => [
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
        $this->forge->addForeignKey('id_jenis_sampel', 'master_jenis_sampel', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_laboratorium', 'master_laboratorium', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('pelayanan_sampel_lingkungan');
    }

    public function down()
    {
        $this->forge->dropTable('pelayanan_sampel_lingkungan');
    }
}
