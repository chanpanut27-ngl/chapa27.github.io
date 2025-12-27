<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class NotEnoughPrivilege extends BaseController
{
    public function show401()
    {
        $data = [
            'title' => '401 '.lang('Auth.notEnoughPrivilege'),
            'message' => "Anda tidak memiliki izin untuk mengakses halaman tersebut."
        ];
        return view('errors/html/error_401', $data);
    }
}
