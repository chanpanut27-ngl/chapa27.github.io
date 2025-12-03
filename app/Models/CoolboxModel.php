<?php

namespace App\Models;

use CodeIgniter\Model;

class CoolboxModel extends Model
{
    protected $table            = 'master_coolbox';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['kode_coolbox', 'id_instansi', 'is_active'];

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
        $builder = $db->table('master_coolbox');
        $builder->select('master_coolbox.id AS id_coolbox,master_coolbox.kode_coolbox,master_coolbox.is_active AS aktif_coolbox,master_instansi.nama_instansi,wilayah');
        $builder->join("master_instansi", "master_instansi.id = master_coolbox.id_instansi");
        $query = $builder->get()->getResultArray();
        return $query;
    }

}
