<?php

namespace App\Models;

use CodeIgniter\Model;

class PermintaanPelangganModel extends Model
{
    protected $table            = 'permintaan_pelanggan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'no_reg',
        'kode_pelanggan',
        'nama_pengirim',
        'instansi',
        'alamat',
        'no_telp',
        'no_telp_pengirim',
        'spesimen_atau_sampel',
        'tgl_ambil_sampel',
        'jam_ambil_sampel',
        'petugas_ambil_sampel',
        'lokasi_ambil_sampel',
        'paraf',
        'keterangan_tambahan'
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = ['setInsertBy'];
    protected $afterInsert    = [];
    protected $beforeUpdate   = ['setUpdatedBy'];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    protected function setInsertBy(array $data)
    {
        $userName = user()->username;
        if ($userName) {
            // Tambahkan user_id ke data yang akan di-update
            $data['data']['created_by'] = $userName;
            $data['data']['created_at'] = date('Y-m-d H:i:s');
        }
        return $data;
    }

    protected function setUpdatedBy(array $data)
    {
       $userName = user()->username;
        if ($userName) {
            // Tambahkan user_id ke data yang akan di-update
            $data['data']['updated_by'] = $userName;
            $data['data']['updated_at'] = date('Y-m-d H:i:s');
        }
        return $data;
    }
}
