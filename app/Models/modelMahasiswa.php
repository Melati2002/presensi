<?php

namespace App\Models;

use CodeIgniter\Model;

class modelMahasiswa extends Model
{
    public function allData()
    {
        return $this->db->table('tbl_mahasiswa')
            ->orderBy('id_mahasiswa', 'DESC')
            ->get()->getResultArray();
    }

    public function detailData($id_mahasiswa)
    {
        return $this->db->table('tbl_mahasiswa')
            ->where('id_mahasiswa', $id_mahasiswa)
            ->get()->getRowArray();
    }

    public function add($data)
    {
        $this->db->table('tbl_mahasiswa')->insert($data);
    }
    public function edit($data)
    {
        $this->db->table('tbl_mahasiswa')
            ->where('id_mahasiswa', $data['id_mahasiswa'])
            ->update($data);
    }

    public function delete_data($data)
    {
        $this->db->table('tbl_mahasiswa')
            ->where('id_mahasiswa', $data['id_mahasiswa'])
            ->delete($data);
    }

    public function cek_data($nim)
    {
        return $this->db->table('tbl_mahasiswa')
            ->where('nim', $nim)
            ->get()->getRowArray();
    }
    public function add_excel($data)
    {
        $this->db->table('tbl_mahasiswa')->insert($data);
    }

    public function getidmhs($nim)
    {
        return $this->db->table('tbl_mahasiswa')
            ->where('nim', $nim)
            ->get()->getRowArray();
    }
}
