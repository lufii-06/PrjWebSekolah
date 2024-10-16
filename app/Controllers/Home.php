<?php

namespace App\Controllers;

use App\Models\PostModel;

class Home extends BaseController
{
    public function index(): string
    {
        $model = new PostModel();
        $data = [
            "postingan" => $model->getDataNewPost()->getResultArray()
        ];
        return view('layout/main',$data);
    }
    public function visimisi(): string
    {
        return view('layout/visimisi');
    }
}