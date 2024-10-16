<?= $this->extend('admin/indexadmin') ?>
<?= $this->section('menu') ?>
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <?php if (session()->get('level') == "Admin") {?>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-folder"></i>
                <p>
                    Data Master
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="<?= site_url("UserController") ?>" class="nav-link ">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Pengguna</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= site_url("GuruController") ?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Guru</p>
                    </a>
                </li>
            </ul>
        </li>
        <?php } ?>

        <li class="nav-item">
            <a href="<?= site_url("PostController") ?>" class="nav-link">
                <i class="nav-icon fas fa-newspaper"></i>
                <p>
                    Postingan
                </p>
            </a>
        </li>
        <?php if (session()->get('level') == "Admin" || session()->get('level') == "Pimpinan") {?>
        <li class="nav-item">
            <a href="<?= site_url("Laporan") ?>" class="nav-link">
                <i class="nav-icon fas fa-file-alt"></i>
                <p>
                    Laporan
                </p>
            </a>
        </li>
        <?php } ?>

        <li class="nav-item">
            <a href="<?= site_url("Home") ?>" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                Halaman Utama
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= site_url("Login/logout") ?>" class="nav-link text-danger fw-bold">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                Logout
            </a>
        </li>
</nav>
<!-- Modal -->
<div class="modal fade" id="userReportModal" tabindex="-1" aria-labelledby="userReportModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userReportModalLabel">Laporan User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Combo Box (Select) -->
                <div class="form-group">
                    <label for="userSelect">Pilih User</label>
                    <select class="form-control" id="userSelect">
                        <option value="1">User 1</option>
                        <option value="2">User 2</option>
                        <option value="3">User 3</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection('') ?>