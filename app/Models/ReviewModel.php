<?php

namespace App\Models;

use CodeIgniter\Model;

class ReviewModel extends Model
{
    protected $table = 'review';

    public function getAll($slug)
    {
        $id = $this->db->table('buku')->select('id_buku')->where('slug', $slug)->get()->getRowArray();
        $builder = $this->table('review');
        $builder->join('users', 'users.id = review.user_id');
        $join = $builder->get()->getResultArray();
        $komentar = [];
        foreach ($join as $j) {
            if ($j['buku_id'] == $id['id_buku']) {
                $komentar[] = $j;
            }
        }
        return $komentar;
    }

    public function tambahReview($id)
    {
    }
}
