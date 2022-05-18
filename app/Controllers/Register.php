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
        $usern = $this->request->getPost('uname');
        $password = $this->request->getPost('password');
        $data = array();

        if ($usern != "" && $password != "") {
            $data = [
                'username' => $usern,
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
