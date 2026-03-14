<?php

namespace App\Models;

use CodeIgniter\Model;

class PermintaanPelangganModel extends Model
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
        'keterangan_tambahan',
        'is_active',
        'created_at'
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

    public function generate_no_reg() 
    {
        $tahun = '';
        $kodePengantar = '';
        $char = 'P';
        $current_year = date('Y', strtotime($this->time));
        $model = new PermintaanPelangganModel();

        /* cari tahun data terakhir */
        $query = $model->orderBy('id', 'DESC')->get();
        foreach ($query->getResultArray() as $row) {
            $tahun = date('Y', strtotime($row['created_at']));
        }
        $total = $model->where('YEAR(created_at)', $tahun)->countAllResults();
      
        if ($tahun != $current_year) {
            $kodePengantar = $total + 1;
        } else {
            $kodePengantar = $total + 1;
        }
        $kode = sprintf('%04d', $kodePengantar).'.'.date('dmY');
        return $kode;
    }

    public function generate_kode_pelanggan() 
    {
        $tahun = '';
        $kodePengantar = '';
        $char = 'P';
        $current_year = date('Y', strtotime($this->time));
        $model = new PermintaanPelangganModel();

        /* cari tahun data terakhir */
        $query = $model->orderBy('id', 'DESC')->get();
        foreach ($query->getResultArray() as $row) {
            $tahun = date('Y', strtotime($row['created_at']));
        }
        $total = $model->where('YEAR(created_at)', $tahun)->countAllResults();
      
        if ($tahun != $current_year) {
            $kodePengantar = $total + 1;
        } else {
            $kodePengantar = $total + 1;
        }
        $kode = $char . sprintf('%04d', $kodePengantar);
        return $kode;
    }

    public function get_data() 
    {
        $db = \Config\Database::connect();   
        $builder = $db->table('permintaan_pelanggan'); 
        $builder->join('status_layanan ss', 'ss.id_pelanggan = permintaan_pelanggan.id', 'left');
        $builder->where('ss.status', 'Permintaan di Terima');
        return $builder->get()->getResultArray();
    }

}
