<?php

namespace App\Models;

use CodeIgniter\Model;

class KajiUlangKontrakPengantarModel extends Model
{
    protected $table            = 'kaji_ulang_kontrak_pengantar';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'alat_utama',
        'alat_pendukung',
        'personil_lab',
        'metode_pemeriksaan',
        'uji_mutu',
        'reagensa_dan_media',
        'kode_pengantar',
        'id_kat_lab'
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

    public function get_data($param1, $param2)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('kaji_ulang_kontrak_pengantar');
        $builder->select('*');
        $builder->where('kaji_ulang_kontrak_pengantar.kode_pengantar', $param1);
        $builder->where('id_kat_lab', $param2);
        $query = $builder->get()->getResultArray();
        return $query;    
    }
}
