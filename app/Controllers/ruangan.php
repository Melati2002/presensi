<?php

namespace App\Controllers;

use App\Models\modelRuangan;


class Ruangan extends BaseController
{

    public function __construct()
    {
        helper('form');
        $this->modelRuangan = new modelRuangan();
    }

    public function index()
    {
        $data = [
            'title'    => 'Master Data',
            'subtitle' => 'Ruangan',
            'ruangan' => $this->modelRuangan->allData()
        ];
        return view('admin/ruangan', $data);
    }

    public function add()
    {
        $data = [
            'ruangan' => $this->request->getPost('ruangan'),
        ];
        $this->modelRuangan->add($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Tambahkan !!');
        return redirect()->to(base_url('ruangan'));
    }

    public function edit($id_ruangan)
    {
        $data = [
            'id_ruangan' => $id_ruangan,
            'ruangan' => $this->request->getPost('ruangan'),
        ];
        $this->modelRuangan->edit($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Update !!');
        return redirect()->to(base_url('ruangan'));
    }

    public function delete($id_ruangan)
    {
        $data = [
            'id_ruangan' => $id_ruangan,
        ];
        $this->modelRuangan->delete_data($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Hapus !!');
        return redirect()->to(base_url('ruangan'));
    }

    //--------------------------------------------------------------------

}
