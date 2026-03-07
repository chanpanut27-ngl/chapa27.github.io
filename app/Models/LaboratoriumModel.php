<?php

namespace App\Models;

use CodeIgniter\Model;

class LaboratoriumModel extends Model
{
    protected $table            = 'master_laboratorium';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'kode_lab',
        'nama_lab', 
        'lantai',
        'id_kat_lab',
        'kode_instalasi',
        'is_active'
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
        $model = new LaboratoriumModel();
        $model->select('*');
        $model->where('is_active', 1);
        $query = $model->findAll();
        return $query;
    }

    public function get_data_all()
    {
        $model = new LaboratoriumModel();
        $model->select('
        master_laboratorium.id, 
        master_laboratorium.kode_lab, 
        master_laboratorium.nama_lab, 
        master_laboratorium.lantai, 
        master_laboratorium.is_active,
        master_instalasi.nama_instalasi,
        master_kategori_lab.kategori');
        $model->join('master_instalasi', 'master_instalasi.kode_instalasi = master_laboratorium.kode_instalasi', 'left');
        $model->join('master_kategori_lab', 'master_kategori_lab.id = master_laboratorium.id_kat_lab', 'left');
        $query = $model->findAll();
        return $query;
    }



}
