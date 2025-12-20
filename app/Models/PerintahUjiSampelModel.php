<?php

namespace App\Models;

use CodeIgniter\Model;

class PerintahUjiSampelModel extends Model
{
    protected $table            = 'perintah_uji_sampel';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [];

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

    public function get_data() 
    {
        $db = \Config\Database::connect();
        $sql = "SELECT 
        pengantar_lhu.id AS id_pengantar, 
        pengantar_lhu.kode_pengantar, 
        master_pelanggan.nama, 
        master_pelanggan.alamat,
        master_laboratorium.nama_lab,
        master_instalasi.nama_instalasi,
        master_instalasi.id AS id_instalasi
        FROM pengantar_lhu
        LEFT JOIN master_pelanggan ON master_pelanggan.id = pengantar_lhu.id_pelanggan
        LEFT JOIN laboratorium_tujuan ON laboratorium_tujuan.id_pengantar_lhu = pengantar_lhu.id
        LEFT JOIN master_laboratorium ON master_laboratorium.id = laboratorium_tujuan.id_laboratorium
        LEFT JOIN master_kategori_lab ON master_kategori_lab.id = master_laboratorium.id_kat_lab
        LEFT JOIN master_instalasi ON master_instalasi.kode_instalasi = master_laboratorium.kode_instalasi
        WHERE pengantar_lhu.kode_pengantar IN (SELECT laboratorium_tujuan.kode_pengantar FROM laboratorium_tujuan) 
        GROUP BY id_instalasi";    
        $query = $db->query($sql)->getResultArray();
        return $query;
    }

    public function get_data_sampel_lingkungan($param = null)
    {
        $db = \Config\Database::connect();

        $sql = "SELECT 
        laboratorium_tujuan.kode_pengantar,
        pelayanan_sampel_lingkungan.id_jenis_sampel,
        pelayanan_sampel_lingkungan.kode_sampel,
        pelayanan_sampel_lingkungan.lokasi_pengambilan_sampel,
        jenis_sampel
        FROM 
        laboratorium_tujuan,
        pelayanan_sampel_lingkungan
        JOIN master_jenis_sampel C ON C.id = pelayanan_sampel_lingkungan.id_jenis_sampel
        WHERE laboratorium_tujuan.kode_pengantar IN (SELECT pelayanan_sampel_lingkungan.kode_pengantar FROM pelayanan_sampel_lingkungan) 
        AND pelayanan_sampel_lingkungan.kode_pengantar = '".$param."'
        GROUP BY id_jenis_sampel";
        $query = $db->query($sql)->getResultArray();
        return $query;
    }

}
