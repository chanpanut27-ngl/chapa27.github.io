<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class FormulirReader extends BaseController
{
    
    public function prosedur_permintaan_pemeriksaan_pengujian()
    {
        $data = [
            'title' => 'Prosedur permintaan pemeriksaan pengujian'
        ];
        return view('Backend/File/Formulir/_prosedur_permintaan_pemeriksaan_pengujian', $data);
    }

    public function permintaan_pemeriksaan_rujukan_atau_kiriman()
    {
        $data = [
            'title' => 'Permintaan Pemeriksaan Rujukan atau Kiriman'
        ];
        return view('Backend/File/Formulir/_permintaan_pemeriksaan_rujukan_atau_kiriman', $data);
    }

    public function permintaan_pengujian_sampel_lingkungan()
    {
        $data = [
            'title' => 'Permintaan Pengujian Sampel Lingkungan'
        ];
        return view('Backend/File/Formulir/_permintaan_pengujian_sampel_lingkungan', $data);
    }

    public function permintaan_pengujian_spesimen_klinis()
    {
        $data = [
            'title' => 'Permintaan Pengujian Spesimen Klinis'
        ];
        return view('Backend/File/Formulir/_permintaan_pengujian_spesimen_klinis', $data);
    }

}
