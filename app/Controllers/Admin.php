<?php

namespace App\Controllers;

use Config\Database;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Admin extends BaseController
{
    public function index()
    {
        if (session()->get('masuk') == true) {
            if (session()->get('level') === 'Pengguna' ) {
            echo "<script>alert('Anda Tidak berhak mengakses halaman ini');window.location.href='/Home';</script>";
            } else {
                $db = Database::connect();
                $data = [
                    "jmlpengguna" => $db->query("SELECT COUNT(*) AS total FROM users WHERE LEVEL = 'Pengguna'")->getRow()->total, 
                    "jmlguru" => $db->query("SELECT COUNT(*) AS total FROM users WHERE LEVEL = 'Guru'")->getRow()->total,
                    "jmlpostingan" => $db->query("SELECT COUNT(*) AS total FROM posts")->getRow()->total
                ];
                return view("admin/mainadmin",$data);
            }
        } else {
            echo "<script>alert('anda belum login');window.location.href='/Login';</script>";
        }
    }
}