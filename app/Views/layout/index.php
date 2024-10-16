<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Untree.co">
    <link rel="shortcut icon" href="favicon.png">
    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap5" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url("landingasset")?>/fonts/icomoon/style.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= base_url("landingasset")?>/css/tiny-slider.css">
    <link rel="stylesheet" href="<?= base_url("landingasset")?>/css/aos.css">
    <link rel="stylesheet" href="<?= base_url("landingasset")?>/css/glightbox.min.css">
    <link rel="stylesheet" href="<?= base_url("landingasset")?>/css/style.css">
    <link rel="stylesheet" href="<?= base_url("landingasset")?>/css/flatpickr.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <title>SDIT Baiturrahim</title>
</head>

<body>
    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close">
                <span class="icofont-close js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>
    <nav class="site-nav">
        <div class="container">
            <div class="menu-bg-wrap">
                <div class="site-navigation">
                    <div class="row g-0 align-items-center">
                        <div class="col-2">
                            <a href="<?= site_url("Home") ?>" class="logo m-0 float-start">SDIT.<span
                                    class="text-primary">Baiturrahim</span></a>
                        </div>
                        <div class="col-8 text-center ">
                            <ul class="js-clone-nav d-none d-lg-inline-block text-start site-menu mx-auto">
                                <li><a href="<?= site_url("Home/visimisi") ?>">Visi & Misi</a></li>
                                <li><a href="<?= site_url("Home#keunggulan") ?>">Keunggulan</a></li>
                                <li><a href="<?= site_url("Home#ekstrakurikuler") ?>">Ekstrakurikuler</a></li>
                                <li class="has-children">
                                    <a href="#berita">Postingan</a>
                                    <ul class="dropdown">
                                        <li><a href="<?= site_url("PostController/shownewest") ?>">Terbaru</a></li>
                                        <li><a href="<?= site_url("PostController/showlastest") ?>">Terlama</a></li>
                                        <li class=" has-children">
                                            <a>Kategory</a>
                                            <ul class="dropdown">
                                                <li><a
                                                        href="<?= site_url("PostController/showkategoriedukasi") ?>">Edukasi</a>
                                                </li>
                                                <li><a href="<?= site_url("PostController/showinfosekolah") ?>">Info
                                                        Sekolah</a></li>
                                                <li><a
                                                        href="<?= site_url("PostController/showekstrakurikuler") ?>">Ekstrakurikuler</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="#contact">Contact Us</a></li>
                                <li class="has-children">
                                    <a>Account</a>
                                    <ul class="dropdown">
                                        <li>
                                            <?php if (session()->get('level') == "Pengguna"): ?>
                                            <a>Hallo <?= session()->get("username") ?></a>
                                            <a href="<?= site_url('Login/logout') ?>"
                                                class="text-danger fw-bold">Logout</a>
                                            <?php elseif (session()->get('level') == "Guru" || session()->get('level') == "Pimpinan" || session()->get('level') == "Admin" ): ?>
                                            <a href="<?= site_url("Admin") ?>">Halaman Admin</a>
                                            <a href="<?= site_url('Login/logout') ?>"
                                                class="text-danger fw-bold">Logout</a>
                                            <?php else: ?>
                                            <a href="<?= site_url("Login") ?>">Masuk</a>
                                            <a href="<?= site_url("Login/register") ?>">Daftar</a>
                                            <?php endif; ?>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="col-2 text-end">
                            <a href="#"
                                class="burger ms-auto float-end site-menu-toggle js-menu-toggle d-inline-block d-lg-none light">
                                <span></span>
                            </a>
                            <a href="tel://6281372594924" class="call-us d-flex align-items-center">
                                <span class="icon-phone fw-bold"></span>
                                <span class="text-nowrap">+62 813-7259-4924</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="hero overlay">
        <?= $this->rendersection('header') ?>
    </div>

    <?= $this->rendersection('main') ?>


    <div class="site-footer " id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="widget">
                        <h3>Temukan Kami</h3>
                        <div class="mb-3" id="map" style="width: 100%; height: 230px;"></div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="widget">
                        <h3>About</h3>
                        <p>Sistem Informasi SDIT Baiturrahim ini kami fokuskan untuk Pemberitahuan,Pemberitaan, dan
                            edukasi</p>
                    </div>
                    <div class="widget">
                        <address class="text-justify">Jl. Raya Bukittinggi-Payakumbuh Km4 Parik Putuih
                            Ampang Gadang,Kec. Ampek Angkek, Kab. Agam,
                            Sumatera Barat,26191.
                        </address>
                        <ul class="list-unstyled links">
                            <li><a href="tel://6281372594924" class="text-nowrap">Contact : +62 813-7259-4924</a>
                            </li>
                            <li><a href="mailto:sdit.baiturrahim@gmail.com">sdit.baiturrahim@gmail.com</a></li>
                        </ul>
                    </div> <!-- /.widget -->
                </div> <!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <div class="widget">
                        <h3>Navigation</h3>
                        <ul class="list-unstyled links mb-4">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#berita">Post</a></li>
                        </ul>

                        <h3>Social</h3>
                        <ul class="list-unstyled social">

                            <li>
                                <a target="_blank"
                                    href="https://www.instagram.com/sditbaiturrahim?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw=="><span
                                        class="bi bi-instagram"></span>
                                </a>
                            </li>
                            <li><a target="_blank"
                                    href="https://www.tiktok.com/@sditbaiturrahimtv?is_from_webapp=1&sender_device=pc"><span
                                        class="bi bi-tiktok"></span></a></li>
                            <li><a target="_blank" href="https://web.facebook.com/sdit.baiturrahim.7"><span
                                        class="bi bi-facebook"></span></a></li>
                            <li><a target="_blank" href="https://www.youtube.com/@sditbaiturrahimtv"><span
                                        class="bi bi-youtube"></span></a></li>
                        </ul>
                    </div> <!-- /.widget -->
                </div> <!-- /.col-lg-4 -->
            </div> <!-- /.row -->

            <div class="row mt-5">
                <div class="col-12 text-center">
                    <!-- 
              **==========
              NOTE: 
              Please don't remove this copyright link unless you buy the license here https://untree.co/license/  
              **==========
            -->

                    <p>Copyright &copy;<script>
                        document.write(new Date().getFullYear());
                        </script> &mdash; Khairun Nisa
                        <!-- License information: https://untree.co/license/ -->
                    </p>
                </div>
            </div>
        </div> <!-- /.container -->
    </div> <!-- /.site-footer -->

    <!-- Preloader -->
    <div id="overlayer"></div>
    <div class="loader">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
    <script>
    var map = L.map('map').setView([-0.2935954000836513, 100.40114926670292], 12);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map); -
    0.2935954000836513, 100.40114926670292
    var marker = L.marker([-0.2935954000836513, 100.40114926670292]).addTo(map)
        .bindPopup('Disini SDIT Baiturrahim')
        .openPopup();
    </script>

    <script src="<?= base_url("landingasset")?>/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url("landingasset")?>/js/tiny-slider.js"></script>
    <script src="<?= base_url("landingasset")?>/js/flatpickr.min.js"></script>
    <script src="<?= base_url("landingasset")?>/js/aos.js"></script>
    <script src="<?= base_url("landingasset")?>/js/glightbox.min.js"></script>
    <script src="<?= base_url("landingasset")?>/js/navbar.js"></script>
    <script src="<?= base_url("landingasset")?>/js/counter.js"></script>
    <script src="<?= base_url("landingasset")?>/js/custom.js"></script>
</body>

</html>