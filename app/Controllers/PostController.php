<?php

namespace App\Controllers;

use App\Models\PostModel;
use App\Models\UserModel;
use App\Models\CommentModel;
use App\Models\DetailUserModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class PostController extends BaseController
{
    public function index()
    {
        if (session()->get('masuk') == true) {
            if (session()->get('level') === 'Pengguna' ) {
            echo "<script>alert('Anda Tidak berhak mengakses halaman ini');window.location.href='/Home';</script>";
            } else {
                $model = new PostModel();
                $data = [
                    "Posts" => $model->getUserDataPost()->getResultArray()
                ];
                return view("admin/indexpost",$data);
            }
        } else {
            echo "<script>alert('anda belum login');window.location.href='/Login';</script>";
        }
    }

    public function shownewest() {
        $model = new PostModel();
        $limit = 5; 
        $page = $this->request->getVar('page') ? $this->request->getVar('page') : 1; // Ambil halaman saat ini dari URL
        $offset = ($page - 1) * $limit;
        $search = $this->request->getVar('search');
        if ($search) {
            $posts = $model->searchPosts($limit, $offset, $search);
            $totalPosts = $model->countAllResults(false);
            // $totalPosts = $model->countSearchPosts($search);
        } else {
            // Panggil method default jika tidak ada pencarian
            $posts = $model->getDataNewPostNewest($limit, $offset);
            $totalPosts = $model->countAllResults(false);
        }
        // Siapkan data untuk dikirim ke view
        $data = [
            "kategori" => $search ? "Hasil Pencarian untuk: " . esc($search) : "Artikel Terbaru",
            "posts" => $posts,
            'pager' => \Config\Services::pager(),
            'totalPosts' => $totalPosts,
            'limit' => $limit,
            'page' => $page,
            'search' => $search // Menyimpan keyword pencarian
        ];
    
        // Tampilkan view dengan data
        return view("layout/postlist", $data);
    }
    
    public function showlastest(){
        $model = new PostModel();
        $limit = 5; 
        $page = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
        $offset = ($page - 1) * $limit;
        $posts = $model->getDataNewPostLastest($limit, $offset);
        $totalPosts = $model->countAllResults(false);
        $data = [
            "kategori" => "Artikel Terlama",
            "posts" => $posts,
            'pager' => \Config\Services::pager(),
            'totalPosts' => $totalPosts,
            'limit' => $limit,
            'page' => $page
        ];
        return view("layout/postlist",$data);
    }
    public function showkategoriedukasi(){
        $model = new PostModel();
        $kategori = "Edukasi";
        $limit = 5; 
        $page = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
        $offset = ($page - 1) * $limit;
        $posts = $model->getUserDataPostKategory($kategori,$limit, $offset);
        $totalPosts = $model->countAllResults(false);
        $data = [
            "kategori" => "Artikel Edukasi",
            "posts" => $posts,
            'pager' => \Config\Services::pager(),
            'totalPosts' => $totalPosts,
            'limit' => $limit,
            'page' => $page
        ];
        return view("layout/postlist",$data);
    }
    public function showinfosekolah(){
        $model = new PostModel();
        $kategori = "Info sekolah";
        $limit = 5; 
        $page = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
        $offset = ($page - 1) * $limit;
        $posts = $model->getUserDataPostKategory($kategori,$limit, $offset);
        $totalPosts = $model->countAllResults(false);
        $data = [
            "kategori" => "Artikel Info Sekolah",
            "posts" => $posts,
            'pager' => \Config\Services::pager(),
            'totalPosts' => $totalPosts,
            'limit' => $limit,
            'page' => $page
        ];
        return view("layout/postlist",$data);
    }
    public function showekstrakurikuler(){
        $model = new PostModel();
        $kategori = "Ekstrakurikuler";
        $limit = 5; 
        $page = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
        $offset = ($page - 1) * $limit;
        $posts = $model->getUserDataPostKategory($kategori,$limit, $offset);
        $totalPosts = $model->countAllResults(false);
        $data = [
            "kategori" => "Artikel Ekstrakurikuler",
            "posts" => $posts,
            'pager' => \Config\Services::pager(),
            'totalPosts' => $totalPosts,
            'limit' => $limit,
            'page' => $page
        ];
        return view("layout/postlist",$data);
    }

    public function save(){
       $title = $this->request->getPost('title');
       $post_category = $this->request->getPost('post_category');
       $article = $this->request->getPost('article');
       $imagecover = $this->request->getFile('imagecover');
       $imageName = $imagecover->getRandomName();
       $imagecover->move(FCPATH  . 'uploads/', $imageName);
       $videoName = null;
       if ($this->request->getFile('video')->isValid()) {
           $video = $this->request->getFile('video');
           $videoName = $video->getRandomName();
           $video->move(FCPATH . 'uploads/videos/', $videoName);
       }
       $postModel = new PostModel();
       $postModel->save([
           'user_id' => session()->get('user_id'),
           'title' => $title,
           'articlethumnail' => $this->request->getPost('articlethumnail'),
           'article' => $article,
           'imagecover' => $imageName,
           'video' => $videoName,
           'post_category' => $post_category,
       ]);
       return redirect()->back()->with('success', 'Postingan berhasil Upload.');
    }

    public function detail($id){
        $model = new PostModel();
        $data = [
            "post" => $model->getDetailPost($id)->getRow(),
            "comment" => $model->getcommentPost($id)->getResultArray(),
            "newestarticle" => $model->getDataNewPost()->getResultArray()
        ];
        return view('layout/postdetail',$data);
    }

    public function savecomment (){
            $id =  $this->request->getPost("id");
            $comment =  $this->request->getPost("comment");
            $data = [
                "user_id" => session()->get('user_id') ?? '3',
                "post_id" => $id,
                "comment" => $comment,
            ];
            $model = new CommentModel();
            $model->insert($data);
            
            return redirect()->to("PostController/detail/".$id)->with("success", "Berhasil Memosting Komentar");
    }

    // public function showSearchResults() {
    //     $search = $this->request->getGet('search');
    //     $model = new PostModel();
    //     $posts = $model->searchPosts($search); // Melakukan pencarian dalam model
    
    //     $data = [
    //         'search' => $search,  // Mengirim kembali kata kunci yang dicari ke view
    //         'posts' => $posts,    // Hasil pencarian
    //     ];
    //     return view('postlist', $data);  // Menampilkan view dengan data yang diisi
    // }
    

    
    // public function shownewest(){
    //     $model = new PostModel();
    //     $limit = 5; 
    //     $page = $this->request->getVar('page') ? $this->request->getVar('page') : 1; // Ambil halaman saat ini dari URL
    //     $offset = ($page - 1) * $limit;
    //     $search = $this->request->getVar('search');
    //     $posts = $model->getDataNewPostNewest($limit, $offset);
    //     $totalPosts = $model->countAllResults(false);
        
    
    //     $data = [
    //         "kategori" => "Artikel Terbaru",
    //         "posts" => $posts,
    //         'pager' => \Config\Services::pager(),
    //         'totalPosts' => $totalPosts,
    //         'limit' => $limit,
    //         'page' => $page
    //     ];
    //     return view("layout/postlist", $data);
    // }
}