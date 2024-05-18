<?php

namespace App\Controllers;

use App\Models\AkunModel;

class Login extends BaseController
{
    protected $akunModel;
    public function __construct()
    {
        $this->akunModel = new AkunModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Login | Perpusku'

        ];
        return view('login/index', $data);
    }

    public function validasi()
    {
        $masuk = $this->request->getVar(); //untuk mengambil request dari form post/get
        $username = $masuk['username'];
        $password = $masuk['password'];
        $cek = $this->akunModel->cekLogin($username, $password);
        if ($cek) {
            return redirect()->to('/buku');
        } else {
            return redirect()->to('/login');
        }
    }
}
