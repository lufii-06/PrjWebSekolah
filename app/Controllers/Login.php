<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\DetailUserModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Login extends BaseController
{
    public function index()
    {
        return view("layout/login");
    }
    public function register()
    {
        return view("layout/register");
    }

    public function login()
    {
        $model = new UserModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $user = $model->asObject()->where('username', $username)->first();
        if ($user) {
            $verify_pass = password_verify($password, $user->password);
            if ($verify_pass) {
                session()->set('user_id', $user->id);
                session()->set('username', $user->username);
                session()->set('level', $user->level);
                session()->set('masuk', true);
                return redirect()->to('Home');
            } else {
                return redirect()->to('Login')->withInput()->with("error", "Username atau password tidak ditemukan");
            }
        } else {
            return redirect()->to('Login')->withInput()->with("error", "Username atau password tidak ditemukan");
        }
    }

    public function create(){
        $model = new UserModel();
        $modelDetail = new DetailUserModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        if ($model->where('username', $username)->first()) {
            return redirect()->back()->withInput()->with("error", "Username yang anda inputkan sudah ada");
        }
        $data = [
            "username" => $username,
            "password" => password_hash($password, PASSWORD_DEFAULT),
            "level" => "Pengguna",
            "status" => "Active",
        ];
        $user_id = $model->insert($data);
        $dataDetail = [
            'user_id' => $user_id,
            'name' => $this->request->getPost('name'),
            'nohp' => $this->request->getPost('nohp'),
            'address' => $this->request->getPost('address'),
        ];
        $modelDetail->insert($dataDetail);
        return redirect()->to("Login")->with("success", "Berhasil Mendaftarkan Akun");
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}