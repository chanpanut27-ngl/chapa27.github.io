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
        if (!logged_in()) {
            return base_url('login');
        }
        $data['title'] = $this->title;
        return view('Backend/Layout/__home', $data);
    }

    public function dashboard()
    {
        $data['title'] = $this->title;
        return view('Backend/Layout/__home', $data);
    }
}
