<?php

namespace App\Models;

use CodeIgniter\Model;

class MVisitor extends Model
{
    protected $table = 'msvisitor as v';

    public function __construct()
    {
        $this->db = db_connect();
        $this->builder = $this->db->table($this->table);
    }

    public function searchable()
    {
        return [
            null,
            'visitorname',
            'address',
            'village',
            'rt',
            'rw',
            null,
            'visitdate',
            null,
        ];
    }

    public function getData($param, $text)
    {
        return $this->builder->select('visitorid, visitorname as vname, address, amount, visitdate');
    }

    public function tambah($data)
    {
        return $this->builder->insert($data);
    }

    public function hapus($id)
    {
        return $this->builder->delete(['visitorid' => $id]);
    }
}
