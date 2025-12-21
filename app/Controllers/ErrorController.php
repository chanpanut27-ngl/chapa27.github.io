<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ErrorController extends BaseController
{
    public function show404_()
    {
        $data = [
            'title' => lang('Errors.pageNotFound'),
            'message' => 'Halaman tidak ditemukan'
        ];
        return view('errors/html/err_404_', $data);
    }

    public function show404()
    {
        $data = [
            'title' => lang('Errors.pageNotFound'),
            'message' => 'Halaman tidak ditemukan'
        ];
        return view('errors/html/err_404', $data);
    }
}
