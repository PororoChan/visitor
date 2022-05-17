<?php

namespace App\Controllers\master;

use App\Controllers\BaseController;

class Coba extends BaseController
{
    public function index()
    {
        echo view('master/v_home');
    }
}
