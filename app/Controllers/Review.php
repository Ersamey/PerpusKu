<?php

namespace App\Controllers;

use App\Models\ReviewModel;
use App\Models\PerpustakaanModel;
use App\Controllers\Buku;

class Review extends BaseController
{
    protected $reviewModel;
    protected $perpustakaanModel;
    protected $buku;
    public function __construct()
    {
        $this->reviewModel = new ReviewModel();
        $this->perpustakaanModel = new PerpustakaanModel();
        $this->buku = new Buku();
    }

    public function index()
    {
        $buku = $this->reviewModel->db->table('buku')->select('slug')->where('id_buku', $this->request->getVar('buku_id'))->get()->getRowArray();
        if (!$this->validate([
            'review' => [
                'rules' => 'required'
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/buku/' . $buku["slug"])->with('validation', $validation);
        }
        $this->reviewModel->save([
            'user_id' => $this->request->getVar('user_id'),
            'buku_id' => $this->request->getVar('buku_id'),
            'review' => $this->request->getVar('review')
        ]);

        session()->setFlashdata('pesan', 'Review berhasil ditambahkan!');
        // getallKomen($slug);
        $data[] = $this->buku->getallKomen($buku["slug"]);
        return view('/buku/review', $data);
    }

    public function myReview($id_user)
    {
        $result = $this->reviewModel->getReview($id_user);
        $data = [
            'title' => 'MyProfile',
            'review' => $result,
            'perpustakaan' => $this->perpustakaanModel->perpusinfo(user_id())
        ];

        return view('/pages/user/index', $data);
    }

    public function delete($id_review)
    {
        $ripiu = $this->reviewModel->getReviewById($id_review);
        $buku = $this->reviewModel->db->table('buku')->select('slug')->where('id_buku', $ripiu['buku_id'])->get()->getRowArray();
        $this->reviewModel->delete($id_review);
        session()->setFlashdata('pesan', 'Review berhasil dihapus!');
        $data[] = $this->buku->getallKomen($buku["slug"]);
        return view('/buku/review', $data);
    }

    public function edit()
    {
        $review = $this->reviewModel->getReviewById($this->request->getVar('id_review'));
        $buku = $this->reviewModel->db->table('buku')->select('slug')->where('id_buku', $review['buku_id'])->get()->getRowArray();
        if (!$this->validate([
            'review' => [
                'rules' => 'required'
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/buku/' . $buku["slug"])->with('validation', $validation);
        }

        $this->reviewModel->save([
            'id_review' => $this->request->getVar('id_review'),
            'review' => $this->request->getVar('review')
        ]);
        session()->setFlashdata('pesan', 'Review berhasil diubah!');
        $data[] = $this->buku->getallKomen($buku["slug"]);
        return view('/buku/review', $data);
    }
}
