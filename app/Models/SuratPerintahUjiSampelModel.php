<?php

namespace App\Models;

use CodeIgniter\Model;

class SuratPerintahUjiSampelModel extends Model
{
    protected $table            = 'surat_perintah_uji_sampel';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_pengantar_lhu'
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
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function get_data_perintah_uji() 
    {
        $db = \Config\Database::connect();
        $sql = "SELECT 
        pengantar_lhu.id AS id_pengantar, 
        pengantar_lhu.kode_pengantar, 
        master_pelanggan.nama, 
        master_pelanggan.alamat,
        master_laboratorium.nama_lab,
        master_instalasi.nama_instalasi
        FROM pengantar_lhu
        LEFT JOIN master_pelanggan ON master_pelanggan.id = pengantar_lhu.id_pelanggan
        LEFT JOIN laboratorium_tujuan ON laboratorium_tujuan.id_pengantar_lhu = pengantar_lhu.id
        LEFT JOIN master_laboratorium ON master_laboratorium.id = laboratorium_tujuan.id_laboratorium
        LEFT JOIN master_kategori_lab ON master_kategori_lab.id = master_laboratorium.id_kat_lab
        LEFT JOIN master_instalasi ON master_instalasi.kode_instalasi = master_laboratorium.kode_instalasi
        WHERE pengantar_lhu.kode_pengantar IN (SELECT laboratorium_tujuan.kode_pengantar FROM laboratorium_tujuan) 
        GROUP BY master_laboratorium.id_kat_lab";    
        $query = $db->query($sql)->getResultArray();
        return $query;
    }

    

}
