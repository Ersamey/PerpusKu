<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Admin | Perpusku'
        ];
        return view('pages/admin/index', $data);
    }
}
