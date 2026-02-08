<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\JenisSampelModel;
use App\Models\ParameterPemeriksaanModel;
use App\Models\PeraturanModel;

class CariData extends BaseController
{
    protected $m_jenis_sampel;
    protected $m_peraturan;
    protected $m_parameter;
    
    public function __construct()
    {
        $this->m_jenis_sampel = new JenisSampelModel();
        $this->m_peraturan = new PeraturanModel();
        $this->m_parameter = new ParameterPemeriksaanModel();
    }

    public function cari_sampel()
    {
        if ($this->request->isAJAX()) {
            $id_lab = $this->request->getVar('id_lab');
            $result = $this->m_jenis_sampel->where('id_lab', $id_lab)->findAll();

            $data = null;
            foreach ($result as $rows) {
                $data[] = '<option value="'.$rows['id'].'">'.$rows['jenis_sampel'].' '.$rows['keterangan'].'</option>';
            }
            $msg = ['data' => $data];
            echo json_encode($msg);
        } else {
            exit('Not Process');
        }
    }

    public function cari_peraturan()
    {
        if ($this->request->isAJAX()) {
            $id_jenis_sampel = $this->request->getVar('id_jenis_sampel');
            
            $builder = $this->db->table('master_jenis_sampel mjs');
            $builder->select('id_peraturan,peraturan');
            $builder->join('master_peraturan mp', 'mp.id=mjs.id_peraturan');
            $builder->where('mjs.id', $id_jenis_sampel);
            $result = $builder->get()->getResultArray();

            $data = null;
            foreach ($result as $rows) {
                $data[] = '<option value="'.$rows['id_peraturan'].'">'.$rows['peraturan'].'</option>';  
            }
            $parameter = [
                'items' => $this->m_parameter->where('id_jenis_sampel', $id_jenis_sampel)->where('is_active', 1)->findAll(),
            ];
            
            $msg = [
                'data' => $data, 
                'parameter' => view('Data/__parameter', $parameter)
            ];

            echo json_encode($msg);
        } else {
            exit('Not Process');
        }
    }
}
