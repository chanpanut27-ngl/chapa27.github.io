<?php

namespace App\Models;

use CodeIgniter\I18n\Time;
use CodeIgniter\Model;

class PermintaanPemeriksaanModel extends Model
{
    protected $table            = 'permintaan_pelanggan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'no_reg',
        'kode_pelanggan',
        'nama_pengirim',
        'instansi',
        'alamat',
        'no_telp',
        'no_telp_pengirim',
        'spesimen_atau_sampel',
        'tgl_ambil_sampel',
        'jam_ambil_sampel',
        'petugas_ambil_sampel',
        'lokasi_ambil_sampel',
        'paraf',
        'keterangan_tambahan'
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

    public function get_data_list($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('permintaan_pemeriksaan pp');
        $builder->select('pp.id as id_permintaan_pemeriksaan, pp.created_at as tgl_entry, nama_lab, jenis_sampel, parameter, harga_per_titik, mp.peraturan');
        $builder->join("master_laboratorium ml", "ml.id = pp.id_lab", "left");
        $builder->join("master_jenis_sampel mjs", "mjs.id = pp.id_jenis_sampel", "left");
        $builder->join("master_peraturan mp", "mp.id = mjs.id_peraturan", "left");
        $builder->join("parameter_pemeriksaan a", "a.id = pp.id_parameter", "left");
        $builder->where('id_pelanggan', $id);
        $query = $builder->get()->getResultArray();
        return $query;
    }

}
