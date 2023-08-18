<?php

namespace App\Models;

use CodeIgniter\Model;

class modelTA extends Model
{
    public function allData()
    {
        return $this->db->table('tbl_tahunsemester')
            ->orderBy('id_ts', 'DESC')
            ->get()->getResultArray();
    }

    public function add($data)
    {
        $this->db->table('tbl_tahunsemester')->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('tbl_tahunsemester')
            ->where('id_ts', $data['id_ts'])
            ->update($data);
    }

    public function delete_data($data)
    {
        $this->db->table('tbl_tahunsemester')
            ->where('id_ts', $data['id_ts'])
            ->delete($data);
    }

    public function reset_status_ta()
    {
        $this->db->table('tbl_tahunsemester')->update(['status' => 0]);
    }

    public function ta_aktif()
    {
        return $this->db->table('tbl_tahunsemester')
            ->where('status', 1)
            ->get()
            ->getRowArray();
    }
}
