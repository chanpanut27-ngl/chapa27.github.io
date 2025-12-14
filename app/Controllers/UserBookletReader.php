<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class UserBookletReader extends BaseController
{
    public function booklet_3()
    {
        $data = [
            'title' => 'Booklet 3'
        ];
        return view('Frontend/File/Booklet/_booklet_3', $data);
    }

    public function harga_pnbp()
    {
        $data = [
            'title' => 'Harga PNBP'
        ];
        return view('Frontend/File/Booklet/_harga_pnbp', $data);
    }

}
