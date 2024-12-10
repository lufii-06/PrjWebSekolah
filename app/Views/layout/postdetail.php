<?= $this->extend('layout/index') ?>
<?= $this->section('header') ?>
<img src="<?= base_url("landingasset")?>/images/blob.svg" alt="" class="img-fluid blob">
<div class="container">
    <div class="row align-items-center justify-content-between pt-5">
        <div class="col-lg-6 text-center text-lg-start pe-lg-5 ">
            <h1 class="heading text-white mb-3" data-aos="fade-up">SD ISLAM TERPADU BAITURRAHIM
            </h1>
            <p class="text-white mb-5" data-aos="fade-up" data-aos-delay="100">
                pendidikan berkualitas yang mengintegrasikan ilmu pengetahuan dan nilai-nilai Islam, memastikan
                anak-anak Anda tidak hanya cerdas secara akademis tetapi juga memiliki karakter yang kuat dan
                berakhlak mulia.</p>
            <div class="align-items-center mb-5 mm" data-aos="fade-up" data-aos-delay="200">
                <?php if (session()->get('level') == "Pengguna"): ?>
                <h5 class="text-white fw-bold">
                    Hallo <?= session()->get("username") ?>
                </h5>
                <a href="<?= site_url('Login/logout') ?>" class="text-danger fw-bold">Logout</a>
                <?php elseif (session()->get('level') == "Guru" || session()->get('level') == "Pimpinan" || session()->get('level') == "Admin" ): ?>
                <a href="<?= site_url("Admin") ?>" class="btn btn-outline-white-reverse me-4">Halaman Admin</a>
                <?php else: ?>
                <a href="<?= site_url("Login") ?>" class="btn btn-outline-white-reverse me-4">Masuk</a>
                <a href="<?= site_url("Login/register") ?>" class="text-white">Daftar</a>
                <?php endif; ?>
                <!-- <a href="https://youtu.be/F3haoewa1Cw?si=LNkp8vF_bVtCnPdE" class="text-white glightbox">Cuplikan
                            Wisuda</a> -->
            </div>
        </div>
        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
            <img src="<?= base_url("landingasset")?>/images/logo.png" alt="Image" class="img-fluid rounded">
        </div>
    </div>
</div>
<?= $this->endSection('') ?>
<?= $this->section('main') ?>
<div class="container my-5 text-dark ">
    <div class="row">
        <div class="col-md-12">
            <h1 class="display-4"><?= $post->title ?></h1>
            <p class="lead">By <a href="#"><?= $post->name ?? "Admin" ?></a> |
                <span><?= date('d F Y, H:i', strtotime($post->created_at)); ?></span>
            </p>
            <hr>
        </div>
    </div>

    <!-- Article Content -->
    <div class="row">
        <div class="col-md-8">
            <img src="<?= base_url("uploads/".$post->imagecover) ?>" class="img-fluid mb-4" alt="Article Image">
            <p style="text-align:justify"><?= $post->article ?></p>
        </div>

        <!-- Sidebar -->
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Shorter</h5>
                    <p class="card-text" style="text-align:justify"><?= $post->articlethumnail ?></p>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Video</h5>
                    <video width="100%" controls>
                        <source src="<?= base_url('uploads/videos/'. $post->video) ?>" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Newest Articles</h5>
                    <ul>
                        <?php foreach ($newestarticle as $key => $item) { ?>
                        <li><a
                                href="<?= site_url("PostController/detail/".$item['id']) ?>"><u><?= $item['title'] ?></u></a>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Comment Section -->
    <div class="row mt-5">
        <div class="col-md-6">
            <h3>Comments</h3>
            <div class="mb-3">
                <form action="<?= site_url('PostController/savecomment') ?>" method="post">
                    <input type="hidden" name="id" id="id" value="<?= $post->id ?>">
                    <label for="commentTextarea" class="form-label">Leave a Comment</label>
                    <textarea class="form-control" id="commentTextarea" rows="3" name="comment"></textarea>
                    <button class="btn btn-teal mt-3" type="submit">Submit</button>
                </form>
            </div>
        </div>
        <div class="col-md-6">
            <div class="h-100 overflow-auto">
                <?php if (!$comment) { ?>
                <p>Belum Ada Komentar</p>
                <?php } ?>
                <?php foreach ($comment as $key => $value) {?>
                <div class="media mb-4">
                    <div class="media-body shadow ps-5 py-3  rounded-pill">
                        <h5 class="mt-0"><i class="bi bi-chat-left-text"></i>
                            <?php if($value['level']){
                                if ($value['level'] != "Guru") {
                                    echo $value['level'];
                                }else{
                                    echo "Pengguna";
                                }
                            }else{
                                echo "Admin";
                            }  ?>
                            &nbsp;<?= $value['level'] ?? "Admin" ?>
                        </h5>
                        <?= $value['comment'] ?>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection("") ?>