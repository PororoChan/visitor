<?php

namespace App\Models;

use CodeIgniter\Model;

class MUser extends Model
{
    protected $table = 'dt_user as d';

    public function __construct()
    {
        $this->db = db_connect();
        $this->builder = $this->db->table($this->table);
    }

    public function auth($username)
    {
        return $this->builder
            ->where('d.username', $username)
            ->get()->getRowArray();
    }
}
