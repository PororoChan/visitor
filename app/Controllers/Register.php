<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MUser;

class Register extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->model = new MUser();
    }

    public function index()
    {
        echo view('v_register');
    }

    public function addUser()
    {
        $nama = $this->request->getPost('nama');
        $uname = $this->request->getPost('uname');
        $password = $this->request->getPost('password');
        $data = array();

        if ($uname != "" && $password != "") {
            $data = [
                'username' => $uname,
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'created_at' => date('Y-m-d H:i:s'),
            ];

            $this->model->tambah($data);

            $data['success'] = '1';
        } else {
            $data['success'] = '0';
        }
        echo json_encode($data);
    }
}
