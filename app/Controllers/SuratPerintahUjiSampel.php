<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SuratPerintahUjiSampelModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\I18n\Time;

class SuratPerintahUjiSampel extends BaseController
{
     protected $title;
    protected $model;
    protected $validation;
    protected $time;
    protected $today;

    public function __construct()
    {
        $this->title = 'Surat Perintah Uji Sampel';
        $this->model = new SuratPerintahUjiSampelModel();
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
}
