<?php

namespace App\Models;

use CodeIgniter\Model;

class PerpustakaanModel extends Model
{
    protected $table = 'perpustakaan';

    public function perpusinfo($id)
    {
        $perpus = $this->db->table($this->table);
        $perpus->select(['nama', 'alamat']);
        $perpus->where('user_id', $id);
        return $perpus->get()->getResultArray();
    }
}
