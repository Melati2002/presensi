<?php

namespace App\Controllers;

use App\Models\modelKelasmahasiswa;
use App\Models\modelKelas;
use App\Models\modelTA;
use App\Models\modelMahasiswa;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Kelasmahasiswa extends BaseController
{

    public function __construct()
    {
        helper('form');
        $this->modelKelasmahasiswa = new modelKelasmahasiswa();
        $this->modelTA = new modelTA();
        $this->modelMahasiswa = new modelMahasiswa();
        $this->modelKelas = new modelKelas();
    }

    public function index()
    {
        $data = [
            'title'    => 'Master Data',
            'subtitle' => 'Kelas Mahasiswa',
            'mahasiswa' => $this->modelMahasiswa->allData(),
            'kelasmahasiswa' => $this->modelKelasmahasiswa->allData(),
            'kelas' => $this->modelKelas->allData(),
            'ts' => $this->modelTA->allData()
        ];
        return view('admin/kelasmahasiswa/kelasmahasiswa', $data);
    }

    // public function detail($id_kelas)
    // {
    //     $data = [
    //         'title'    => 'Master Data',
    //         'subtitle' => 'Kelas Mahasiswa',
    //         'kelasmahasiswa' => $this->modelKelasmahasiswa->allData($id_kelas),
    //         'mahasiswa' => $this->modelMahasiswa->allData(),
    //         'idkelas' => $id_kelas,
    //         'ts' => $this->modelTA->allData()
    //     ];
    //     return view('admin/kelasmahasiswa/kelasmahasiswa', $data);
    // }

    public function add()
    {
        $data = [
            'title'    => 'Master Data',
            'subtitle' => 'Kelas Mahasiswa',
        ];
        return view('admin/kelasmahasiswa/add', $data);
    }

    public function insert()
    {
        $data = [
            'id_kelas' => $this->request->getPost('id_kelas'),
            'id_ts' => $this->request->getPost('id_ts'),
            'id_mahasiswa' => $this->request->getPost('id_mahasiswa'),
        ];
        $this->modelKelasmahasiswa->add($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Tambahkan !!');
        return redirect()->to(base_url('kelasmahasiswa'));
    }

    public function edit($id_km)
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
                    'kelasmahasiswa' => $this->modelKelasmahasiswa->allData(),
                    'mahasiswa' => $this->modelMahasiswa->allData(),
                    'kelas' => $this->modelKelas->allData(),
                    'ts' => $this->modelTA->allData()
                ];
                return view('admin/kelasmahasiswa/kelasmahasiswa', $data);
            } else {
                $data = [
                    'id_km' => $id_km,
                    'id_ts' => $this->request->getPost('id_ts'),
                    'id_kelas' => $this->request->getPost('id_kelas'),
                    'id_mahasiswa' => $this->request->getPost('id_mahasiswa'),
                ];
                $this->modelPengampumk->edit($data);
                session()->setFlashdata('pesan', 'Data Berhasil Di Update !!');
                return redirect()->to(base_url('kelasmahasiswa'));
            }
        } else {
            return redirect()->to(base_url('kelasmahasiswa'));
        }
    }
    public function delete($id_km)
    {

        $data = [
            'id_km' => $id_km,
        ];
        $this->modelMahasiswa->delete_data($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Hapus !!');
        return redirect()->to(base_url('kelasmahasiswa'));
    }

    public function import()
    {
        $file = $this->request->getFile('file_excel');
        $extension = $file->getClientExtension();
        if ($extension == 'xlsx' || $extension == 'xls') {
            if ($extension == 'xls') {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
            } else {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }
            $spreadsheet = $reader->load($file);
            $daftarmahasiswa = $spreadsheet->getActiveSheet()->toArray();
            foreach ($daftarmahasiswa as $key => $value) {
                if ($key == 0) {
                    continue;
                }

                $kelasmhs = [
                    'id_mahasiswa' => $this->modelMahasiswa->getidmhs($value[1])['id_mahasiswa'],
                    'id_ts' => $this->request->getPost('id_ts'),
                    'id_kelas' => $this->request->getPost('id_kelas'),
                ];
                $this->modelKelasmahasiswa->add($kelasmhs);
            }
        } else {
            // set flash data
        }
        return redirect()->to(base_url('kelasmahasiswa'));
    }
}
