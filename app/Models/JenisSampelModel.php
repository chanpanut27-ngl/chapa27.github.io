<?php

namespace App\Models;

use CodeIgniter\I18n\Time;
use CodeIgniter\Model;

class JenisSampelModel extends Model
{
    protected $table            = 'master_jenis_sampel';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'kode_sampel', 
        'jenis_sampel', 
        'id_peraturan', 
        'pnbp', 
        'keterangan', 
        'id_lab', 
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
       $myTime = new Time();
        if ($username) {
            $data['data']['updated_by'] = $username;
            $data['data']['updated_at'] = $myTime->toDateTimeString();
        }
        return $data;
    }

    public function get_data()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('master_jenis_sampel');
        $builder->select('master_jenis_sampel.id, master_jenis_sampel.jenis_sampel, master_jenis_sampel.pnbp, master_jenis_sampel.is_active, 
        master_jenis_sampel.keterangan AS ket_sampel, master_peraturan.peraturan, master_laboratorium.id AS id_lab, master_laboratorium.nama_lab');
        $builder->join("master_laboratorium", "master_jenis_sampel.id_lab = master_laboratorium.id", "left");
        $builder->join("master_peraturan", "master_peraturan.id = master_jenis_sampel.id_peraturan", "left");
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function get_data_jenis_sampel($idlab)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('master_jenis_sampel');
        $builder->select('master_jenis_sampel.id, master_jenis_sampel.jenis_sampel, master_jenis_sampel.pnbp, master_jenis_sampel.keterangan, master_jenis_sampel.is_active, master_peraturan.peraturan');
        $builder->join("master_peraturan", "master_peraturan.id = master_jenis_sampel.id_peraturan", "left");
        $builder->where("master_jenis_sampel.id_lab", $idlab);
        $query = $builder->get()->getResultArray();
        return $query;
    }


}
