<?php

namespace App\Models;

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
        'jumlah_sampel',
        'ket_peraturan'
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

    public function get_data($param)
    {
        $db = \Config\Database::connect();
        $sql = 'SELECT
                ps.id AS id_permintaan_sampel,
                id_jenis_sampel,
                jenis_sampel,
                jumlah_sampel,
                pnbp,
                peraturan,
                nama_lab,
                mjs.keterangan,
                jumlah_sampel * pnbp AS jumlah_biaya
                FROM permintaan_sampel ps
                JOIN master_jenis_sampel mjs ON mjs.id = ps.id_jenis_sampel
                JOIN master_peraturan mp ON mp.id = mjs.id_peraturan
                JOIN master_laboratorium ml ON ml.id = mjs.id_lab
                WHERE id_pelanggan = "'.$param.'"';

        $query = $db->query($sql);
        $row = $query->getResultArray();
        return $row;
    }
}
