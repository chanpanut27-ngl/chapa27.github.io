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
        $builder = $db->table('master_laboratorium');
        $builder->select('*');
        $builder->where("is_active", 1);
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function get_data_all()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('master_laboratorium');
        $builder->select('master_laboratorium.id, master_laboratorium.kode_lab, master_laboratorium.nama_lab, master_laboratorium.lantai, master_laboratorium.is_active, nama_instalasi');
        $builder->join('master_instalasi', 'master_instalasi.kode_instalasi = master_laboratorium.kode_instalasi', 'left');
        $builder->where("master_instalasi.is_active", 1);
        $query = $builder->get()->getResultArray();
        return $query;
    }

}
