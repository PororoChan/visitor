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
        $session = session();
        $uname = $this->request->getPost("username");
        $pass = $this->request->getPost("password");

        $data = array();

        $dt = $this->model->auth($uname);
        if ($dt) {
            if (password_verify($pass, rtrim($dt['password']))) {
                $session->set('userid', $dt['userid']);
                $session->set('nama', $dt['name']);

                $data['success'] = 1;
            } else {
                $data['success'] = 0;
            }
        } else {
            $data['success'] = 0;
        }

        echo json_encode($data);
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to('login');
    }
}
