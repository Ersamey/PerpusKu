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
        // d($this->request->getVar('keyword'));
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $this->adminModel->search($keyword);
        } else {
            $this->adminModel;
        }

        $data = [
            'title' => 'Admin | Perpusku',
            'user' => $this->adminModel->getAll(),
            'role' => $this->adminModel->getRole(),
        ];
        return view('pages/admin/index', $data);
    }

    public function ubahRole()
    {
        $requestData = $this->request->getVar();
        // Call the model's method and pass the request data
        $result = $this->adminModel->ubahRole($requestData);

        $data = [
            'title' => 'Admin | Perpusku',
            'role' => $result
        ];
        return redirect()->to('/admin')->with('success', 'Role berhasil diubah');
    }

    public function delete($id)
    {
        $this->adminModel->delete($id);
        return redirect()->to('/admin')->with('success', 'Data berhasil dihapus');
    }
}
