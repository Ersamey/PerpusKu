<?php

namespace App\Controllers;

use App\Models\PerpustakaanModel;

class ProfilPerpustakaan extends BaseController
{
    protected $PerpustakaanModel;

    public function __construct()
    {
        $this->PerpustakaanModel = new PerpustakaanModel();
    }
    public function index()
    {

        $data = [
            'title' => 'Profil Perpustakaan| Perpusku',
            'perpustakaan' => $this->PerpustakaanModel->InfoPerpustakaan(user_id())
        ];
        return view('infoperpus/index', $data);
    }
}
