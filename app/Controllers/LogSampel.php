<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\StatusLayananModel;

class LogSampel extends BaseController
{

    protected $m_status_layanan;

    public function __construct()
    {
        $this->m_status_layanan = new StatusLayananModel();
    }

    public function log_penerimaan()
    {

        $data = [
            'title' => 'Penerimaan sampel',
            'items' => $this->m_status_layanan->get_data('Permintaan di Terima')
        ];

        return view('Backend/Log-sampel/__penerimaan', $data);

    }

    public function log_penawaran()
    {

        $data = [
            'title' => 'Penawaran sampel',
            'items' => $this->m_status_layanan->get_data('Penawaran di Terima')
        ];

        return view('Backend/Log-sampel/__penawaran', $data);
    }

    public function log_distribusi_sampel($id = null)
    {
        
        $data = [
            'title' => 'Distribusi sampel',
            'items' => $this->m_status_layanan->get_data('Distribusi Sampel')
        ];

        return view('Backend/Log-sampel/__distribusi', $data);
    }
}
