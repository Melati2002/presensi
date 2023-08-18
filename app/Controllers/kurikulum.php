<?php

namespace App\Controllers;

use App\Models\modelKurikulum;


class Kurikulum extends BaseController
{

    public function __construct()
    {
        helper('form');
        $this->modelKurikulum = new modelKurikulum();
    }

    public function index()
    {
        $data = [
            'title'    => 'Master Data',
            'subtitle' => 'Kurikulum',
            'kurikulum' => $this->modelKurikulum->allData()
        ];
        return view('admin/kurikulum', $data);
    }

    public function add()
    {
        $data = [
            'tahun_kurikulum' => $this->request->getPost('tahun_kurikulum'),
        ];
        $this->modelKurikulum->add($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Tambahkan !!');
        return redirect()->to(base_url('kurikulum'));
    }

    public function edit($id_kurikulum)
    {
        $data = [
            'id_kurikulum' => $id_kurikulum,
            'tahun_kurikulum' => $this->request->getPost('tahun_kurikulum'),
        ];
        $this->modelKurikulum->edit($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Update !!');
        return redirect()->to(base_url('kurikulum'));
    }

    public function delete($id_kurikulum)
    {
        $data = [
            'id_kurikulum' => $id_kurikulum,
        ];
        $this->modelKurikulum->delete_data($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Hapus !!');
        return redirect()->to(base_url('kurikulum'));
    }
}
