<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class UserPelanggan extends BaseController
{
    protected $title;

    public function __construct()
    {
        $this->title = 'Home';
    }

    public function index()
    {
       $data['title'] = $this->title;
        return view('Frontend/Layout/_home', $data);
    }

    public function dashboard(): string
    {
        $data['title'] = $this->title;
        return view('Frontend/Layout/_dashboard', $data);
    }
}
