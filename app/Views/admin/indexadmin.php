<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Admin</title>
    <!-- CSS -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="<?= base_url("adminasset/") ?>plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet"
        href="<?= base_url("adminasset/") ?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="<?= base_url("adminasset/") ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url("adminasset/") ?>plugins/jqvmap/jqvmap.min.css">
    <link rel="stylesheet" href="<?= base_url("adminasset/") ?>dist/css/adminlte.min.css">
    <link rel="stylesheet" href="<?= base_url("adminasset/") ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="<?= base_url("adminasset/") ?>plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="<?= base_url("adminasset/") ?>plugins/summernote/summernote-bs4.min.css">
    <link rel="stylesheet"
        href="<?= base_url("adminasset/") ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="<?= base_url("adminasset/") ?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet"
        href="<?= base_url("adminasset/") ?>plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <!-- JS -->
    <script src="<?= base_url("adminasset/") ?>plugins/jquery/jquery.min.js"></script>
    <script src="<?= base_url("adminasset/") ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url("adminasset/") ?>dist/js/adminlte.min.js"></script>
    <script src="<?= base_url("adminasset/") ?>plugins/chart.js/Chart.min.js"></script>
    <script src="<?= base_url("adminasset/") ?>plugins/sparklines/sparkline.js"></script>
    <script src="<?= base_url("adminasset/") ?>plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="<?= base_url("adminasset/") ?>plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <script src="<?= base_url("adminasset/") ?>plugins/jquery-knob/jquery.knob.min.js"></script>
    <script src="<?= base_url("adminasset/") ?>plugins/moment/moment.min.js"></script>
    <script src="<?= base_url("adminasset/") ?>plugins/daterangepicker/daterangepicker.js"></script>
    <script src="<?= base_url("adminasset/") ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js">
    </script>
    <script src="<?= base_url("adminasset/") ?>plugins/summernote/summernote-bs4.min.js"></script>
    <script src="<?= base_url("adminasset/") ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

    <!-- DataTables -->
    <script src="<?= base_url("adminasset/") ?>plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url("adminasset/") ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url("adminasset/") ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url("adminasset/") ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="<?= base_url("adminasset/") ?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url("adminasset/") ?>plugins/jszip/jszip.min.js"></script>
    <script src="<?= base_url("adminasset/") ?>plugins/pdfmake/pdfmake.min.js"></script>
    <script src="<?= base_url("adminasset/") ?>plugins/pdfmake/vfs_fonts.js"></script>
    <script src="<?= base_url("adminasset/") ?>plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- Demo and Dashboard JS -->
    <script src="<?= base_url("adminasset/") ?>dist/js/demo.js"></script>
    <script src="<?= base_url("adminasset/") ?>dist/js/pages/dashboard.js"></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <div class="spinner-border text-info" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?= site_url("Admin") ?>" class="nav-link">Home</a>
                </li>
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- End Navbar -->
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-success elevation-4">
            <!-- Brand Logo -->
            <a href="<?= site_url("Admin") ?>" class="brand-link">
                <img src="<?= base_url("landingasset")?>/images/logo.png" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Baiturrahim</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <i class="fas fa-user mt-2 fw-bold text-white"></i>
                    </div>
                    <div class="info">
                        <a href="<?= site_url("Admin") ?>" class="d-block">Welcome,
                            <?= session()->get("username") ?></a>
                    </div>
                </div>
                <!-- Sidebar Menu -->
                <?= $this->rendersection('menu') ?>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        <!-- Content Wrapper. Contains page content -->
        <?= $this->rendersection('main') ?>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; <a href="https://adminlte.io">Khairun Nisa</a>.</strong>

            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.1.0
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <script>
    $.widget.bridge('uibutton', $.ui.button)
    </script>
</body>

</html>