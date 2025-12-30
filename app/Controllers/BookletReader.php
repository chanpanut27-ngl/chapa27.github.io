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
    
    public function booklet_3()
    {
        $this->response->setHeader('Cache-Control', 'no-cache, no-store, must-revalidate');
        $this->response->setHeader('Pragma', 'no-cache');
        $this->response->setHeader('Expires', '0');

        $data = [
            'title' => 'Booklet 3'
        ];
        return view('Backend/File/Booklet/_booklet_3', $data);
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
