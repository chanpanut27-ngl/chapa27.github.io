<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Pelanggan extends BaseController
{
    protected $title;

    public function __construct()
    {
        $this->cachePage(5);
        $this->title = 'Home';
    }

    public function index()
    {
        $data['title'] = $this->title;
        return view('Pelanggan/Layout/_home', $data);
    }

    public function dashboard()
    {
        $data['title'] = $this->title;
        return view('Pelanggan/Layout/_home', $data);
    }
}
