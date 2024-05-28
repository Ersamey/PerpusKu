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
            'komentar' => $this->reviewModel->getAll($slug),
            'validation' => \Config\Services::validation(),
            'perpus' => $this->ketersediaanModel->getallperpus()
        ];
        return view('buku/detail', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Form Tambah Data Buku',
        ];

        return view('buku/add', $data);
    }

    public function save()
    {
        $judulArray = $this->request->getVar('judul');
        $pengarangArray = $this->request->getVar('pengarang');
        $tahunArray = $this->request->getVar('tahun');
        $sampulArray = $this->request->getFiles('file');
        $validation = \Config\Services::validation();
        foreach ($judulArray as $index => $judul) {
            if (!$this->validate([
                "judul.{$index}" => [
                    'rules' => 'required|is_unique[buku.judul]',
                    'errors' => [
                        'required' => '{field} buku harus diisi.',
                        'is_unique' => '{field} buku sudah terdaftar.'
                    ]
                ],
                "pengarang.{$index}" => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} buku harus diisi.'
                    ]
                ],
                "tahun.{$index}" => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} buku harus diisi.'
                    ]
                ],
                "file.{$index}" => [
                    'rules' => 'max_size[file,1024]|is_image[file]|mime_in[file,image/jpg,image/jpeg,image/png]',
                    'errors' => [
                        'max_size' => 'Ukuran gambar terlalu besar (max 1MB).',
                        'is_image' => 'Yang anda pilih bukan gambar.',
                        'mime_in' => 'Yang anda pilih bukan gambar.'
                    ]
                ]
            ])) {
                $data['validation'] = \Config\Services::validation();
                return redirect()->to('/buku/add')->withInput()->with('validation', $validation);
            }
        }

        // Simpan setiap set data
        foreach ($judulArray as $index => $judul) {
            // Ambil file sampul
            if (isset($sampulArray['file'][$index])) {
                $fileSampul = $sampulArray['file'][$index];
                // Apakah tidak ada gambar yang diupload
                if ($fileSampul->getError() == 4) {
                    $namaSampul = 'default.jpg';
                } else {
                    // Generate nama sampul dari file yang di upload
                    $namaSampul = $fileSampul->getRandomName();
                    // Pindahkan file ke folder img
                    $fileSampul->move('img', $namaSampul);
                }
            } else {
                $namaSampul = 'default.jpg';
            }

            $slug = url_title($judul, '-', true);
            $this->bukuModel->save([
                'judul' => $judul,
                'slug' => $slug,
                'pengarang' => $pengarangArray[$index],
                'tahun' => $tahunArray[$index],
                'pict' => $namaSampul
            ]);
        }
        return redirect()->to('/buku');
    }


    public function delete($id)
    {
        // Cari gambar berdasarkan id
        $buku = $this->bukuModel->find($id);

        // Cek jika file gambarnya default.jpg
        if ($buku['pict'] != 'default.jpg') {
            // Hapus gambar
            // unlink('img/' . $buku['pict']);
        }

        $this->bukuModel->delete($id);
        return redirect()->to('/buku');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Form Edit Data Buku',
            'buku' => $this->bukuModel->find($id),
            'validation' => \Config\Services::validation()
        ];
        return view('buku/edit', $data);
    }

    public function update()
    {
        // Cek judul
        if (!$this->validate([
            'judul' => [
                'rules' => 'required|is_unique[buku.judul,id_buku,' . $this->request->getVar('id_buku') . ']',
                'errors' => [
                    'required' => '{field} buku harus diisi.',
                    'is_unique' => '{field} buku sudah terdaftar.'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/buku/edit/' . $this->request->getVar('id_buku'))->withInput()->with('validation', $validation);
        }

        $this->bukuModel->save([
            'id_buku' => $this->request->getVar('id_buku'),
            'judul' => $this->request->getVar('judul'),
            'pengarang' => $this->request->getVar('pengarang'),
            'tahun' => $this->request->getVar('tahun'),
            'pict' => $this->request->getVar('sampulLama')
        ]);
        session()->setFlashdata('pesan', 'Data berhasil diubah.');
        return redirect()->to('/buku');
    }

    public function listbuku()
    {
        $data = [
            'title' => 'Perpustakaan | Daftar Buku',
            'list' => $this->ketersediaanModel->ListBukuPerpustakaan(user_id()),
            'buku' => $this->bukuModel->findAll()
        ];
        return view('perpustakaan/listbuku', $data);
    }

    public function getallKomen($slug)
    {
        $result = $this->reviewModel->getAll($slug);
        $data = [
            'title' => 'Review',
            'komentar' => $result,
            'buku' => $this->bukuModel->getBuku($slug)
        ];

        return view('/buku/review', $data);
    }
}
