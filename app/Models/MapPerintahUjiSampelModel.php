<?php

namespace App\Models;

use CodeIgniter\I18n\Time;
use CodeIgniter\Model;

class MapPerintahUjiSampelModel extends Model
{
    protected $table            = 'map_perintah_uji_sampel';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_map',
        'id_jenis_sampel',
        'parameter_uji',
        'metode_uji',
        'keterangan'
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

    public function get_data_sampel_lingkungan_perintah_uji($param) 
    {
        $db = \Config\Database::connect();

        $sql = "SELECT 
        map_perintah_uji_sampel.id,
        pelayanan_sampel_lingkungan.kode_sampel,
        map_perintah_uji_sampel.id_jenis_sampel,
        master_jenis_sampel.jenis_sampel,
        master_jenis_sampel.keterangan,
        master_peraturan.peraturan,
        map_perintah_uji_sampel.parameter_uji,
        map_perintah_uji_sampel.metode_uji,
        map_perintah_uji_sampel.keterangan AS ket_sampel
        FROM map_perintah_uji_sampel
        LEFT JOIN pelayanan_sampel_lingkungan ON pelayanan_sampel_lingkungan.id_jenis_sampel = map_perintah_uji_sampel.id_jenis_sampel
        LEFT JOIN master_jenis_sampel ON master_jenis_sampel.id = map_perintah_uji_sampel.id_jenis_sampel
        LEFT JOIN master_peraturan ON master_peraturan.id = master_jenis_sampel.id_peraturan
        LEFT JOIN perintah_uji_sampel ON perintah_uji_sampel.id = map_perintah_uji_sampel.id_map
        WHERE id_map = '".$param."' GROUP BY id_jenis_sampel";    
        $query = $db->query($sql)->getResultArray();
        return $query;
    }


    public function get_data_spesimen_penyakit_perintah_uji($param) 
    {
        $db = \Config\Database::connect();

        $sql = "SELECT 
        pelayanan_spesimen_penyakit.kode_sampel,
        map_perintah_uji_sampel.id_jenis_sampel,
        master_jenis_sampel.jenis_sampel,
        master_jenis_sampel.keterangan,
        master_peraturan.peraturan,
        map_perintah_uji_sampel.parameter_uji,
        map_perintah_uji_sampel.metode_uji,
        map_perintah_uji_sampel.keterangan AS ket_sampel,
        perintah_uji_sampel.analisis_lab
        FROM map_perintah_uji_sampel
        LEFT JOIN pelayanan_spesimen_penyakit ON pelayanan_spesimen_penyakit.id_jenis_sampel = map_perintah_uji_sampel.id_jenis_sampel
        LEFT JOIN master_jenis_sampel ON master_jenis_sampel.id = map_perintah_uji_sampel.id_jenis_sampel
        LEFT JOIN master_peraturan ON master_peraturan.id = master_jenis_sampel.id_peraturan
        LEFT JOIN perintah_uji_sampel ON perintah_uji_sampel.id = map_perintah_uji_sampel.id_map
        WHERE id_map = '".$param."'";    
        $query = $db->query($sql)->getResultArray();
        return $query;
    }

}
