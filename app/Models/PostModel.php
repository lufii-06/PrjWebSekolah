<?php

namespace App\Models;

use CodeIgniter\Model;

class PostModel extends Model
{
    protected $table            = 'posts';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['user_id','title','articlethumnail','article','imagecover', 'video', 'post_category'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getUserDataPost(){
        return $this->db->query("SELECT posts.id,name,post_category,title, COUNT(comments.id)  AS jmlcomment,posts.created_at FROM `posts`
        LEFT JOIN `comments` ON posts.id = comments.id 
        LEFT JOIN `users` ON `posts`.`user_id` = `users`.`id` 
        LEFT JOIN `detailusers` ON `detailusers`.`user_id` = `users`.`id`
        GROUP BY posts.id, NAME, post_category, title, posts.created_at");
    }
    public function getDataNewPost(){
        return $this->db->query("SELECT posts.id, imagecover, article, articlethumnail, NAME, post_category, title, COUNT(comments.id) AS jmlcomment, posts.created_at
        FROM `posts`
        LEFT JOIN `comments` ON posts.id = comments.post_id
        LEFT JOIN `users` ON `posts`.`user_id` = `users`.`id`
        LEFT JOIN `detailusers` ON `detailusers`.`user_id` = `users`.`id`
        GROUP BY posts.id, imagecover, article, articlethumnail, NAME, post_category, title, posts.created_at
        ORDER BY posts.created_at DESC
        LIMIT 3");
    }
    public function getDataNewPostNewest($limit,$offset){
        return $this->db->query(" SELECT posts.id,title,article,articlethumnail,imagecover,video,post_category, NAME,   COUNT(comments.id) AS jmlcomment, posts.created_at
    FROM `posts`
    LEFT JOIN `comments` ON posts.id = comments.id 
    LEFT JOIN `users` ON `posts`.`user_id` = `users`.`id` 
    LEFT JOIN `detailusers` ON `detailusers`.`user_id` = `users`.`id`
    GROUP BY posts.id, NAME, post_category, title, posts.created_at
    ORDER BY posts.created_at DESC
    LIMIT $limit OFFSET $offset
    ")->getResultArray();
    }
    public function getDataNewPostLastest($limit,$offset){
        return $this->db->query(" SELECT posts.id,title,article,articlethumnail,imagecover,video,post_category, NAME,   COUNT(comments.id) AS jmlcomment, posts.created_at
    FROM `posts`
    LEFT JOIN `comments` ON posts.id = comments.id 
    LEFT JOIN `users` ON `posts`.`user_id` = `users`.`id` 
    LEFT JOIN `detailusers` ON `detailusers`.`user_id` = `users`.`id`
    GROUP BY posts.id, NAME, post_category, title, posts.created_at
    ORDER BY posts.created_at ASC
    LIMIT $limit OFFSET $offset
    ")->getResultArray();;
    }
    public function getUserDataPostKategory($kategori,$limit,$offset){
        return $this->db->query("SELECT posts.id,title,article,articlethumnail,imagecover,video,post_category, NAME,   COUNT(comments.id) AS jmlcomment, posts.created_at
    FROM `posts`
    LEFT JOIN `comments` ON posts.id = comments.id 
    LEFT JOIN `users` ON `posts`.`user_id` = `users`.`id` 
    LEFT JOIN `detailusers` ON `detailusers`.`user_id` = `users`.`id`
    WHERE post_category = '$kategori'
    GROUP BY posts.id, NAME, post_category, title, posts.created_at
    ORDER BY posts.created_at ASC
    LIMIT $limit OFFSET $offset
    ")->getResultArray();;
    }
    public function deletepost($id){
        $query = $this->db->table('posts')->delete(array('id' => $id));
        return $query;
    }

    public function getDetailPost($id){
        return $this->db->query("SELECT posts.id,title,article,articlethumnail,imagecover,video,post_category,detailusers.name,   COUNT(comments.id) AS jmlcomment, posts.created_at
        FROM `posts`
        LEFT JOIN `comments` ON posts.id = comments.id 
        LEFT JOIN `users` ON `posts`.`user_id` = `users`.`id` 
        LEFT JOIN `detailusers` ON `detailusers`.`user_id` = `users`.`id`
        WHERE posts.id = '$id'
        GROUP BY posts.id, NAME, post_category, title, posts.created_at
        ORDER BY posts.created_at ASC
        ");
    }

    public function getcommentPost($id){
         return $this->db->query("SELECT *,detailusers.`name` FROM comments LEFT JOIN `users` ON `comments`.`user_id` = `users`.`id`LEFT JOIN `detailusers` ON `detailusers`.`user_id` = `users`.`id` WHERE post_id = '$id' ORDER BY comments.created_at ASC");
    }

    public function searchPosts($limit, $offset, $search) {
        return $this->db->table('posts')
                        ->select('posts.id, title, article, articlethumnail, imagecover, video, post_category, detailusers.name AS NAME, COUNT(comments.id) AS jmlcomment, posts.created_at')
                        ->join('comments', 'posts.id = comments.id', 'left')  // LEFT JOIN ke tabel comments
                        ->join('users', 'posts.user_id = users.id', 'left')  // LEFT JOIN ke tabel users
                        ->join('detailusers', 'detailusers.user_id = users.id', 'left')  // LEFT JOIN ke tabel detailusers
                        ->groupBy('posts.id, detailusers.name, post_category, title, posts.created_at') // GROUP BY sesuai dengan kolom yang diperlukan
                        ->like('title', $search)  // Pencarian berdasarkan judul postingan
                        ->orLike('article', $search) // Atau pencarian berdasarkan isi artikel
                        ->orderBy('posts.created_at', 'DESC') // Urutkan berdasarkan waktu pembuatan
                        ->limit($limit, $offset) // Batasi hasil pencarian dengan limit dan offset untuk paginasi
                        ->get()
                        ->getResultArray();
    }

    public function getLaporanPostKategori($kategori){
            $builder = $this->db->table('posts');
            $builder->select('posts.id, title, imagecover, video, post_category, detailusers.name, COUNT(comments.id) AS jmlcomment, posts.created_at');
            $builder->join('comments', 'posts.id = comments.post_id', 'left');
            $builder->join('users', 'posts.user_id = users.id', 'left');
            $builder->join('detailusers', 'detailusers.user_id = users.id', 'left');
            $builder->where('post_category', $kategori);
            $builder->groupBy('posts.id, detailusers.name, post_category, title, posts.created_at');
            $builder->orderBy('posts.created_at', 'ASC');
            return $builder->get()->getResultArray();
    }
    public function getLaporanPostTanggal($start_date,$end_date){
        return $this->db->query("SELECT posts.id,title,article,articlethumnail,imagecover,video,post_category, detailusers.name,   COUNT(comments.id) AS jmlcomment, posts.created_at
    FROM `posts`
    LEFT JOIN `comments` ON posts.id = comments.post_id 
    LEFT JOIN `users` ON `posts`.`user_id` = `users`.`id` 
    LEFT JOIN `detailusers` ON `detailusers`.`user_id` = `users`.`id`
    WHERE posts.created_at between '$start_date' and '$end_date'
    GROUP BY posts.id, NAME, post_category, title, posts.created_at
    ORDER BY posts.created_at ASC")->getResultArray();
    }

}