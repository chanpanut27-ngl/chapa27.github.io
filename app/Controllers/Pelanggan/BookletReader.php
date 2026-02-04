<?php

namespace App\Controllers\Pelanggan;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class BookletReader extends BaseController
{
    public function booklet_2025()
    {
        $data = [
            'title' => 'Booklet 2025'
        ];
        return view('Pelanggan/File/Booklet/_booklet_2025', $data);
    }

    public function booklet_2026()
    {
        $data = [
            'title' => 'Booklet 2026'
        ];
        return view('Pelanggan/File/Booklet/_booklet_2026', $data);
    }

    public function harga_pnbp()
    {
        $data = [
            'title' => 'Harga PNBP'
        ];
        return view('Pelanggan/File/Booklet/_harga_pnbp', $data);
    }

}
