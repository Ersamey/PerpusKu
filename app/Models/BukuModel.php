<?php

namespace App\Models;

use CodeIgniter\Model;

class BukuModel extends Model
{
    protected $table = 'buku';
    protected $primaryKey = 'id_buku';
    protected $useTimestamps = true;
    protected $allowedFields = ['judul', 'pengarang', 'tahun', 'slug', 'pict'];

    public function getBuku($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }

    public function getSlug($id)
    {
        return $this->where(['id_buku' => $id])->first();
    }
}
