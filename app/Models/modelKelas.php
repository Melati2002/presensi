<?php

namespace App\Models;

use CodeIgniter\Model;

class modelKelas extends Model
{
    protected $table = 'tbl_kelas';
    protected $primaryKey = 'id_kelas';
    protected $allowedFields = ['id_kelas', 'kelas'];
    public function allData()
    {
        return $this->db->table('tbl_kelas')
            ->orderBy('id_kelas', 'DESC')
            ->get()->getResultArray();
    }

    public function add($data)
    {
        $this->db->table('tbl_kelas')->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('tbl_kelas')
            ->where('id_kelas', $data['id_kelas'])
            ->update($data);
    }

    public function delete_data($data)
    {
        $this->db->table('tbl_kelas')
            ->where('id_kelas', $data['id_kelas'])
            ->delete($data);
    }
    public function detail_Data($id_kelas)
    {
        return $this->db->table('tbl_kelas')
            ->where('id_kelas', $id_kelas)
            ->get()->getResultArray();
    }
}
