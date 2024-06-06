<?php

namespace App\Controllers;

use Myth\Auth\Config\Auth as AuthConfig;

class Pages extends BaseController
{
    public function index()
    {
        $username = session()->get("username");
        $data = [
            'title' => 'Home | Perpusku',
            'username' => $username
        ];
        return view('pages/home', $data);
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

    public function register()
    {
        $data = [
            'title' => 'Register | Perpusku',
            'config' => new AuthConfig()
        ];
        return view('/auth/register', $data);
    }

    public function login()
    {
        $data = [
            'title' => 'Login | Perpusku',
            'config' => new AuthConfig()
        ];
        return view('/auth/signIn', $data);
    }
}
