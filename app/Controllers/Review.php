<?php

namespace App\Controllers;

use App\Models\ReviewModel;

class Review extends BaseController
{
    protected $reviewModel;
    public function __construct()
    {
        $this->reviewModel = new ReviewModel();
    }

    public function index($id)
    {
        $data = [
            'komentar' => $this->reviewModel->tambahReview($id)
        ];

        // return view('buku/index', $data);
        return view('review/add', $data);
    }
}
