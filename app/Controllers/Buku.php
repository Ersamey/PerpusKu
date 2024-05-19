<?php

namespace App\Controllers;

use App\Models\BukuModel;
use App\Models\KetersediaanModel;
use App\Models\ReviewModel;

class Buku extends BaseController
{
    protected $bukuModel;
    protected $ketersediaanModel;
    protected $reviewModel;

    public function __construct()
    {
        $this->bukuModel = new BukuModel();
        $this->ketersediaanModel = new KetersediaanModel();
        $this->reviewModel = new ReviewModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Buku | Perpusku',
            'buku' => $this->bukuModel->getBuku()
        ];


        return view('buku/index', $data);
    }

    public function detail($slug)
    {
        $data = [
            'title' => 'Detail Buku',
            'buku' => $this->bukuModel->getBuku($slug),
            'tersedia' => $this->ketersediaanModel->getAll($slug),
            'komentar' => $this->reviewModel->getAll($slug)
        ];

        // // jika buku tidak ada di tabel
        // if (empty($data['buku'])) {
        //     throw new \CodeIgniter\Exceptions\PageNotFoundException('Buku ' . $slug . ' tidak ditemukan.');
        // } //throw new untuk menampilkan pesan error

        return view('buku/detail', $data);
    }
}
