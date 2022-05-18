<?php

namespace App\Models;

use CodeIgniter\Model;

class MUser extends Model
{
    protected $table = 'msuser as u';

    public function __construct()
    {
        $this->db = db_connect();
        $this->builder = $this->db->table($this->table);
    }

    public function tambah($data)
    {
        return $this->builder->insert($data);
    }

    public function auth($username)
    {
        return $this->builder
            ->where('u.username', $username)
            ->get()->getRowArray();
    }
}
