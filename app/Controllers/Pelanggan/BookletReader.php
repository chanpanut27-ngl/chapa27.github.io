<?php

namespace App\Controllers\Pelanggan;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class BookletReader extends BaseController
{
    public function response_set_header()
    {
        $this->response->setHeader('Cache-Control', 'no-cache, no-store, must-revalidate');
        $this->response->setHeader('Pragma', 'no-cache');
        $this->response->setHeader('Expires', '0');

    }

    public function booklet_2025()
    {
        $this->response_set_header();
        $data = [
            'title' => 'Booklet Tahun 2025'
        ];
        return view('File/Booklet/__booklet__2025', $data);
    }

    public function booklet_2026()
    {
        $this->response_set_header();

        $data = [
            'title' => 'Booklet Tahun 2026'
        ];
        return view('File/Booklet/__booklet__2026', $data);
    }

    public function tarif_pnbp()
    {
        $this->response_set_header();
    
        $data = [
            'title' => 'Harga PNBP (Paket)'
        ];
        return view('File/Booklet/__harga__pnbp', $data);
    }
}
