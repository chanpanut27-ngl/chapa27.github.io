<?php

namespace App\Models;

use CodeIgniter\I18n\Time;
use CodeIgniter\Model;

class PerintahUjiSampelModel extends Model
{
    protected $table            = 'perintah_uji_sampel';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_pengantar_lab',
        'id_instalasi',
        'sifat_pemeriksaan',
        'tgl_terima_sampel',
        'parameter_uji',
        'metode_uji',
        'keterangan',
        'analisis_lab',
        'petugas_prola',
        'ka_ins_prola',
        'ka_ins_lab',
        'analis_lab',
        'tgl_kirim_sampel',
        'tgl_terima_sampel_ke_kains_lab',
        'tgl_selesai_sampel',
        'tgl_terima_sampel_ke_analis_lab',
        'kode_pengantar',
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
    protected $updatedByField  = 'updated_by'; 
    // user()->username()

    
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
        $sql = "SELECT 
        pengantar_lab.id AS id_pengantar, 
        pengantar_lab.kode_pengantar, 
        permintaan_pelanggan.nama_pengirim, 
        permintaan_pelanggan.alamat,
        master_laboratorium.nama_lab,
        master_instalasi.nama_instalasi,
        master_instalasi.id AS id_instalasi,
        master_instalasi.id_kat_lab,
        laboratorium_tujuan.id_laboratorium
        FROM pengantar_lab
        LEFT JOIN permintaan_pelanggan ON permintaan_pelanggan.id = pengantar_lab.id_pelanggan
        LEFT JOIN laboratorium_tujuan ON laboratorium_tujuan.id_pengantar_lab = pengantar_lab.id
        LEFT JOIN master_laboratorium ON master_laboratorium.id = laboratorium_tujuan.id_laboratorium
        LEFT JOIN master_kategori_lab ON master_kategori_lab.id = master_laboratorium.id_kat_lab
        LEFT JOIN master_instalasi ON master_instalasi.kode_instalasi = master_laboratorium.kode_instalasi
        WHERE pengantar_lab.kode_pengantar IN (SELECT laboratorium_tujuan.kode_pengantar FROM laboratorium_tujuan) 
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
        master_peraturan.peraturan,
        jenis_sampel
        FROM 
        laboratorium_tujuan,
        pelayanan_sampel_lingkungan
        JOIN master_jenis_sampel C ON C.id = pelayanan_sampel_lingkungan.id_jenis_sampel
        JOIN master_peraturan ON master_peraturan.id = C.id_peraturan
        WHERE laboratorium_tujuan.kode_pengantar IN (SELECT pelayanan_sampel_lingkungan.kode_pengantar FROM pelayanan_sampel_lingkungan) 
        AND pelayanan_sampel_lingkungan.kode_pengantar = '".$param."'
        GROUP BY id_jenis_sampel ORDER BY kode_sampel ASC";
        $query = $db->query($sql)->getResultArray();
        return $query;
    }

    public function get_data_spesimen_penyakit($param = null)
    {
        $db = \Config\Database::connect();

        $sql = "SELECT 
        laboratorium_tujuan.kode_pengantar,
        pelayanan_spesimen_penyakit.id_jenis_sampel,
        pelayanan_spesimen_penyakit.kode_sampel,
        pelayanan_spesimen_penyakit.identitas_sampel,
        master_peraturan.peraturan,
        jenis_sampel
        FROM 
        laboratorium_tujuan,
        pelayanan_spesimen_penyakit
        JOIN master_jenis_sampel C ON C.id = pelayanan_spesimen_penyakit.id_jenis_sampel
        JOIN master_peraturan ON master_peraturan.id = C.id_peraturan
        WHERE laboratorium_tujuan.kode_pengantar IN (SELECT pelayanan_spesimen_penyakit.kode_pengantar FROM pelayanan_sampel_lingkungan) 
        AND pelayanan_spesimen_penyakit.kode_pengantar = '".$param."'
        GROUP BY id_jenis_sampel ORDER BY kode_sampel ASC";
        $query = $db->query($sql)->getResultArray();
        return $query;
    }

    
}
