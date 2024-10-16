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
    <form action="<?= site_url('PostController/shownewest') ?>" method="get">
        <div class="input-group w-75 mx-auto mb-4 p-0">
            <input type="text" class="form-control my-auto" name="search" placeholder="Cari postingan..."
                value="<?= isset($search) ? esc($search) : ''; ?>">
            <button class="btn btn-teal btn-sm ms-4" type="submit">Cari</button>
        </div>
    </form>

    <div class="row">
        <div class="col-md-12">
            <h1 class="mb-4"><?= $kategori ?></h1>
        </div>
    </div>
    <?php if (!$posts) {?>
    <h5>Postingan Belum Ada</h5>
    <?php } ?>
    <?php foreach ($posts as $key => $item) { ?>
    <div class="row mb-4">
        <div class="col-md-4">
            <img src="<?= base_url("uploads/".$item['imagecover']) ?>" class="img-fluid rounded" alt="Post Image">
        </div>
        <div class="col-md-8">
            <h3><a href="<?= site_url("PostController/detail/".$item['id']) ?>"
                    class="text-dark"><?= $item['title'] ?></a></h3>
            <p class="text-muted"><?= date('d F Y, H:i', strtotime($item['created_at'])); ?> by
                <a><?= $item['name'] ?? "Admin" ?></a>
            </p>
            <p class="overflow-hidden h-25"><?= $item['articlethumnail'] ?></p>
            <a href="<?= site_url("PostController/detail/".$item['id']) ?>" class="btn btn-teal">Read More</a>
        </div>
    </div>
    <?php } ?>
    <nav aria-label="Page navigation">
        <?= $pager->makeLinks($page, $limit, $totalPosts, 'bootstrap_pagination') ?>
    </nav>
</div>

<?= $this->endSection("") ?>