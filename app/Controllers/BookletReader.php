<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class BookletReader extends BaseController
{
    public function booklet_3()
    {
        $data = [
            'title' => 'Booklet 3'
        ];
        return view('Backend/File/Booklet/_booklet_3', $data);
    }
}
