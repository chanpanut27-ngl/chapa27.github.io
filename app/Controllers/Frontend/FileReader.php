<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class FileReader extends BaseController
{
    public function standar_pelayanan()
    {
        $data = [
            'title' => 'Standar Pelayanan'
        ];
        return view('Frontend/File/_standar_pelayanan', $data);
    }

    public function tarif_pelayanan()
    {
        $data = [
            'title' => 'Tarif Pelayanan'
        ];
        return view('Frontend/File/_tarif_pelayanan', $data);
    }
    
}
