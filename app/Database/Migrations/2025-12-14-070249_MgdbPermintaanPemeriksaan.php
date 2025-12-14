<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MgdbPermintaanPemeriksaan extends Migration
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
            'no_reg' => [
                'type'       => 'CHAR',
                'constraint' => '20',
            ],
            'nama_pengirim' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
            ],
            'spesimen_atau_sampel' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'tgl_ambil_sampel' => [
                'type'       => 'DATE'
            ],
            'jam_ambil_sampel' => [
                'type'       => 'TIME'
            ],
            'petugas_pengambil' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
            ],
            'lokasi_pengambilan' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
            ],
            'paraf' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'keterangan_tambahan' => [
                'type'       => 'TEXT'
            ],
            'id_lab_permintaan' => [
                'type'       => 'INT',
                'constraint' => 5,
                'unsigned'   => true
            ],
            'id_sampel_permintaan' => [
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
        $this->forge->addForeignKey('id_sampel_permintaan', 'master_jenis_sampel', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_lab_permintaan', 'master_laboratorium', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('permintaan_pemeriksaan');
    }

    public function down()
    {
        $this->forge->dropTable('permintaan_pemeriksaan');
    }
}
