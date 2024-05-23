<?php

namespace App\Controllers;

use App\Models\ReviewModel;

class Review extends BaseController
{
    protected $reviewModel;
    public function __construct()
    {
        $this->reviewModel = new ReviewModel();
    }

    public function index()
    {
        //validasi
        $buku = $this->reviewModel->db->table('buku')->select('slug')->where('id_buku', $this->request->getVar('buku_id'))->get()->getRowArray();
        if (!$this->validate([
            'review' => [
                'rules' => 'required' //,
                // 'errors' => [
                //     'required' => 'Review harus diisi.'
                // ]
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
        //ambil tabel buku ketika id_buku == buku_id
        // return redirect()->to('/buku/' . $buku["slug"]);
        return redirect()->to('/buku/' . $buku["slug"]);
    }
}
