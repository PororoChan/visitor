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
        $name = $this->request->getPost('name');
        $uname = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $confirm = $this->request->getPost('confirm');
        $data = array();

        $rules = [
            'password' => 'required|min_length[6]|max_length[255]',
            'confirm' => 'required|min_length[6]|max_length[255]|matches[password]',
        ];

        if (!$this->validate($rules)) {
            $data['success'] = '0';
        } else {

            $data = [
                'name' => $name,
                'username' => $uname,
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'created_at' => date('Y-m-d H:i:s'),
            ];

            $this->model->tambah($data);

            $data['success'] = '1';
        }

        echo json_encode($data);
    }
}
