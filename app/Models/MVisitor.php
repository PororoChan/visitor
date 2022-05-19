<?php

namespace App\Models;

use CodeIgniter\Model;

class MVisitor extends Model
{
    protected $table = 'msvisitor';

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
            null,
            null,
            null,
            null,
            null,
            null,
        ];
    }

    public function getData($param, $text)
    {
        return $this->builder->select('visitorid, visitorname, address, amount, visitdate')->orderBy('visitorname', 'ASC');
    }

    public function getOne($id = '')
    {
        $d = $this->builder->get()->getRowArray();
        if ($id != '') {
            $d = $this->builder->where('visitorid', $id)->get()->getRowArray();
        }

        return $d;
    }

    public function tambah($data)
    {
        return $this->builder->insert($data);
    }

    public function editDt($data, $id)
    {
        return $this->builder->update($data, ['visitorid' => $id]);
    }

    public function hapus($id)
    {
        return $this->builder->delete(['visitorid' => $id]);
    }
}
