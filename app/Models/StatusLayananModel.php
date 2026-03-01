<?php

namespace App\Models;

use CodeIgniter\I18n\Time;
use CodeIgniter\Model;

class StatusLayananModel extends Model
{
    protected $table            = 'status_layanan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_pelanggan',
        'keterangan',
        'status'
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

    public function get_data_all($param)
    {
        $db = \Config\Database::connect(); 

        $builder = $db->table('status_layanan');
        $builder->select(
            'status_layanan.id as id_status, 
            status_layanan.keterangan,
            status_layanan.status,
            status_layanan.id_pelanggan,
            pp.nama_pengirim'
        );
        $builder->join('permintaan_pelanggan pp', 'pp.id=status_layanan.id_pelanggan');
        $builder->where('status_layanan.id_pelanggan', $param);
        return $builder->get()->getResultArray();
    }

    public function get_data($sts) 
    {
        $db = \Config\Database::connect();   
        $builder = $db->table('permintaan_pelanggan'); 
        $builder->join('status_layanan ss', 'ss.id_pelanggan = permintaan_pelanggan.id', 'left');
        $builder->where('ss.status', $sts);
        return $builder->get()->getResultArray();
    }

}
