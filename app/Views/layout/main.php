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
                <!-- <?php if (session()->get('level') == "Pengguna"): ?>
                <h5 class="text-white fw-bold">
                    Hallo <?= session()->get("username") ?>
                </h5>
                <a href="<?= site_url('Login/logout') ?>" class="text-danger fw-bold">Logout</a>
                <?php elseif (session()->get('level') == "Guru" || session()->get('level') == "Pimpinan" || session()->get('level') == "Admin" ): ?>
                <a href="<?= site_url("Admin") ?>" class="btn btn-outline-white-reverse me-4">Halaman Admin</a>
                <?php else: ?>
                <a href="<?= site_url("Login") ?>" class="btn btn-outline-white-reverse me-4">Masuk</a>
                <a href="<?= site_url("Login/register") ?>" class="text-white">Daftar</a>
                <?php endif; ?> -->
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
<div class="section " id="keunggulan">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-12 col-lg-4 mb-4 mb-lg-0 d-flex justify-content-center" data-aos="fade-up"
                data-aos-delay="200">
                <img src="<?= base_url("landingasset")?>/images/Akreditasi-B.png" alt="Image" class="img-fluid rounded
					">
            </div>
            <div class="col-12 col-lg-7 ps-lg-2">
                <div class="mb-5">
                    <h2 class="h4 fw-bold fs-3" style="color: #38A3A5;">
                        TERAKREDITASI "B"
                    </h2>
                    <p> SDIT Baiturrahim sudah memiliki kualitas yang memadai, dengan proses pembelajaran yang
                        berjalan
                        sesuai standar.</p>
                </div>
                <div class="d-flex mb-3 service-alt">
                    <div>
                        <span class="bi-book-fill me-4 fs-1" style="color: #38A3A5;"></span>
                    </div>
                    <div>
                        <h3>Pembelajaran Terstruktur</h3>
                        <p>memastikan proses belajar berlangsung secara sistematis, memungkinkan siswa untuk
                            mengikuti setiap tahapan dengan jelas dan teratur.</p>
                    </div>
                </div>

                <div class="d-flex mb-3 service-alt">
                    <div>
                        <span class="bi-award me-4 fs-1" style="color: #38A3A5;"></span>
                    </div>
                    <div>
                        <h3>Guru yang berkualitas</h3>
                        <p>membimbing siswa dengan profesionalisme, pengetahuan yang mendalam, dan metode pengajaran
                            yang relevan.</p>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
<div class="section sec-features">
    <div class="container">
        <div class="row g-5">
            <div class="col-12 col-sm-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="0">
                <div class="feature d-flex">
                    <span class="bi bi-star-fill text-white fs-1 mx-3"></span>
                    <div>
                        <h3>Fasilitas Unggulan Sekolah</h3>
                        <p>Ini kalimat untuk menunjukan fasilitas utama sekolah. Ini kalimat untuk menunjukan
                            fasilitas utama sekolah.</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="feature d-flex">
                    <span class="bi bi-star-fill text-white fs-1 mx-3"></span>
                    <div>
                        <h3>Fasilitas Unggulan Sekolah</h3>
                        <p>Ini kalimat untuk menunjukan fasilitas utama sekolah. Ini kalimat untuk menunjukan
                            fasilitas utama sekolah.</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                <div class="feature d-flex">
                    <span class="bi bi-star-fill text-white fs-1 mx-3"></span>
                    <div>
                        <h3>Fasilitas Unggulan Sekolah</h3>
                        <p>Ini kalimat untuk menunjukan fasilitas utama sekolah. Ini kalimat untuk menunjukan
                            fasilitas utama sekolah.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section sec-services" id="ekstrakurikuler">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-5 mx-auto text-center" data-aos="fade-up">
                <h2 class="heading" style="color : #38A3A5;">Ekstrakurikuler</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-6 col-md-6 col-lg-4" data-aos="fade-up">
                <div class="service text-center">
                    <span class="bi-layers"></span>
                    <div>
                        <h3>Nama Ekstrakurikuler</h3>
                        <p class="mb-4">Di sini letak Penjelasan lebih detail dari ekstrakurikuler </p>
                        <p><a href="#" class="btn btn-outline-teal py-2 px-3">Read more</a></p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="service text-center">
                    <span class="bi-layers"></span>
                    <div>
                        <h3>Nama Ekstrakurikuler</h3>
                        <p class="mb-4">Di sini letak Penjelasan lebih detail dari ekstrakurikuler </p>
                        <p><a href="#" class="btn btn-outline-teal py-2 px-3">Read more</a></p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                <div class="service text-center">
                    <span class="bi-layers"></span>
                    <div>
                        <h3>Nama Ekstrakurikuler</h3>
                        <p class="mb-4">Di sini letak Penjelasan lebih detail dari ekstrakurikuler </p>
                        <p><a href="#" class="btn btn-outline-teal py-2 px-3">Read more</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section sec-cta" style="background-image: url('<?= base_url("landingasset")?>/images/bgbaiturrahim.jpg')">
</div>

<div class="section sec-news" id="berita">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-7">
                <h2 class="heading " style="color : #38A3A5;">Postingan Terbaru</h2>
            </div>
        </div>
        <div class="row">
            <?php if (!$postingan) { ?>
            <h5>Postingan Belum Tersedia</h5>
            <?php } ?>
            <?php foreach ($postingan as $key => $item) {?>
            <div class="col-12 col-lg-4">
                <div class="card post-entry h-100">
                    <div class="h-50">
                        <a href="<?= site_url("PostController/detail/".$item['id']) ?>" class="h-100">
                            <img src="<?= base_url("uploads/".$item['imagecover']) ?>" class="card-img-top h-100"
                                alt="Image"></a>
                    </div>
                    <div class="card-body">
                        <div>
                            <span
                                class="text-uppercase font-weight-bold date"><?= date('d F Y, H:i', strtotime($item['created_at'])); ?></span>
                        </div>
                        <h5 class="card-title h-50 overflow-auto"><a
                                href="<?= site_url("PostController/detail/".$item['id']) ?>"
                                style="color : #38A3A5;"><?= $item['title'] ?></a>
                        </h5>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="position-relative d-inline-block">
                                <i class="bi bi-chat fs-4"></i>
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill"
                                    style="background-color: #38A3A5;"><?= $item['jmlcomment'] ?></span>
                            </div>
                            <a href="<?= site_url("PostController/detail/".$item['id']) ?>"
                                style="color: #38A3A5; padding: 0.25rem 0.75rem;margin-right: 20px;"><u>Read
                                    more</u></a>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
        <div class="d-flex justify-content-start py-2">
            <a href="<?= site_url("PostController/shownewest") ?>" style="color : #38A3A5;"><u>Postingan Lainnya</u></a>
        </div>
    </div>
</div>
</div>

<?= $this->endSection("") ?>