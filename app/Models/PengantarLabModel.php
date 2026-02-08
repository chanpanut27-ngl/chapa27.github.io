<?php

namespace App\Models;

use CodeIgniter\I18n\Time;
use CodeIgniter\Model;

class PengantarLabModel extends Model
{
    protected $table            = 'pengantar_lab';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'kode_pengantar',
        'id_pelanggan',
        'tanggal',
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
        $db = \Config\Database::connect();
        $builder = $db->table('pengantar_lhu');
        $builder->select('pengantar_lhu.id as id_pengantar,kode_pengantar,tanggal,tahun,pengantar_lhu.is_active,permintaan_pelanggan.nama_pengirim,alamat,no_telp');
        $builder->join("permintaan_pelanggan", "permintaan_pelanggan.id = pengantar_lhu.id_pelanggan", "left");
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function get_data_by_id_lhu($params)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('pengantar_lhu');
        $builder->select('pengantar_lhu.id as id_pengantar,id_pelanggan,kode_pengantar,tanggal,tahun,pengantar_lhu.is_active,permintaan_pelanggan.nama_pengirim,alamat,no_telp');
        $builder->join("permintaan_pelanggan", "permintaan_pelanggan.id = pengantar_lhu.id_pelanggan");
        $builder->where('pengantar_lhu.id', $params);
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function get_data_by_kode_pengantar($params)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('pengantar_lhu');
        $builder->select('pengantar_lhu.id as id_pengantar,id_pelanggan,kode_pengantar,tanggal,tahun,pengantar_lhu.is_active,
        permintaan_pelanggan.no_reg,kode_pelanggan,nama_pengirim,instansi,alamat,no_telp,no_telp_pengirim');
        $builder->join("permintaan_pelanggan", "permintaan_pelanggan.id = pengantar_lhu.id_pelanggan", "left");
        $builder->where('pengantar_lhu.kode_pengantar', $params);
        $query = $builder->get()->getResultArray();
        return $query;
    }
}
