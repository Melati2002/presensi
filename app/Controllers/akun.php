<?php

namespace App\Controllers;

use App\Models\modelAkun;

class Akun extends BaseController
{

    public function __construct()
    {
        helper('form');
        $this->modelAkun = new modelAkun();
    }

    public function index()
    {
        $data = [
            'title'    => 'Master Data',
            'subtitle' => 'Pengguna',
            'akun' => $this->modelAkun->allData(),
        ];
        return view('admin/akun/akun', $data);
    }
    public function add()
    {
        $data = [
            'title' => 'Master Data',
            'subtitle' => 'Pengguna',
        ];
        return view('admin/akun/add', $data);
    }
    public function save()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $role = $_POST['role'];
        $data = array();

        $index = 0; // Set index array awal dengan 0
        foreach ($username as $datauser) {
            array_push($data, array(
                'username' => $datauser,
                'password' => $password[$index],
                'role' => $role[$index]
            ));

            $index++;
        }
        $sql =  $this->modelAkun->save_batch($data);

        // Cek apakah query insert nya sukses atau gagal
        if ($sql) { // Jika sukses
            echo "<script>alert('Data gagal disimpan');window.location = '" . base_url('akun/add') . "';</script>";
        } else { // Jika gagal
            echo "<script>alert('Data berhasil disimpan');window.location = '" . base_url('akun') . "';</script>";
        }
    }

    public function insert()
    {

        $data = [
            'username' => $this->request->getPost('usename'),
            'password' => $this->request->getPost('password'),
            'role' => $this->request->getPost('role')
        ];
        $this->modelMahasiswa->add($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Tambahkan !!');
        return redirect()->to(base_url('akun'));
    }

    public function edit($id_akun)
    {
        if (isset($_POST['edit'])) {
            $val = $this->validate([
                'username' => [
                    'label' => 'Username',
                    'rules' => 'required'

                ],
                'password' => [
                    'label' => 'Password',
                    'rules' => 'required'
                ],
                'role' => [
                    'label' => 'Role',
                    'rules' => 'required'

                ]
            ]);
            if (!$val) {
                session()->setFlashdata('error', \Config\Services::validation()->listErrors());
                $data = [
                    'title'    => 'Master Data',
                    'subtitle' => 'Pengguna',
                    'akun' => $this->modelAkun->allData(),
                ];
                return view('admin/akun/akun', $data);
            } else {
                $data = [
                    'id_akun' => $id_akun,
                    'username' => $this->request->getPost('username'),
                    'password' => $this->request->getPost('password'),
                    'role' => $this->request->getPost('role')
                ];
                $this->modelAkun->edit($data);
                session()->setFlashdata('pesan', 'Data Berhasil Di Update !!');
                return redirect()->to(base_url('akun'));
            }
        } else {
            return redirect()->to(base_url('akun'));
        }
    }
    public function delete($id_akun)
    {

        $data = [
            'id_akun' => $id_akun,
        ];
        $this->modelAkun->delete_data($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Hapus !!');
        return redirect()->to(base_url('akun'));
    }
}
