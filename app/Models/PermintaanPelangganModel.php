<?php

namespace App\Models;

use CodeIgniter\I18n\Time;
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
       $myTime = new Time();
        if ($username) {
            $data['data']['updated_by'] = $username;
            $data['data']['updated_at'] = $myTime->toDateTimeString();
        }
        return $data;
    }
    

    public function generate_no_reg() 
    {
        $model = new PermintaanPelangganModel();
        // Hitung jumlah antrian yang sudah ada untuk tanggal hari ini
        $count = $model->countAllResults();
       
        // Buat nomor urut baru
        $nomorUrut = $count + 1;

        // Format nomor antrian
        $nomorAntrian = sprintf('%04d', $nomorUrut) . '.' . date('dmY');
        
        return $nomorAntrian;
    }

    public function generate_kode_pelanggan() 
    {
        $model = new PermintaanPelangganModel();

        // Hitung jumlah antrian yang sudah ada untuk tanggal hari ini
        $count = $model->countAllResults();
       
        // Buat nomor urut baru
        $nomorUrut = $count + 1;

        // Format nomor antrian
        $nomorAntrian = 'P' . sprintf('%04d', $nomorUrut);
        
        return $nomorAntrian;
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
