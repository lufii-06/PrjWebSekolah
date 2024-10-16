<?php

namespace App\Controllers;

use App\Models\PostModel;
use App\Models\UserModel;
use App\Models\CommentModel;

class Laporan extends BaseController
{
    public function index()
    {
        return view('admin/laporan');
    }
    public function CetakUser()
    {
        $level = $this->request->getPost("level");
        $model = new UserModel();
        $data['laporan'] = $model->getLaporanUser($level)->getResultArray();
        $data['level'] = $level;
        return view('laporan/CetakLaporanUser',$data);
    }
    public function CetakPostinganKategori()
    {
        $kategori = $this->request->getPost("kategori");
        $model = new PostModel();
        $data['laporan'] = $model->getLaporanPostKategori($kategori);
        $data['kategori'] = $kategori;
        return view('laporan/CetakLaporanPostinganPerKategori',$data);
    }
    public function CetakPostinganTanggal()
    {
        $start_date = $this->request->getPost("start_date");
        $end_date = $this->request->getPost("end_date");
        $model = new PostModel();
        $data = [
            "start_date" =>$start_date, 
            "end_date" =>$end_date, 
            "laporan"=>$model->getLaporanPostTanggal($start_date,$end_date),
        ];
        return view('laporan/CetakLaporanPostinganPerTanggal',$data);
    }
    public function CetakKomentar()
    {
        $id = $this->request->getPost("id_postingan");
        $model = new CommentModel();
        $data = [
            "postingan" =>$model->dataReport($id)->getRow(),
            "laporan" =>$model->getLaporanKomentar($id)->getResultArray()
        ];
        return view('laporan/KomentarPerPostingan',$data);
    }
}