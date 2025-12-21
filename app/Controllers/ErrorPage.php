<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ErrorPage extends BaseController
{
    public function show404()
    {
        $data = [
            'title' => lang('Errors.pageNotFound'),
            'message' => 'error page'
        ];
        return view('errors/html/error_404', $data);
    }

    public function show404_()
    {
        $data = [
            'title' => lang('Errors.pageNotFound'),
            'message' => 'error page'
        ];
        return view('errors/html/error_404_', $data);
    }
}
