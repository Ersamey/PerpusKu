<?php
//sebenernya ini ga di pakai, cuma buat cek tampilan aja
namespace App\Controllers;

use App\Models\KetersediaanModel;
use App\Models\BukuModel;

class Tersedia extends BaseController
{
    protected $ketersediaanModel;
    protected $bukuModel;
    public function __construct()
    {
        $this->ketersediaanModel = new KetersediaanModel();
        $this->bukuModel = new BukuModel();
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

    public function tempat()
    {
        $slug = $this->bukuModel->getSlug($this->request->getVar('id_buku'));
        $this->ketersediaanModel->save([
            'buku_id' => $this->request->getVar('id_buku'),
            'perpus_id' => $this->request->getVar('id_perpus'),
            'status' => 'Tersedia'
        ]);
        session()->setFlashdata('pesan', 'Tempat berhasil ditambahkan.');
        return redirect()->to('buku/' . $slug['slug']);
    }
}
