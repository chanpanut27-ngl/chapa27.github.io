<?php

namespace App\Models;

use CodeIgniter\Model;

class SpesimenPenyakitModel extends Model
{
    protected $table            = 'pelayanan_spesimen_penyakit';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'kode_sampel',
        'id_jenis_sampel',
        'identitas_sampel',
        'tgl_periksa_sampel',
        'jam_periksa_sampel',
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
        $builder = $db->table('pelayanan_spesimen_penyakit');
        $builder->select('pelayanan_spesimen_penyakit.id AS id_psl,
        pelayanan_spesimen_penyakit.kode_sampel,
        master_jenis_sampel.jenis_sampel,
        pelayanan_spesimen_penyakit.identitas_sampel,
        pelayanan_spesimen_penyakit.tgl_periksa_sampel,
        pelayanan_spesimen_penyakit.jam_periksa_sampel,
        pelayanan_spesimen_penyakit.metode_pemeriksaan,
        pelayanan_spesimen_penyakit.volume_atau_berat,
        pelayanan_spesimen_penyakit.jenis_wadah,
        pelayanan_spesimen_penyakit.jenis_pengawet,
        pelayanan_spesimen_penyakit.is_active AS sts_psl,
        master_jenis_sampel.peraturan');
        $builder->join("master_jenis_sampel", "master_jenis_sampel.id = pelayanan_spesimen_penyakit.id_jenis_sampel");
        $builder->where('kode_pengantar', $param1);
        $builder->where('id_laboratorium', $param2);
        $query = $builder->get()->getResultArray();
        return $query;
    }
}
