<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\StatusLayananModel;

class MenuLogSampel extends BaseController
{
    protected $title;
    protected $m_status_layanan;

    public function __construct()
    {
        $this->title = 'Log sampel';
        $this->m_status_layanan = new StatusLayananModel();
    }

    public function menu_penerimaan()
    {
       
        $data = [
            'title' => 'Penerimaan sampel',
            'items' => $this->m_status_layanan->get_data('Permintaan di Terima')
        ];
        return view('Backend/Log-sampel/__penerimaan', $data);
    }

    public function menu_penawaran()
    {
       
        $data = [
            'title' => 'Penawaran sampel',
            'items' => $this->m_status_layanan->get_data('Penawaran di Terima')
        ];
        return view('Backend/Log-sampel/__penawaran', $data);
    }



}
