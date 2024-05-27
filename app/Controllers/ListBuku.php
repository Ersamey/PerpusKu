<?php

namespace App\Controllers;

use App\Models\KetersediaanModel;

class ListBuku extends BaseController
{
    protected $ketersediaanModel;

    public function __construct()
    {
        $this->ketersediaanModel = new KetersediaanModel();
    }
    public function index()
    {

        $data = [
            'title' => 'Daftar Buku | Perpusku',
            'list' => $this->ketersediaanModel->ListBukuPerpustakaan(1)
        ];
        return view('listbuku/index', $data);
    }
}
