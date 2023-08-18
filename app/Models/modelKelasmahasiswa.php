<?php

namespace App\Models;

use CodeIgniter\Model;

class modelKelasmahasiswa extends Model
{
    public function allData()
    {
        return $this->db->table('tbl_kelasmahasiswa')
            ->join('tbl_mahasiswa', 'tbl_mahasiswa.id_mahasiswa = tbl_kelasmahasiswa.id_mahasiswa', 'left')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_kelasmahasiswa.id_kelas', 'left')
            ->join('tbl_tahunsemester', 'tbl_tahunsemester.id_ts = tbl_kelasmahasiswa.id_ts', 'left')
            ->orderBy('tbl_mahasiswa.id_mahasiswa', 'ASC')
            ->get()->getResultArray();
    }

    public function kelas($id_kelas)
    {
        return $this->db->table('tbl_kelas')
            ->where('id_kelas', $id_kelas)
            ->orderBy('id_kelas', 'DESC')
            ->get()->getRowArray();
    }

    public function add($data)
    {
        $this->db->table('tbl_kelasmahasiswa')->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('tbl_kelasmahasiswa')
            ->where('id_km', $data['id_km'])
            ->update($data);
    }

    public function delete_data($data)
    {
        $this->db->table('tbl_km')
            ->where('id_km', $data['id_km'])
            ->delete($data);
    }

    public function detail_Data($id_kelas)
    {
        return $this->db->table('tbl_kelas')
            ->where('id_kelas', $id_kelas)
            ->get()->getRowArray();
    }
}
