<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LaboratoriumTujuanModel;
use App\Models\PengantarLabModel;

class ResumePengantarLab extends BaseController
{
    protected $title;
    protected $modelPengantarLhu;
    protected $modelLabTujuan;

    public function __construct()
    {
        $this->title = 'Resume';
        $this->modelPengantarLhu = new PengantarLabModel();
        $this->modelLabTujuan = new LaboratoriumTujuanModel();
    }

    public function index($id = null)
    {
        $kode_pengantar = $id;
        $data = [
            'title' => 'Resume',
            'kode_pengantar' => $kode_pengantar,
            'items' => $this->modelPengantarLhu->get_data_by_kode_pengantar($kode_pengantar),
            'menu_lab' => $this->modelLabTujuan->get_data($kode_pengantar),
            'data_pelanggan' => $this->modelPengantarLhu->get_data_by_kode_pengantar($kode_pengantar),
            'group_lab_tujuan' => $this->modelLabTujuan->get_data_by_group_kat_lab($kode_pengantar)
        ];
        return view('Backend/Modul/Pelayanan/Lab/Resume/index', $data);
    }

    public function list($id = null)
    {
        if ($this->request->isAJAX()) {
            $kode_pengantar = $this->request->getVar('kode_pengantar');

            $data = [
                'title' => 'Resume',
                'kode_pengantar' => $kode_pengantar,
                'items' => $this->modelPengantarLhu->get_data_by_kode_pengantar($kode_pengantar),
                'menu_lab' => $this->modelLabTujuan->get_data($kode_pengantar),
                'data_pelanggan' => $this->modelPengantarLhu->get_data_by_kode_pengantar($kode_pengantar),
                'group_lab_tujuan' => $this->modelLabTujuan->get_data_by_group_kat_lab($kode_pengantar)
            ];

            $msg = [
                'data' => view('Backend/Modul/Pelayanan/Lab/Resume/__data', $data)
            ];

            echo json_encode($msg);
        } else {
            exit('Not Process');
        }    

    }

    public function cetak($id = null)
    {
        $kode_pengantar = $id;
        
        $data = [
            'title' => 'Resume',
            'kode_pengantar' => $kode_pengantar,
            'items' => $this->modelPengantarLhu->get_data_by_kode_pengantar($kode_pengantar),
            'menu_lab' => $this->modelLabTujuan->get_data($kode_pengantar),
            'data_pelanggan' => $this->modelPengantarLhu->get_data_by_kode_pengantar($kode_pengantar),
            'group_lab_tujuan' => $this->modelLabTujuan->get_data_by_group_kat_lab($kode_pengantar),
            'nomor_form' => 'LB IV 7.1.1.1'
        ];
        return view('Backend/Modul/Pelayanan/Lab/Resume/__cetak', $data);
    }
}
