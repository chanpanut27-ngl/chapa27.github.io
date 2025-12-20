<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LaboratoriumModel;
use App\Models\LaboratoriumTujuanModel;
use App\Models\SuratPerintahUjiSampelModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\I18n\Time;

class SuratPerintahUjiSampel extends BaseController
{
    
    protected $title;
    protected $model;
    protected $masterTujuanLab;
    protected $validation;
    protected $time;
    protected $today;

    public function __construct()
    {
        $this->title = 'Surat Perintah Uji Sampel';
        $this->model = new SuratPerintahUjiSampelModel();
        $this->masterTujuanLab = new LaboratoriumTujuanModel();
        $this->time = Time::now('Asia/Jakarta'); 
        $this->today = $this->time->toDateTimeString();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {
        $data = [
            'title' => 'Data ' . $this->title,
            'test' => $this->model->get_data_perintah_uji()
        ];
        return view('Backend/Modul/Pelayanan/Perintah-uji/index', $data);
    }

    public function list()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'items' => $this->model->get_data_perintah_uji()
            ];
            $msg = [
                'data' => view('Backend/Modul/Pelayanan/Perintah-uji/_data', $data)
            ];

            echo json_encode($msg);
        } else {
            exit('Not Process');
        }    
    }

    public function new() 
    {
         
        if ($this->request->isAJAX()) {
            $id_instalasi = $this->request->getVar('id_instalasi');
            $kode_pengantar = $this->request->getVar('kode_pengantar');
        
            $data = [
                'title' => 'Tambah ' . $this->title,
                'id_instalasi' => $id_instalasi,
                'kode_pengantar' => $kode_pengantar,
                'list_lab' => $this->masterTujuanLab->where('kode_pengantar', $kode_pengantar)->findAll()
            ];

            $msg = [
                'data' => view('Backend/Modul/Pelayanan/Perintah-uji/_add', $data)
            ];
            echo json_encode($msg);
        } else {
            exit('Not Process');
        }    
    }

}
