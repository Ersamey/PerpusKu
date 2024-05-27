<?php
//sebenernya ini ga di pakai, cuma buat cek tampilan aja
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

    public function add()
    {
        $perpus = $this->ketersediaanModel->getPerpus(user_id());
        $this->ketersediaanModel->save([
            'buku_id' => $this->request->getVar('buku_id'),
            'perpus_id' => $perpus['id_perpus'],
            'status' => 'Tersedia'
        ]);
        //session
        session()->setFlashdata('pesan', 'Buku berhasil ditambahkan.');
        return redirect()->to('/perpustakaan/buku');
    }

    public function editStatus()
    {
        $buku = $this->request->getVar('buku_id');
        $perpus = $this->request->getVar('perpus_id');
        $status = $this->request->getVar('status');
        $this->ketersediaanModel->editStatus($buku, $perpus, $status);
        session()->setFlashdata('pesan', 'Status berhasil diubah.');
        return redirect()->to('/perpustakaan/buku');
    }
}
