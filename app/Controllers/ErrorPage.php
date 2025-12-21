<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ErrorPage extends BaseController
{
    
    protected $title;
    protected $message;

    public function __construct()
    {
        $this->title = lang('Errors.pageNotFound');
        $this->message = 'Halaman tidak ditemukan';
    }

    public function show404()
    {
        $data = [
            'title' => $this->title,
            'message' => $this->message
        ];
        return view('errors/html/error_404', $data);
    }

}
