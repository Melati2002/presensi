<?php

namespace App\Controllers;

use App\Models\modelPegawai;
use App\Models\modelAkun;

class Pegawai extends BaseController
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
            'title'    => 'Master Data',
            'subtitle' => 'pegawai',
            'pegawai' => $this->modelPegawai->allData(),
        ];
        return view('admin/pegawai/pegawai', $data);
    }
    public function add()
    {
        $data = [
            'title' => 'Master Data',
            'subtitle' => 'Pegawai',
            'akun' => $this->modelAkun->allData()
        ];
        return view('admin/pegawai/add', $data);
    }
    public function save()
    {
        $no_pegawai = $_POST['no_pegawai'];
        $nama_pegawai = $_POST['nama_pegawai'];
        $id_akun = $_POST['id_akun'];
        $data = array();

        $index = 0; // Set index array awal dengan 0
        foreach ($no_pegawai as $datapegawai) {
            array_push($data, array(
                'no_pegawai' => $datapegawai,
                'nama_pegawai' => $nama_pegawai[$index],
                'id_akun' => $id_akun[$index]
            ));

            $index++;
        }
        $sql =  $this->modelPegawai->save_batch($data);

        // Cek apakah query insert nya sukses atau gagal
        if ($sql) { // Jika sukses
            echo "<script>alert('Data gagal disimpan');window.location = '" . base_url('pegawai/add') . "';</script>";
        } else { // Jika gagal
            echo "<script>alert('Data berhasil disimpan');window.location = '" . base_url('pegawai') . "';</script>";
        }
    }

    public function insert()
    {

        $data = [
            'no_pegawai' => $this->request->getPost('no_pegawai'),
            'nama_pegawai' => $this->request->getPost('nama_pegawai'),
            'id_akun' => $this->request->getPost('id_akun')
        ];
        $this->modelPegawai->add($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Tambahkan !!');
        return redirect()->to(base_url('pegawai'));
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
