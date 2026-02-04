<?php

namespace App\Models;

use CodeIgniter\I18n\Time;
use CodeIgniter\Model;

class PermintaanSampelModel extends Model
{
    protected $table            = 'permintaan_sampel';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_pelanggan',
        'no_reg',
        'id_jenis_sampel',
        'jumlah_sampel'
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

    public function get_data($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('permintaan_sampel ps');
        $builder->select('jenis_sampel, jumlah_sampel, pnbp, SUM(jumlah_sampel * pnbp) AS jumlah_biaya');
        $builder->join('master_jenis_sampel mjs', 'mjs.id = ps.id_jenis_sampel');
        $builder->where("id_pelanggan", $id);
        $query = $builder->get()->getResultArray();
        return $query;
    }

    // SELECT
    // jenis_sampel,
    // jumlah_sampel,
    // pnbp,
    // jumlah_sampel * pnbp AS jumlah_biaya
    // FROM permintaan_sampel ps
    // JOIN master_jenis_sampel mjs ON mjs.id = ps.id_jenis_sampel
    // WHERE id_pelanggan = 1;
}
