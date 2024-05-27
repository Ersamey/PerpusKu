<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PerpustakaanModel;
use App\Models\KetersediaanModel;

class Home extends BaseController
{
    protected $perpustakaan;
    protected $ketersediaan;

    public function __construct()
    {
        $this->perpustakaan = new PerpustakaanModel();
        $this->ketersediaan = new KetersediaanModel();
    }

    public function index()
    {
        return view('welcome_message');
    }

    public function user()
    {
        return view('/pages/user');
    }

    public function editNama()
    {
        $user = user_id();
        $nama = $this->request->getVar('nama');
        $id_perpus = $this->request->getVar('id_perpus');
        $this->perpustakaan->save([
            'id_perpus' => $id_perpus,
            'nama' => $nama
        ]);
        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to('/user/' . $user);
    }

    public function addProfile()
    {
        $user = user_id();
        $nama = $this->request->getVar('nama');
        $alamat = $this->request->getVar('alamat');
        $this->perpustakaan->save([
            'nama' => $nama,
            'alamat' => $alamat,
            'user_id' => $user
        ]);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to('/user/' . $user);
    }

    public function editAlamat()
    {
        $user = user_id();
        $alamat = $this->request->getVar('alamat'); //alamat baru   
        $id_perpus = $this->request->getVar('id_perpus');
        $this->perpustakaan->save([
            'id_perpus' => $id_perpus,
            'alamat' => $alamat
        ]);
        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to('/user/' . $user);
    }

    public function perpus()
    {
        $id = $this->request->getVar('id_perpus');
        $perpustakaan = $this->perpustakaan->where('id_perpus', $id)->first();
        $data = [
            'title' => 'Perpustakaan',
            'perpustakaan' => $perpustakaan,
            'ketersediaan' => $this->ketersediaan->getBuku($id)
        ];
        return view('/pages/user/perpus', $data);
    }
}
