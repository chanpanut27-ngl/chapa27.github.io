<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MgdbPermintaanPelanggan extends Migration
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
            'kode_pelanggan' => [
                'type'       => 'CHAR',
                'constraint' => '20',
            ],
            'nama_pengirim' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'instansi' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'alamat' => [
                'type'       => 'TEXT'
            ],
            'no_telp' => [
                'type'       => 'CHAR',
                'constraint' => '20',
            ],
            'no_telp_pengirim' => [
                'type'       => 'CHAR',
                'constraint' => '20',
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
            'petugas_ambil_sampel' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'lokasi_ambil_sampel' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'paraf' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'keterangan_tambahan' => [
                'type'       => 'TEXT'
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
        $this->forge->createTable('permintaan_pelanggan');
    }

    public function down()
    {
        $this->forge->dropTable('permintaan_pelanggan');
    }
}
