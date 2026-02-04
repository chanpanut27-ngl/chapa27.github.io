<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class BookletReader extends BaseController
{
    public function __construct()
    {
        $this->cachePage(5);
    }
    
    public function booklet_2025()
    {
        $this->response->setHeader('Cache-Control', 'no-cache, no-store, must-revalidate');
        $this->response->setHeader('Pragma', 'no-cache');
        $this->response->setHeader('Expires', '0');

        $data = [
            'title' => 'Booklet Tahun 2025'
        ];
        return view('Backend/File/Booklet/_booklet_2025', $data);
    }

     public function booklet_2026()
    {
        $this->response->setHeader('Cache-Control', 'no-cache, no-store, must-revalidate');
        $this->response->setHeader('Pragma', 'no-cache');
        $this->response->setHeader('Expires', '0');

        $data = [
            'title' => 'Booklet Tahun 2026'
        ];
        return view('Backend/File/Booklet/_booklet_2026', $data);
    }

    public function harga_pnbp()
    {
        $this->response->setHeader('Cache-Control', 'no-cache, no-store, must-revalidate');
        $this->response->setHeader('Pragma', 'no-cache');
        $this->response->setHeader('Expires', '0');
        
        $data = [
            'title' => 'Harga PNBP (Paket)'
        ];
        return view('Backend/File/Booklet/_harga_pnbp', $data);
    }

    
}
