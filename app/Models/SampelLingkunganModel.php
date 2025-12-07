<?php

namespace App\Models;

use CodeIgniter\Model;

class SampelLingkunganModel extends Model
{
    protected $table            = 'pelayanan_sampel_lingkungan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'kode_sampel',
        'id_jenis_sampel',
        'lokasi_pengambilan_sampel',
        'tgl_ambil_sampel',
        'jam_ambil_sampel',
        'tgl_jam_terima_sampel',
        'metode_pemeriksaan',
        'volume_atau_berat',
        'jenis_wadah',
        'jenis_pengawet',
        'kode_pengantar',
        'id_laboratorium'
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

    public function get_data($param1, $param2)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('pelayanan_sampel_lingkungan');
        $builder->select('pelayanan_sampel_lingkungan.id AS id_psl,
        pelayanan_sampel_lingkungan.kode_sampel,
        master_jenis_sampel.jenis_sampel,
        pelayanan_sampel_lingkungan.lokasi_pengambilan_sampel,
        pelayanan_sampel_lingkungan.tgl_ambil_sampel,
        pelayanan_sampel_lingkungan.jam_ambil_sampel,
        pelayanan_sampel_lingkungan.metode_pemeriksaan,
        pelayanan_sampel_lingkungan.volume_atau_berat,
        pelayanan_sampel_lingkungan.jenis_wadah,
        pelayanan_sampel_lingkungan.jenis_pengawet');
        $builder->join("master_jenis_sampel", "master_jenis_sampel.id = pelayanan_sampel_lingkungan.id_jenis_sampel");
        $builder->where('kode_pengantar', $param1);
        $builder->where('id_laboratorium', $param2);
        $query = $builder->get()->getResultArray();
        return $query;
    }
}
