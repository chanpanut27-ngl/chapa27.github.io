<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\CustomLib;

class CetakPdf extends BaseController
{
    public function index()
    {
        $a = new CustomLib();
       echo $a->greet('chan');
    }
}
