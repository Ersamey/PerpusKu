<?php

namespace App\Models;

use CodeIgniter\Model;

class PerpustakaanModel extends Model
{
    protected $table = 'perpustakaan';


    public function InfoPerpustakaan($perpus_id)
    {
        $perpus = $this->db->table($this->table);
        $perpus->select(['nama', 'alamat']);
        $perpus->where('user_id', $perpus_id);

        $query = $perpus->get();
        return $query->getResultArray();
    }
}
