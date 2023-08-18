<?php

namespace App\Controllers;

use App\Models\modelPegawai;
use App\Models\modelAkun;

class akunPegawai extends BaseController
{

    public function __construct()
    {
        helper('form');
        $this->modelPegawai = new modelPegawai();
        $this->modelAkun = new modelAkun();
    }

    public function index()
    {
        $data = [
            'title' => 'Akun & Pegawai',
            'subtitle' => 'Akun & Pegawai',
            'pegawai' => $this->modelPegawai->allData(),
        ];
        return view('admin/akun-pegawai/akun-pegawai', $data);
    }
    public function add()
    {
        $data = [
            'title' => 'Akun & Pegawai',
            'subtitle' => 'Akun & Pegawai',
            'akun' => $this->modelAkun->allData()
        ];
        return view('admin/akun-pegawai/add', $data);
    }

    public function insert()
    {

        $data = [
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
        ];
        $this->modelAkun->add($data);
        $idakun = $this->modelAkun->insertID();

        $dataPegawai = [
            'no_pegawai' => $this->request->getPost('no_pegawai'),
            'nama_pegawai' => $this->request->getPost('nama_pegawai'),
            'id_akun' => $idakun
        ];
        $this->modelPegawai->add($dataPegawai);
        session()->setFlashdata('pesan', 'Data Berhasil Di Tambahkan !!');
        return redirect()->to(base_url('akunPegawai'));
    }

    public function edit($id_pegawai)
    {
        if (isset($_POST['edit'])) {
            $val = $this->validate([
                'no_pegawai' => [
                    'label' => 'Nomor Pegawai',
                    'rules' => 'required|numeric|max_length[10]'

                ],
                'nama_pegawai' => [
                    'label' => 'Nama Pegawai',
                    'rules' => 'required|alpha_space'
                ]
            ]);
            if (!$val) {
                session()->setFlashdata('error', \Config\Services::validation()->listErrors());
                $data = [
                    'title'    => 'Master Data',
                    'subtitle' => 'Pegawai',
                    'pegawai' => $this->modelPegawai->detail_Data(),
                    'akun' => $this->modelAkun->allData(),
                ];
                return view('admin/pegawai/pegawai', $data);
            } else {
                $data = [
                    'id_pegawai' => $id_pegawai,
                    'no_pegawai' => $this->request->getPost('no_pegawai'),
                    'nama_pegawai' => $this->request->getPost('nama_pegawai'),
                    'id_akun' => $this->request->getPost('id_akun')
                ];
                $this->modelPegawai->edit($data);
                session()->setFlashdata('pesan', 'Data Berhasil Di Update !!');
                return redirect()->to(base_url('pegawai'));
            }
        } else {
            return redirect()->to(base_url('pegawai'));
        }
    }
    public function delete($id_pegawai)
    {

        $data = [
            'id_pegawai' => $id_pegawai,
        ];
        $this->modelMahasiswa->delete_data($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Hapus !!');
        return redirect()->to(base_url('pegawai'));
    }
}
