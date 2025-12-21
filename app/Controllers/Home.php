<?php

namespace App\Controllers;

class Home extends BaseController
{
   
    public function __construct()
    {
    }

    public function index()
    {
        $data['title'] = lang('Auth.loginTitle');
        return view('Auth/login', $data);
    }

    public function register()
    {
        $data['title'] = lang('Auth.register');
        return view('Auth/register', $data);
    }
}
