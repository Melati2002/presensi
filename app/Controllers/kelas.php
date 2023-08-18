<?php

namespace App\Controllers;

use App\Models\modelKelas;


class Kelas extends BaseController
{

    public function __construct()
    {
        helper('form');
        $this->modelKelas = new modelKelas();
    }

    public function index()
    {
        $data = [
            'title'    => 'Master Data',
            'subtitle' => 'Kelas',
            'kelas' => $this->modelKelas->allData()
        ];
        return view('admin/kelas', $data);
    }

    public function add()
    {
        $data = [
            'kelas' => $this->request->getPost('kelas'),
        ];
        $this->modelKelas->add($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Tambahkan !!');
        return redirect()->to(base_url('kelas'));
    }

    public function edit($id_kelas)
    {
        $data = [
            'id_kelas' => $id_kelas,
            'kelas' => $this->request->getPost('kelas'),
        ];
        $this->modelKelas->edit($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Update !!');
        return redirect()->to(base_url('kelas'));
    }

    public function delete($id_kelas)
    {
        $data = [
            'id_kelas' => $id_kelas,
        ];
        $this->modelKelas->delete_data($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Hapus !!');
        return redirect()->to(base_url('kelas'));
    }
}
