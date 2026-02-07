<?php

namespace App\Models;

use CodeIgniter\I18n\Time;
use CodeIgniter\Model;

class CoolboxModel extends Model
{
    protected $table            = 'master_coolbox';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'kode_coolbox', 
        'id_instansi', 
        'keterangan', 
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
        $model = new CoolboxModel();
        
        $model->select(
            "master_coolbox.id AS id_coolbox, kode_coolbox,
            master_coolbox.is_active AS aktif_coolbox,
            master_coolbox.keterangan,
            master_instansi.nama_instansi,
            master_instansi.wilayah"
        );
        $model->join("master_instansi", "master_instansi.id = master_coolbox.id_instansi");
        $model->where('master_coolbox.is_active', 1);
        $query = $model->findAll();
        return $query;
    }

    public function generate_kode($param = null) 
    {
        $model = new CoolboxModel();
        $count = $model->where('id_instansi', $param)->countAllResults();
        $number = $count + 1;
        $generate_code = 'CB.'.sprintf('%02d', $param).'/'.sprintf('%02d', $number);
        return $generate_code;
    }

}
