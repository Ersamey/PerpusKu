<?php

namespace App\Models;

use AllowDynamicProperties;
use CodeIgniter\Model;

class KetersediaanModel extends Model
{
    protected $table = 'ketersediaan';
    protected $allowedFields = ['buku_id', 'perpus_id', 'status'];

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

    public function ListBukuPerpustakaan($perpus_id, $keyword)
    {
        $listbuku = $this->db->table($this->table);
        $listbuku->select('perpustakaan.nama, perpustakaan.id_perpus, buku.id_buku,buku.judul, buku.pengarang, ketersediaan.status');
        $listbuku->join('perpustakaan', 'ketersediaan.perpus_id = perpustakaan.id_perpus');
        $listbuku->join('buku', 'ketersediaan.buku_id = buku.id_buku');
        $listbuku->where('perpustakaan.user_id', $perpus_id);
        $listbuku->where('ketersediaan.status', 'Tersedia');
        if ($keyword) {
            $listbuku->groupStart()
                ->like('buku.judul', $keyword)
                ->orLike('buku.pengarang', $keyword)
                ->groupEnd();
        }
        $query = $listbuku->get();
        return $query->getResultArray();
    }

    public function getPerpus($id)
    {
        return $this->db->table('perpustakaan')->where('user_id', $id)->get()->getRowArray();
    }

    public function getallperpus()
    {
        $perpus = $this->db->table('perpustakaan');
        return $perpus->get()->getResultArray();
    }

    public function editStatus($buku, $perpus, $status)
    {
        $this->db->table($this->table)->where('buku_id', $buku)->where('perpus_id', $perpus)->update(['status' => $status]);
    }

    public function getBuku($id_perpus)
    {
        $builder = $this->table('ketersediaan');
        $builder->join('buku', 'buku.id_buku = ketersediaan.buku_id');
        $builder->where('perpus_id', $id_perpus);
        // Select where('status', 'Tersedia');
        $builder->where('status', 'Tersedia');
        return $builder->get()->getResultArray();
    }
}
