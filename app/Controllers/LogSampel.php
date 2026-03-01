<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PermintaanPelangganModel;
use App\Models\StatusLayananModel;
use CodeIgniter\HTTP\ResponseInterface;

class LogSampel extends BaseController
{

    protected $title;
    protected $m_status_layanan;

    public function __construct()
    {
        $this->title = 'Log sampel';
        $this->m_status_layanan = new StatusLayananModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data ' . $this->title
        ];
        return view('Backend/Log-sampel/index', $data);
    }

    public function log_penerimaan()
    {

        if ($this->request->isAJAX()) {

            $data = [
                'title' => 'Penerimaan sampel',
                'items' => $this->m_status_layanan->get_data('Permintaan di Terima')
            ];

            $msg = [
                'data' => view('Backend/Log-sampel/__penerimaan', $data)
            ];

            echo json_encode($msg);
        } else {
            exit('Not Process');
        }
    }

     public function log_penawaran()
    {

        if ($this->request->isAJAX()) {

            $data = [
                'items' => $this->m_status_layanan->get_data('Penawaran Di Terima')
            ];

            $msg = [
                'data' => view('Backend/Log-sampel/__penawaran', $data)
            ];

            echo json_encode($msg);
        } else {
            exit('Not Process');
        }
    }
}
