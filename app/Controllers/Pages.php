<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $username = session()->get("username");
        $data = [
            'title' => 'Home | Perpusku',
            'tes' => ['satu', 'dua', 'tiga'],
            'username' => $username
        ];
        return view('pages/home', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'About | Perpusku'
        ];
        return view('pages/about', $data);
    }

    public function contact()
    {
        $data = [
            'title' => 'Contact | Perpusku',
            'alamat' => [
                [
                    'tipe' => 'rumah',
                    'alamat' => 'Jl. Abc No. 123',
                    'kota' => 'Bandung',
                ],
                [
                    'tipe' => 'Kantor',
                    'alamat' => 'Jl. Setiabudi No. 193',
                    'kota' => 'Bandung',
                ]
            ]
        ];
        return view('pages/contact', $data);
    }
}
