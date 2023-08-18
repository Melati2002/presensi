<?php

namespace App\Controllers;

use App\Models\modelTA;

class tahunAkademik extends BaseController
{


    public function __construct()
    {
        helper('form');
        $this->modelTA = new modelTA();
    }

    public function index()
    {
        $data = [
            'title' => 'Akademik',
            'subtitle' => 'Tahun Akademik',
            'ts'    => $this->modelTA->allData()
        ];
        return view('admin/ta/set_ta', $data);
    }
    public function btn_add()
    {
        $data = [
            'title' => 'Master Data',
            'subtitle' => 'Tahun Akademik',
            'ts'    => $this->modelTA->allData()
        ];
        return view('admin/ta/ta', $data);
    }


    public function add()
    {
        $data = [
            'tahun_semester' => $this->request->getPost('tahun_semester'),
            'keterangan' => $this->request->getPost('keterangan')
        ];
        $this->modelTA->add($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Tambahkan !!');
        return redirect()->to(base_url('tahunAkademik/btn_add'));
    }

    public function edit($id_ts)
    {
        $data = [
            'id_ts' => $id_ts,
            'tahun_semester' => $this->request->getPost('tahun_semester'),
            'keterangan' => $this->request->getPost('keterangan')
        ];
        $this->modelTA->edit($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Edit !!');
        return redirect()->to(base_url('tahunAkademik'));
    }


    public function delete($id_ts)
    {
        $data = [
            'id_ts' => $id_ts
        ];
        $this->modelTA->delete_data($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Hapus !!');
        return redirect()->to(base_url('tahunAkademik'));
    }
    //--------------------------------------------------------------------
    //setting Tahun Akademik
    public function setting()
    {
        $data = [
            'title' => 'Setting',
            'subtitle' => 'Tahun Akademik',
            'ts'    => $this->modelTA->allData()
        ];
        return view('admin/ta/set_ta', $data);
    }

    public function set_status_ta($id_ts)
    {
        //reset status ta
        $this->modelTA->reset_status_ta();
        //set status ta
        $data = [
            'id_ts' => $id_ts,
            'status' => 1
        ];
        $this->modelTA->edit($data);
        session()->setFlashdata('pesan', 'Status Tahun Akademik Berhasil Diganti !!!');
        return redirect()->to(base_url('tahunAkademik/setting'));
    }
}
