<?php

namespace App\Models;

use CodeIgniter\Model;

class PengantarLhuModel extends Model
{
    protected $table            = 'pengantar_lhu';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'kode_pengantar',
        'id_pelanggan',
        'tanggal',
        'tahun'
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
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function get_data()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('pengantar_lhu');
        $builder->select('pengantar_lhu.id as id_pengantar,kode_pengantar,tanggal,tahun,pengantar_lhu.is_active,master_pelanggan.nama,alamat,no_telp');
        $builder->join("master_pelanggan", "master_pelanggan.id = pengantar_lhu.id_pelanggan");
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function get_data_by_id_lhu($params)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('pengantar_lhu');
        $builder->select('pengantar_lhu.id as id_pengantar,id_pelanggan,kode_pengantar,tanggal,tahun,pengantar_lhu.is_active,master_pelanggan.nama,alamat,no_telp');
        $builder->join("master_pelanggan", "master_pelanggan.id = pengantar_lhu.id_pelanggan");
        $builder->where('pengantar_lhu.id', $params);
        $query = $builder->get()->getResultArray();
        return $query;
    }

     public function get_data_by_kode_pengantar($params)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('pengantar_lhu');
        $builder->select('pengantar_lhu.id as id_pengantar,id_pelanggan,kode_pengantar,tanggal,tahun,pengantar_lhu.is_active,master_pelanggan.nama,alamat,no_telp');
        $builder->join("master_pelanggan", "master_pelanggan.id = pengantar_lhu.id_pelanggan");
        $builder->where('pengantar_lhu.kode_pengantar', $params);
        $query = $builder->get()->getResultArray();
        return $query;
    }
}
