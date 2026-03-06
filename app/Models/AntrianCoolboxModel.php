<?php

namespace App\Models;

use CodeIgniter\I18n\Time;
use CodeIgniter\Model;

class AntrianCoolboxModel extends Model
{
    protected $table            = 'antrian_coolbox';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'no_antrian',
        'id_coolbox',
        'tgl_terima_coolbox',
        'jam_terima_coolbox',
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
        $builder = $this->db->table('antrian_coolbox ac');
        $builder->select('ac.no_antrian,ac.tgl_terima_coolbox,ac.jam_terima_coolbox,ac.id as idx, ac.id_coolbox,mc.kode_coolbox,mi.nama_instansi');
        $builder->join('master_coolbox mc', 'mc.id=ac.id_coolbox');
        $builder->join('master_instansi mi', 'mi.id=mc.id_instansi');
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function cek_data($id, $tanggal)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('antrian_coolbox');
        $builder->select('*');
        $builder->where('id_coolbox', $id);
        $builder->where('tgl_terima_coolbox', $tanggal);
        $query = $builder->get()->getResultArray();
        return $query;
    }

}
