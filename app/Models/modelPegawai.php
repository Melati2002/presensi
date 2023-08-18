<?php

namespace App\Models;

use CodeIgniter\Model;

class modelPegawai extends Model
{
    public function allData()
    {
        return $this->db->table('tbl_pegawai')
            ->join('tbl_akun', 'tbl_akun.id_akun = tbl_pegawai.id_akun', 'left')
            ->orderBy('tbl_akun.id_akun', 'ASC')
            ->get()->getResultArray();
    }

    public function detailData($id_pegawai)
    {
        return $this->db->table('tbl_pegawai')
            ->join('tbl_akun', 'tbl_akun.id_akun = tbl_pegawai.id_akun', 'left')
            ->where('id_pegawai', $id_pegawai)
            ->get()->getRowArray();
    }
    public function add($dataPegawai)
    {
        $this->db->table('tbl_pegawai')->insert($dataPegawai);
    }
    public function save_batch($data)
    {
        $this->db->table('tbl_pegawai')->insertBatch($data);
    }
    public function edit($data)
    {
        $this->db->table('tbl_pegawai')
            ->where('id_pegawai', $data['id_pegawai'])
            ->update($data);
    }

    public function delete_data($data)
    {
        $this->db->table('tbl_pegawai')
            ->where('id_pegawai', $data['id_pegawai'])
            ->delete($data);
    }
}
