<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Admin extends BaseController
{
    protected $title;
    
    public function __construct()
    {
        $this->title = 'Home';
    }

    public function index()
    {
        $data['title'] = $this->title;
        return view('Admin/Layout/_home', $data);
    }

    public function dashboard()
    {
        $data['title'] = $this->title;
        return view('Admin/Layout/_dashboard', $data);
    }
}
