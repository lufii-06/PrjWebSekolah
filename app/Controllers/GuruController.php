<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\DetailUserModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class GuruController extends BaseController
{
    public function index()
    {
        if (session()->get('masuk') == true) {
            if (session()->get('level') === 'Pengguna' ) {
            echo "<script>alert('Anda Tidak berhak mengakses halaman ini');window.location.href='/Home';</script>";
            } else {
                $model = new UserModel();
                $data = [
                    "Users" => $model->getUserDataGuru()->getResultArray()
                ];
                return view("admin/indexguru",$data);
            }
        } else {
            echo "<script>alert('anda belum login');window.location.href='/Login';</script>";
        }
    }

    public function save(){
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
            "level" => "Guru",
            "status" => "Active",
        ];
        $user_id = $model->insert($data);
        $dataDetail = [
            'user_id' => $user_id,
            'name' => $this->request->getPost('name'),
            'nohp' => $this->request->getPost('nohp'),
            'address' => $this->request->getPost('alamat'),
        ];
        $modelDetail->insert($dataDetail);
        return redirect()->back()->with("success", "Berhasil Mendaftarkan Guru");
    }

    public function update(){
        $model = new UserModel();
        $id = $this->request->getPost('id');
        $data = array(
            'name' =>$this->request->getPost('name'),
            'nohp' =>$this->request->getPost('nohp'),
            'address' =>$this->request->getPost('alamat')
        );
        $model->updatedata($data,$id);
        return redirect()->back()->with("success",'Berhasil Mengupdate Guru');
    }
    public function delete(){
        $model = new UserModel();
        $id = $this->request->getPost('id');
        $model->deleteuser($id);
        return redirect()->back();
    }
    public function changePassword(){
        $model = new UserModel();
        $id = $this->request->getPost('id');
        $password = $this->request->getPost('password');
        $model->changePassworduser($id,password_hash($password,PASSWORD_DEFAULT));
        return redirect()->back()->with("success", "Berhasil Mengganti Password");
    }
}