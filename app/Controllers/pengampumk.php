<?php

namespace App\Controllers;

use App\Models\modelPengampumk;
use App\Models\modelKelas;
use App\Models\modelPegawai;
use App\Models\modelTA;
use App\Models\modelMakul;

class Pengampumk extends BaseController
{

    public function __construct()
    {
        helper('form');
        $this->modelPengampumk = new modelPengampumk();
        $this->modelPegawai = new modelPegawai();
        $this->modelTA = new modelTA();
        $this->modelMakul = new modelMakul();
        $this->modelKelas = new modelKelas();
    }

    public function index()
    {
        $data = [
            'title'    => 'Master Data',
            'subtitle' => 'Pengampu Mata Kuliah',
            'pengampu' => $this->modelPengampumk->allData(),
            'pegawai' => $this->modelPegawai->allData(),
            'makul' => $this->modelMakul->allData(),
            'kelas' => $this->modelKelas->allData(),
            'ts' => $this->modelTA->allData()
        ];
        return view('admin/pengampumk', $data);
    }

    public function save()
    {
        $id_mk = $_POST['id_mk'];
        $id_kelas = $_POST['id_kelas'];
        $id_pegawai = $_POST['id_pegawai'];
        $id_ts = $_POST['id_ts'];
        $data = array();

        $index = 0; // Set index array awal dengan 0
        foreach ($id_mk as $datapengampu) {
            array_push($data, array(
                'id_mk' => $datapengampu,
                'id_kelas' => $id_kelas[$index],
                'id_pegawai' => $id_pegawai[$index],
                'id_ts' => $id_ts[$index]
            ));

            $index++;
        }
        $sql =  $this->modelPengampumk->save_batch($data);

        // Cek apakah query insert nya sukses atau gagal
        if ($sql) { // Jika sukses
            echo "<script>alert('Data gagal disimpan');window.location = '" . base_url('pengampumk/add') . "';</script>";
        } else { // Jika gagal
            echo "<script>alert('Data berhasil disimpan');window.location = '" . base_url('pengampumk') . "';</script>";
        }
    }
    public function insert()
    {

        $data = [
            'id_mk' => $this->request->getPost('id_mk'),
            'id_kelas' => $this->request->getPost('id_kelas'),
            'id_pegawai' => $this->request->getPost('id_pegawai'),
            'id_ts' => $this->request->getPost('id_ts'),
        ];
        $this->modelPengampumk->inser($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Tambahkan !!');
        return redirect()->to(base_url('pengampumk'));
    }

    public function edit($id_pengampumk)
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
                    'subtitle' => 'Pengampu Mata Kuliah',
                    'pengampu' => $this->modelPengampumk->detail_Data(),
                    'makul' => $this->modelMakul->allData(),
                    'kelas' => $this->modelKelas->allData(),
                    'ts' => $this->modelTA->allData(),
                ];
                return view('admin/pengampumk/pengampumk', $data);
            } else {
                $data = [
                    'id_pengampumk' => $id_pengampumk,
                    'id_mk' => $this->request->getPost('id_mk'),
                    'id_kelas' => $this->request->getPost('id_kelas'),
                    'id_ts' => $this->request->getPost('id_ts')
                ];
                $this->modelPengampumk->edit($data);
                session()->setFlashdata('pesan', 'Data Berhasil Di Update !!');
                return redirect()->to(base_url('pengampumk'));
            }
        } else {
            return redirect()->to(base_url('pegawai'));
        }
    }
    public function delete($id_pengampumk)
    {

        $data = [
            'id_pegampumk' => $id_pengampumk,
        ];
        $this->modelMahasiswa->delete_data($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Hapus !!');
        return redirect()->to(base_url('pengampumk'));
    }
}
