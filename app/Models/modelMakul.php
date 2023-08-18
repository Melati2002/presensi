<?php

namespace App\Models;

use CodeIgniter\Model;

class modelMakul extends Model
{
    public function allData()
    {
        return $this->db->table('tbl_matakuliah')
            ->join('tbl_kurikulum', 'tbl_kurikulum.id_kurikulum = tbl_matakuliah.id_kurikulum', 'left')
            ->orderBy('id_mk', 'DESC')
            ->get()->getResultArray();
    }

    public function detailData($id_mk)
    {
        return $this->db->table('tbl_matakuliah')
            ->where('id_mk', $id_mk)
            ->get()->getRowArray();
    }

    public function add($data)
    {
        $this->db->table('tbl_matakuliah')->insert($data);
    }
    public function edit($data)
    {
        $this->db->table('tbl_matakuliah')
            ->where('id_mk', $data['id_mk'])
            ->update($data);
    }

    public function delete_data($data)
    {
        $this->db->table('tbl_matakuliah')
            ->where('id_mk', $data['id_mk'])
            ->delete($data);
    }
}
