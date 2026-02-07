<?php

namespace App\Controllers\Pelanggan;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class FileReader extends BaseController
{
    public function standar_pelayanan()
    {
        $data = [
            'title' => 'Standar Pelayanan'
        ];
        return view('File/__standar__pelayanan', $data);
    }

    public function tarif_pelayanan()
    {
        $data = [
            'title' => 'Tarif Pelayanan'
        ];
        return view('File/__tarif__pelayanan', $data);
    }
}
