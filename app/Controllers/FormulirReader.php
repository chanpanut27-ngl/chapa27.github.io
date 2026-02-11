<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class FormulirReader extends BaseController
{
    public function response_set_header()
    {
        $this->response->setHeader('Cache-Control', 'no-cache, no-store, must-revalidate');
        $this->response->setHeader('Pragma', 'no-cache');
        $this->response->setHeader('Expires', '0');

    }
    
    public function prosedur_permintaan_pemeriksaan_pengujian()
    {
       $this->response_set_header();
       $data = [
            'title' => 'Prosedur permintaan pemeriksaan pengujian'
        ];
        return view('File/Formulir/__pemeriksaan__pengujian', $data);
    }

    public function permintaan_pemeriksaan_rujukan_atau_kiriman()
    {
        $this->response_set_header();
        $data = [
            'title' => 'Permintaan Pemeriksaan Rujukan atau Kiriman'
        ];
        return view('File/Formulir/__pemeriksaan__rujukan_atau_kiriman', $data);
    }

    public function permintaan_pengujian_sampel_lingkungan()
    {
        $this->response_set_header();
        $data = [
            'title' => 'Permintaan Pengujian Sampel Lingkungan'
        ];
        return view('File/Formulir/__pengujian__sampel__lingkungan', $data);
    }

    public function permintaan_pengujian_spesimen_klinis()
    {
        $this->response_set_header();
        $data = [
            'title' => 'Permintaan Pengujian Spesimen Klinis'
        ];
        return view('File/Formulir/__pengujian__spesimen__klinis', $data);
    }

    public function contoh_surat()
    {
        $this->response_set_header();
        $data = [
            'title' => 'Contoh Surat'
        ];
        return view('File/Formulir/__contoh__surat', $data);
    }
}
