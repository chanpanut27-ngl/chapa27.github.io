<?php

namespace App\Controllers\Pelanggan;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class BookletReader extends BaseController
{
    public function booklet_3()
    {
        $data = [
            'title' => 'Booklet 3'
        ];
        return view('Pelanggan/File/Booklet/_booklet_3', $data);
    }

    public function harga_pnbp()
    {
        $data = [
            'title' => 'Harga PNBP'
        ];
        return view('Pelanggan/File/Booklet/_harga_pnbp', $data);
    }

}
