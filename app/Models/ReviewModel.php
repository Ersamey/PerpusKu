<?php

namespace App\Models;

use CodeIgniter\Model;

class ReviewModel extends Model
{
    protected $table = 'review';
    // set $primaryKey = 'id_review';
    protected $primaryKey = 'id_review';
    protected $allowedFields = ['user_id', 'buku_id', 'review'];

    public function getAll($slug)
    {
        $id = $this->db->table('buku')->select('id_buku')->where('slug', $slug)->get()->getRowArray();
        $builder = $this->table('review');
        $builder->join('users', 'users.id = review.user_id');
        //urutkan dari yang terbaru
        $builder->orderBy('review.id_review', 'DESC');
        $join = $builder->get()->getResultArray();
        $komentar = [];
        foreach ($join as $j) {
            if ($j['buku_id'] == $id['id_buku']) {
                $komentar[] = $j;
            }
        }
        return $komentar;
    }

    public function tambahReview($idUser, $idBuku, $review)
    {
        dd($this->request->getVar());
    }

    public function getReview($id_user)
    {

        $builder = $this->table('review');
        $builder->join('buku', 'buku.id_buku = review.buku_id');
        $builder->where('user_id', $id_user);
        $join = $builder->get()->getResultArray();
        return $join;
    }

    public function getReviewById($id_review)
    {
        return $this->db->table('review')->where('id_review', $id_review)->get()->getRowArray();
    }
}
