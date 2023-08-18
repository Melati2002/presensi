<?php

namespace App\Models;

use CodeIgniter\Model;

class modelJadwal extends Model
{
    public function allData($id_kelas)
    {
        return $this->db->table('tbl_jadwal')
            ->join('tbl_pengampumk', 'tbl_pengampumk.id_pengampumk = tbl_jadwal.id_pengampumk', 'full')
            ->join('tbl_ruangan', 'tbl_ruangan.id_ruangan = tbl_jadwal.id_ruangan', 'left')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_jadwal.id_kelas', 'left')
            ->where('tbl_jadwal.id_kelas', $id_kelas)
            ->orderBy('tbl_kelas.kelas', 'ASC')
            ->get()->getResultArray();
    }

    public function add($data)
    {
        $this->db->table('tbl_jadwal')->insert($data);
    }

    public function delete_data($data)
    {
        $this->db->table('tbl_jadwal')
            ->where('id_jadwal', $data['id_jadwal'])
            ->delete($data);
    }
}
