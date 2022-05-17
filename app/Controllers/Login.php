<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MUser;

class Login extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->model = new MUser();
    }

    public function index()
    {
        echo view('v_login');
    }

    public function auth()
    {
        $uname = $this->request->getPost("username");
        $pass = $this->request->getPost("password");

        $data = array();

        $sendData = $this->model->auth($uname);
        if ($sendData) {
            if (password_verify($pass, rtrim($sendData['password']))) {
                session()->set('userid', $sendData['userid']);
                session()->set('nama', $sendData['username']);
                $data['success'] = 1;
            } else {
                $data['success'] = 0;
            }
        } else {
            $data['success'] = 0;
        }

        echo json_encode($data);
    }
}
