<?php

namespace App\Controllers\master;

use App\Controllers\BaseController;
use App\Helpers\Datatables\Datatables;
use App\Models\MVisitor;

class Visitor extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->model = new MVisitor();
    }

    public function index()
    {
        if (session()->get('userid') == NULL) {
            return redirect()->to('login');
        }

        $data = $this->model->total();
        $send = [
            'total' => number_format($data, 0, '.', ','),
        ];

        return view('master/v_home', $send);
    }

    public function datatable()
    {
        $datatable = Datatables::method([MVisitor::class, 'getData'], 'searchable')
            ->setParams(1, 'kedua')
            ->make();

        $datatable->updateRow(function ($db, $no) {
            return [
                $no,
                $db->visitorname,
                $db->address . ", RT." . $db->rt . ", RW." . $db->rw . ", Desa " . $db->village,
                "Rp. " . number_format($db->amount, 0, '.', ','),
                date("d F Y", strtotime($db->visitdate)),
                "<button type='button' class='btn btn-warning btn-sm' onclick=\"editData('Update', '" . $db->visitorid . "', '" . base_url('visitor/edit') . "')\"><i class='fas fa-pen'></i></button> " .
                    "<button type='button' class='btn btn-danger btn-sm' onclick=\"modalDelete('Delete Data', '" . $db->visitorid . "', '" . base_url('visitor/delete') . "')\"><i class='fas fa-trash'></i></button>",
            ];
        });

        $datatable->toJson();
    }

    // public function forms($visid = '')
    // {
    //     $form = 'add';
    //     if ($visid != '') {
    //         $form = 'edit';
    //     }

    //     $data = [
    //         'form_type' => $form,
    //         'visid' => $visid,
    //     ];

    //     $res['view'] = view('master/v_form', $data);
    //     echo json_encode($res);
    // }

    public function tambahDt()
    {
        $vname = $this->request->getPost('name');
        $vill = $this->request->getPost('village');
        $rt = $this->request->getPost('rt');
        $rw = $this->request->getPost('rw');
        $date = $this->request->getPost('tgl_in');
        $nomin = str_replace(',', '', $this->request->getPost('amount'));
        $addres = $this->request->getPost('address');

        // $validation = \Config\Services::validation();

        $validate = $this->validate([
            'name' => [
                'rules' => 'required',
                'label' => 'Nama',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                ]
            ],
            'village' => [
                'rules' => 'required',
                'label' => 'Desa',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                ]
            ],
            'rt' => [
                'rules' => 'required|min_length[2]',
                'label' => 'Rt',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'min_length' => '{field} harus dua digit angka',
                ]
            ],
            'rw' => [
                'rules' => 'required|min_length[2]',
                'label' => 'Rw',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'min_length' => '{field} harus dua digit angka',
                ]
            ],
            'tgl_in' => [
                'rules' => 'required',
                'label' => 'Tanggal',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                ]
            ],
            'amount' => [
                'rules' => 'required',
                'label' => 'Nominal',
                'errors' => [
                    'required' => '{field} tidak boleh nol'
                ]
            ],
            'address' => [
                'rules' => 'required|max_length[120]',
                'label' => 'Alamat',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'max_length' => '{field} melebihi karakter',
                ]
            ],
        ]);

        if (!$validate) {
            $msg['success'] = '0';
        } else {
            $data = [
                'visitorname' => $vname,
                'address' => $addres,
                'village' => $vill,
                'rt' => $rt,
                'rw' => $rw,
                'amount' => $nomin,
                'visitdate' => $date,
                'createddate' => date('Y-m-d H:i:s'),
            ];

            $this->model->tambah($data);

            $msg['success'] = '1';
        }
        echo json_encode($msg);
    }

    public function editDt()
    {
        $id = $this->request->getPost('visid');
        $data = $this->model->getOne($id);

        $res = [
            'id' => $data['visitorid'],
            'name' => $data['visitorname'],
            'desa' => $data['village'],
            'rt' => $data['rt'],
            'rw' => $data['rw'],
            'tgl' => $data['visitdate'],
            'nomin' => number_format($data['amount'], 0, '.', ','),
            'address' => $data['address'],
        ];

        echo json_encode($res);
    }

    public function updateDt()
    {
        $id = $this->request->getPost('id-visit');
        $vname = $this->request->getPost('name');
        $vill = $this->request->getPost('village');
        $rt = $this->request->getPost('rt');
        $rw = $this->request->getPost('rw');
        $date = $this->request->getPost('tgl_in');
        $nomin = $this->request->getPost('amount');
        $addres = $this->request->getPost('address');

        // $validation = \Config\Services::validation();

        $validate = $this->validate([
            'name' => [
                'rules' => 'required',
                'label' => 'Nama',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                ]
            ],
            'village' => [
                'rules' => 'required',
                'label' => 'Desa',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                ]
            ],
            'rt' => [
                'rules' => 'required|min_length[2]',
                'label' => 'Rt',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'min_length' => '{field} harus dua digit angka',
                ]
            ],
            'rw' => [
                'rules' => 'required|min_length[2]',
                'label' => 'Rw',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'min_length' => '{field} harus dua digit angka',
                ]
            ],
            'tgl_in' => [
                'rules' => 'required',
                'label' => 'Tanggal',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                ]
            ],
            'amount' => [
                'rules' => 'required',
                'label' => 'Nominal',
                'errors' => [
                    'required' => '{field} tidak boleh nol'
                ]
            ],
            'address' => [
                'rules' => 'required|max_length[120]',
                'label' => 'Alamat',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'max_length' => '{field} melebihi karakter',
                ]
            ],
        ]);

        if (!$validate) {
            $msg['success'] = '0';
        } else {
            $data = [
                'visitorname' => $vname,
                'address' => $addres,
                'village' => $vill,
                'rt' => $rt,
                'rw' => $rw,
                'amount' => $nomin,
                'visitdate' => $date,
            ];

            $q = $this->model->editDt($data, $id);

            if ($q) {
                $msg['success'] = '1';
            } else {
                $msg['success'] = '0';
            }
        }
        echo json_encode($msg);
    }


    public function vDelete()
    {
        $visitid = $this->request->getPost('id');

        $result = $this->model->hapus($visitid);
        if ($result) {
            echo '1';
        } else {
            echo '0';
        }
    }
}
