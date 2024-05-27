<?php

namespace App\Models;

use CodeIgniter\Model;

class PerpustakaanModel extends Model
{
    protected $table = 'perpustakaan';
    protected $primaryKey = 'id_perpus';
    protected $allowedFields = ['nama', 'alamat', 'user_id'];

    public function perpusinfo($id)
    {
        $perpus = $this->db->table($this->table)->where('user_id', user_id());
        return $perpus->get()->getRowArray();
    }
}
