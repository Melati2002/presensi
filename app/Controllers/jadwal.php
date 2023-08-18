<?php

namespace App\Controllers;

use App\Models\modelJadwal;
use App\Models\modelRuangan;
use App\Models\modelKelas;
use App\Models\modelPengampumk;

class Jadwal extends BaseController
{

    public function __construct()
    {
        helper('form');
        $this->modelJadwal = new modelJadwal();
        $this->modelRuangan = new modelRuangan();
        $this->modelPengampumk = new modelPengampumk();
        $this->modelKelas = new modelKelas();
    }

    public function index()
    {

        $data = [
            'title' => 'Jadwal Kuliah',
            'subtitle' => 'Jadwal Kuliah',
            'kelas' => $this->modelKelas->allData(),
        ];
        return view('admin/jadwal/index', $data);
    }

    public function detailjadwal($id_kelas)
    {
        $data = [
            'title' => 'Akademik',
            'subtitle' => 'Jadwal Kuliah',
            'kelas' => $this->modelKelas->detail_Data($id_kelas),
            'jadwal' => $this->modelJadwal->allData($id_kelas),
            'pengampu' => $this->modelPengampumk->allData(),
            'ruangan' => $this->modelRuangan->allData(),
            'id_kelas' => $id_kelas,
        ];
        return view('admin/jadwal/jadwal', $data);
    }

    public function add($id_kelas)
    {

        $data = [
            'id_kelas' => $id_kelas,
            'id_pengampumk' => $this->request->getPost('id_pengampumk'),
            'id_ruangan' => $this->request->getPost('id_ruangan'),
        ];
        $this->modelJadwal->add($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Tambahkan !!');
        return redirect()->to(base_url('jadwal/detailjadwal/' . $id_kelas));
    }

    public function delete($id_jadwal, $id_kelas)
    {
        $data = [
            'id_jadwal' => $id_jadwal,
        ];
        $this->modelJadwal->delete_data($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Hapus !!');
        return redirect()->to(base_url('jadwal/detailjadwal/' . $id_kelas));
    }
    //--------------------------------------------------------------------

}
