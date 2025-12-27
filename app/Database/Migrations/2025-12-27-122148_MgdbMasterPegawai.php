<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MgdbMasterPegawai extends Migration
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
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'nik' => [
                'type'       => 'CHAR',
                'constraint' => '20',
            ],
            'nip' => [
                'type'       => 'CHAR',
                'constraint' => '20',
            ],
            'golongan' => [
                'type'       => 'CHAR',
                'constraint' => '10',
            ],
            'tmt' => [
                'type'       => 'DATE'
            ],
            'jabatan' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'kelas' => [
                'type'       => 'INT'
            ],
            'eselon' => [
                'type'       => 'CHAR',
                'constraint' => '10',
            ],
            'tmt_cpns' => [
                'type'       => 'DATE'
            ],
            'pendidikan' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'lulus_pendidikan' => [
                'type'       => 'YEAR'
            ],
            'tingkat_ijazah' => [
                'type'       => 'CHAR',
                'constraint' => '10',
            ],
            'alamat' => [
                'type'       => 'TEXT'
            ],
            'no_telp' => [
                'type'       => 'CHAR',
                'constraint' => '20',
            ],
            'user_id' => [
                'type'       => 'INT'
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'username' => [
                'type'       => 'VARCHAR',
                'constraint' => '30',
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
        $this->forge->createTable('master_pegawai');
    }

    public function down()
    {
        $this->forge->dropTable('master_pegawai');
        
    }
}
