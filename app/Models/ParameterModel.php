<?php

namespace App\Models;

use CodeIgniter\Model;

class ParameterModel extends Model
{
    protected $table            = 'master_parameter';
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
        $username = user()->username;
        if ($username) {
            $data['data']['created_by'] = $username;
        }
        return $data;
    }
 
    protected function setUpdatedBy(array $data)
    {
       $username = user()->username;
        if ($username) {
            $data['data']['updated_by'] = $username;
        }
        return $data;
    }

    public function get_data()
    {
        $model = new ParameterModel();
        $model->select('*');
        $model->where('is_active', 1);
        $query = $model->findAll();
        return $query;
    }

     public function get_data_all()  
     {
        $db = \Config\Database::connect();
        $builder = $db->table('master_jenis_sampel mjs');
        $builder->select('kode_sampel, jenis_sampel, peraturan, parameter, metode, harga_per_titik, id_lab, pp.id AS id_parameter, mjs.keterangan, pp.is_active AS active');
        $builder->join("master_peraturan mp", "mp.id = mjs.id_peraturan");
        $builder->join("master_parameter pp", "pp.id_jenis_sampel = mjs.id");
        $builder->orderBy("mjs.id", "ASC");
        $query = $builder->get()->getResultArray();
        return $query;
    }

}
