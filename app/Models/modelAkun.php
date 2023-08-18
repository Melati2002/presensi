<?php

namespace App\Models;

use CodeIgniter\Model;

class modelAkun extends Model
{
    protected $table = 'tbl_akun';
    protected $primaryKey = 'id_akun';
    protected $allowedFields = ['id_akun', 'username', 'password', 'role'];

    public function allData()
    {
        return $this->db->table('tbl_akun')
            ->orderBy('id_akun', 'DESC')
            ->get()->getResultArray();
    }

    public function detailData($id_akun)
    {
        return $this->db->table('tbl_akun')
            ->where('id_akun', $id_akun)
            ->get()->getRowArray();
    }

    public function add($data)
    {
        // $this->db->table('tbl_akun')->insert($data);
        $this->insert($data);
        return $this->insertID();
    }

    public function save_batch($data)
    {
        $this->db->table('tbl_akun')->insertBatch($data);
    }
    public function edit($data)
    {
        $this->db->table('tbl_akun')
            ->where('id_akun', $data['id_akun'])
            ->update($data);
    }

    public function delete_data($data)
    {
        $this->db->table('tbl_akun')
            ->where('id_akun', $data['id_akun'])
            ->delete($data);
    }
}
