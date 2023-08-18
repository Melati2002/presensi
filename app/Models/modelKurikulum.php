<?php

namespace App\Models;

use CodeIgniter\Model;

class modelKurikulum extends Model
{
    public function allData()
    {
        return $this->db->table('tbl_kurikulum')
            ->orderBy('id_kurikulum', 'DESC')
            ->get()->getResultArray();
    }

    public function add($data)
    {
        $this->db->table('tbl_kurikulum')->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('tbl_kurikulum')
            ->where('id_kurikulum', $data['id_kurikulum'])
            ->update($data);
    }

    public function delete_data($data)
    {
        $this->db->table('tbl_kurikulum')
            ->where('id_kurikulum', $data['id_kurikulum'])
            ->delete($data);
    }
    public function detail_Data($id_kurikulum)
    {
        return $this->db->table('tbl_kurikulum')
            ->where('id_kurikulum', $id_kurikulum)
            ->get()->getResultArray();
    }
}
