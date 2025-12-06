<?php

namespace App\Models;

use CodeIgniter\Model;

class PosisiCoolboxModel extends Model
{
    protected $table            = 'posisi_coolbox';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_coolbox', 'status', 'tanggal', 'jam', 'keterangan', 'foto'];

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
        $builder = $db->table('master_coolbox');
        $builder->select('master_coolbox.id AS id_coolbox, master_coolbox.kode_coolbox, master_instansi.nama_instansi');
        $builder->join("master_instansi", "master_instansi.id = master_coolbox.id_instansi");
        $builder->where("master_coolbox.is_active", 1);
        $builder->orderBy('kode_coolbox', 'ASC');
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function get_data_all()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('posisi_coolbox');
        $builder->select('posisi_coolbox.id as idx, master_coolbox.id AS id_coolbox, master_coolbox.kode_coolbox, posisi_coolbox.status,tanggal,jam,keterangan,foto, master_instansi.nama_instansi');
        $builder->join("master_coolbox", "master_coolbox.id = posisi_coolbox.id_coolbox");
        $builder->join("master_instansi", "master_instansi.id = master_coolbox.id_instansi");
        $builder->orderBy('kode_coolbox', 'ASC');
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function cek_data($id, $status, $tanggal)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('posisi_coolbox');
        $builder->select('*');
        $builder->where('id_coolbox', $id);
        $builder->where('status', $status);
        $builder->where('status !=', 3);
        $builder->where('tanggal', $tanggal);
        $query = $builder->get()->getResultArray();
        return $query;
    }

}
