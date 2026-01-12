<?php

namespace App\Models;

use CodeIgniter\Model;

class PerParameterModel extends Model
{
    protected $table            = 'per_parameter';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_jenis_sampel', 
        'parameter', 
        'metode',
        'harga_per_titik'
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
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

    protected function setUpdatedBy(array $data)
    {
       $userId = user()->username;
        if ($userId) {
            // Tambahkan user_id ke data yang akan di-update
            $data['data']['updated_by'] = $userId;
        }
        return $data;
    }

    protected function setInsertBy(array $data)
    {
        $userId = user()->username;
        if ($userId) {
            // Tambahkan user_id ke data yang akan di-update
            $data['data']['created_by'] = $userId;
        }
        return $data;
    }

    public function get_data()  {
        $db = \Config\Database::connect();
        $builder = $db->table('master_jenis_sampel mjs');
        $builder->select('kode_sampel, jenis_sampel, peraturan, parameter, metode, harga_per_titik, pp.id AS id_parameter');
        $builder->join("master_peraturan mp", "mp.id = mjs.id_peraturan");
        $builder->join("per_parameter pp", "pp.id_jenis_sampel = mjs.id");
        $query = $builder->get()->getResultArray();
        return $query;
    }
}
