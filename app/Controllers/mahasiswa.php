<?php

namespace App\Controllers;

use App\Models\modelMahasiswa;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Mahasiswa extends BaseController
{

    public function __construct()
    {
        helper('form');
        $this->modelMahasiswa = new modelMahasiswa();
    }

    public function index()
    {
        $data = [
            'title'    => 'Master Data',
            'subtitle' => 'Mahasiswa',
            'mahasiswa' => $this->modelMahasiswa->allData(),
        ];
        return view('admin/mahasiswa', $data);
    }

    public function insert()
    {

        if (isset($_POST['add'])) {
            $val = $this->validate([
                'nim' => [
                    'label' => 'NIM',
                    'rules' => 'required|numeric|max_length[10]'

                ],
                'nama_mahasiswa' => [
                    'label' => 'Nama Mahasiswa',
                    'rules' => 'required|alpha_space'
                ],
                'gender' => [
                    'label' => 'Gender',
                    'rules' => 'required'

                ],
                'tahun_masuk' => [
                    'label' => 'Tahun Masuk',
                    'rules' => 'required|numeric'
                ],
            ]);
            if (!$val) {
                session()->setFlashdata('error', \Config\Services::validation()->listErrors());
                $data = [
                    'title'    => 'Master Data',
                    'subtitle' => 'Mahasiswa',
                    'mahasiswa' => $this->modelMahasiswa->allData(),
                ];
                return view('admin/mahasiswa', $data);
            } else {
                $data = [
                    'nim' => $this->request->getPost('nim'),
                    'nama_mahasiswa' => $this->request->getPost('nama_mahasiswa'),
                    'gender' => $this->request->getPost('gender'),
                    'tahun_masuk' => $this->request->getPost('tahun_masuk'),
                ];
                $this->modelMahasiswa->add($data);
                session()->setFlashdata('pesan', 'Data Berhasil Di Tambahkan !!');
                return redirect()->to(base_url('mahasiswa'));
            }
        } else {
            return redirect()->to(base_url('mahasiswa'));
        }
    }

    public function edit($id_mahasiswa)
    {
        if (isset($_POST['edit'])) {
            $val = $this->validate([
                'nim' => [
                    'label' => 'NIM',
                    'rules' => 'required|numeric|max_length[10]'

                ],
                'nama_mahasiswa' => [
                    'label' => 'Nama Mahasiswa',
                    'rules' => 'required|alpha_space'
                ],
                'gender' => [
                    'label' => 'Gender',
                    'rules' => 'required'

                ],
                'tahun_masuk' => [
                    'label' => 'Tahun Masuk',
                    'rules' => 'required|numeric'
                ],
            ]);
            if (!$val) {
                session()->setFlashdata('error', \Config\Services::validation()->listErrors());
                $data = [
                    'title'    => 'Master Data',
                    'subtitle' => 'Mahasiswa',
                    'mahasiswa' => $this->modelMahasiswa->allData(),
                ];
                return view('admin/mahasiswa', $data);
            } else {
                $data = [
                    'id_mahasiswa' => $id_mahasiswa,
                    'nim' => $this->request->getPost('nim'),
                    'nama_mahasiswa' => $this->request->getPost('nama_mahasiswa'),
                    'gender' => $this->request->getPost('gender'),
                    'tahun_masuk' => $this->request->getPost('tahun_masuk'),
                ];
                $this->modelMahasiswa->edit($data);
                session()->setFlashdata('pesan', 'Data Berhasil Di Update !!');
                return redirect()->to(base_url('mahasiswa'));
            }
        } else {
            return redirect()->to(base_url('mahasiswa'));
        }
    }
    public function delete($id_mahasiswa)
    {

        $data = [
            'id_mahasiswa' => $id_mahasiswa,
        ];
        $this->modelMahasiswa->delete_data($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Hapus !!');
        return redirect()->to(base_url('mahasiswa'));
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
            $mahasiswa = $spreadsheet->getActiveSheet()->toArray();
            foreach ($mahasiswa as $key => $value) {
                if ($key == 0) {
                    continue;
                }
                $data = [
                    'nim' => $value[1],
                    'nama_mahasiswa' => $value[2],
                    'gender' => $value[3],
                    'tahun_masuk' => $value[4],
                ];
                $this->modelMahasiswa->add_excel($data);
            }
            return redirect()->to(base_url('mahasiswa'));
        } else {
            return redirect()->to(base_url('mahasiswa'));
        }
    }
}
