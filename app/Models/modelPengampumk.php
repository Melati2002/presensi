<?php

namespace App\Models;

use CodeIgniter\Model;

class modelPengampumk extends Model
{
    public function allData()
    {
        return $this->db->table('tbl_pengampumk')
            ->join('tbl_matakuliah', 'tbl_matakuliah.id_mk = tbl_pengampumk.id_mk', 'full')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_pengampumk.id_kelas', 'full')
            ->join('tbl_pegawai', 'tbl_pegawai.id_pegawai = tbl_pengampumk.id_pegawai', 'full')
            ->join('tbl_tahunsemester', 'tbl_tahunsemester.id_ts = tbl_pengampumk.id_ts', 'full')
            ->orderBy('tbl_pengampumk.id_pengampumk', 'ASC')
            ->get()->getResultArray();
    }

    public function detailData($id_pengampumk)
    {
        return $this->db->table('tbl_pengampumk')
            ->join('tbl_matakuliah', 'tbl_matakuliah.id_mk = tbl_pengampumk.id_mk', 'left')
            ->join('tbl_kelas', 'tbl_kelas.id_mk = tbl_pengampumk.id_kelas', 'left')
            ->join('tbl_pegawai', 'tbl_pegawai.id_mk = tbl_pengampumk.id_pegawai', 'left')
            ->where('id_pengampumk', $id_pengampumk)
            ->get()->getRowArray();
    }

    public function save_batch($data)
    {
        $this->db->table('tbl_pengampumk')->insertBatch($data);
    }

    public function inser($data)
    {
        $this->db->table('tbl_pengampumk')->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('tbl_pengampumk')
            ->where('id_pengampumk', $data['id_pengampumk'])
            ->update($data);
    }

    public function delete_data($data)
    {
        $this->db->table('tbl_pengampumk')
            ->where('id_pengampumk', $data['id_pengampumk'])
            ->delete($data);
    }
}
