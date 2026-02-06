<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        // $data = ['title' => lang('Auth.loginTitle') ];
        return view('Auth/login');
    }
}
