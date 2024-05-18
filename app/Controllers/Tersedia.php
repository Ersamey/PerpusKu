<?php

namespace App\Controllers;

use App\Models\KetersediaanModel;

class Tersedia extends BaseController
{
    protected $ketersediaanModel;
    public function __construct()
    {
        $this->ketersediaanModel = new KetersediaanModel();
    }

    public function index($slug)
    {
        $data = [
            'tersedia' => $this->ketersediaanModel->getAll($slug)
        ];

        // return view('buku/index', $data);
        return dd($data);
    }
}
