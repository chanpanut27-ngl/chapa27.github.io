<?php

namespace App\Models;

use CodeIgniter\Model;

class PenanggungJawabLhuModel extends Model
{
    protected $table            = 'penanggung_jawab_lhu';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'alat_utama',
        'nama_pjb',
        'no_telp_pjb',
        'penerima_sampel',
        'no_telp_penerima',
        'tgl_terima_sampel',
        'jam_terima_sampel',
        'kode_pengantar'
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

    public function konversi_tanggal($param = null) 
    {
       $date = date('m', strtotime($param));
       $month = [
            '1' => 'Januari',
            '2' => 'Februari',
            '3' => 'Maret',
            '4' => 'April',
            '5' => 'Mei',
            '6' => 'Juni',
            '7' => 'Juli',
            '8' => 'Agustus',
            '9' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember'
       ];
       foreach ($month as $key => $val) {
            if ($date == $key) {
                $r_date = date('d', strtotime($param));
                $r_year = date('Y', strtotime($param));
                $result = $r_date.' '.$val.' '.$r_year;
                return $result;
            }
       }

    }
}
