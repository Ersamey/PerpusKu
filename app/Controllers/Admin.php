<?php

namespace App\Controllers;

use App\Models\AdminModel;

class Admin extends BaseController
{
    protected $adminModel;
    public function __construct()
    {
        $this->adminModel = new AdminModel();
    }
    public function index()
    {

        $data = [
            'title' => 'Admin | Perpusku',
            'user' => $this->adminModel->getAll(),
            'role' => $this->adminModel->getRole()
        ];
        return view('pages/admin/index', $data);
    }
}
