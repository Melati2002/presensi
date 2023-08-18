<?php

namespace App\Controllers;

use App\Models\modelMakul;
use App\Models\modelKurikulum;

class Makul extends BaseController
{

    public function __construct()
    {
        helper('form');
        $this->modelMakul = new modelMakul();
        $this->modelKurikulum = new modelKurikulum();
    }

    public function index()
    {
        $data = [
            'title'    => 'Master Data',
            'subtitle' => 'Mata Kuliah',
            'makul' => $this->modelMakul->allData(),
            'kurikulum' => $this->modelKurikulum->allData()
        ];
        return view('admin/makul', $data);
    }
    public function add()
    {
        $data = [
            'kode_mk' => $this->request->getPost('kode_mk'),
            'mk' => $this->request->getPost('mk'),
            'smt' => $this->request->getPost('smt'),
            'sks' => $this->request->getPost('sks'),
            'id_kurikulum' => $this->request->getPost('id_kurikulum'),

        ];
        $this->modelMakul->add($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Tambahkan !!');
        return redirect()->to(base_url('makul'));
    }

    public function edit($id_mk)
    {
        if (isset($_POST['edit'])) {
            $val = $this->validate([
                'kode_mk' => [
                    'label' => 'Kode Matakuliah',
                    'rules' => 'required'

                ],
                'mk' => [
                    'label' => 'Mata Kuliah',
                    'rules' => 'required|alpha_space'
                ],
                'smt' => [
                    'label' => 'Semester',
                    'rules' => 'required|numeric'

                ],
                'sks' => [
                    'label' => 'SKS',
                    'rules' => 'required|numeric'
                ],
            ]);
            if (!$val) {
                session()->setFlashdata('error', \Config\Services::validation()->listErrors());
                $data = [
                    'title'    => 'Master Data',
                    'subtitle' => 'Mata Kuliah',
                    'makul' => $this->modelMakul->allData(),
                ];
                return view('admin/makul', $data);
            } else {
                $data = [
                    'id_mk' => $id_mk,
                    'kode_mk' => $this->request->getPost('kode_mk'),
                    'mk' => $this->request->getPost('mk'),
                    'smt' => $this->request->getPost('smt'),
                    'sks' => $this->request->getPost('sks'),
                    'id_kurikulum' => $this->request->getPost('id_kurikulum')

                ];
                $this->modelMakul->edit($data);
                session()->setFlashdata('pesan', 'Data Berhasil Di Update !!');
                return redirect()->to(base_url('makul'));
            }
        } else {
            return redirect()->to(base_url('makul'));
        }
    }
    public function delete($id_mk)
    {

        $data = [
            'id_mk' => $id_mk,
        ];
        $this->modelMakul->delete_data($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Hapus !!');
        return redirect()->to(base_url('makul'));
    }
}
