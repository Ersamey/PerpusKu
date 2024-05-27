<?php

namespace App\Models;

use CodeIgniter\Model;

class KetersediaanModel extends Model
{
    protected $table = 'ketersediaan';

    public function getAll($slug)
    {
        // $id = SELECT * FROM buku WHERE slug = $slug;
        $id = $this->db->table('buku')->select('id_buku')->where('slug', $slug)->get()->getRowArray();
        $builder = $this->table('ketersediaan');
        $builder->join('perpustakaan', 'perpustakaan.id_perpus = ketersediaan.perpus_id');
        $join = $builder->get()->getResultArray();
        $tempat = [];
        foreach ($join as $j) {
            if ($j['buku_id'] == $id['id_buku'] && $j['status'] == 'Tersedia') {
                $tempat[] = $j;
            }
        }

        return $tempat;
    }

    public function ListBukuPerpustakaan($perpus_id)
    {
        $listbuku = $this->db->table($this->table);
        $listbuku->select('perpustakaan.nama, buku.judul, buku.pengarang, ketersediaan.status');
        $listbuku->join('perpustakaan', 'ketersediaan.perpus_id = perpustakaan.id_perpus');
        $listbuku->join('buku', 'ketersediaan.buku_id = buku.id_buku');
        $listbuku->where('perpustakaan.user_id', $perpus_id);

        $query = $listbuku->get();
        return $query->getResultArray();
    }
}
