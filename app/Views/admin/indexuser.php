<?= $this->extend('admin/menu') ?>
<?= $this->section('main') ?>
<?php if (session()->get('error')): ?>
<script>
alert("<?= session()->get('error') ?>")
</script>
<?php endif;?>
<?php if (session()->get('success')): ?>
<script>
alert("<?= session()->get('success') ?>")
</script>
<?php endif;?>
<div class="content-wrapper">
    <div class="content-header">
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <a href="" class="btn btn-primary btn-sm float-right" data-target="#addModal"
                            data-toggle="modal">Tambah Pengguna</a>
                        <h3 class="card-title">Data Pengguna</h3>
                    </div>
                    <div class="card-body">
                        <table id="tableUser" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>Nama</th>
                                    <th>Nohp</th>
                                    <th>Alamat</th>
                                    <th>Terdaftar Pada</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($Users as $user): ?>
                                <tr>
                                    <td><?= $user['username']; ?></td>
                                    <td><?= $user['name']; ?></td>
                                    <td><?= $user['nohp']; ?></td>
                                    <td><?= $user['address']; ?></td>
                                    <td><?= $user['created_at']; ?></td>
                                    <td>
                                        <button class="btn btn-info btn-edit btn-sm mb-1"
                                            data-id="<?= $user['id_user']; ?>" data-nama="<?= $user['name']; ?>"
                                            data-nohp="<?= $user['nohp']; ?>" data-address="<?= $user['address'];?>">
                                            <i class="fa fa-edit"></i></button>
                                        <button class="btn btn-danger btn-delete btn-sm mb-1"
                                            data-id="<?= $user['id_user']; ?>"><i class="fa fa-trash"></i></button>
                                        <button class="btn btn-warning btn-change btn-sm mb-1"
                                            data-id="<?= $user['id_user']; ?>"
                                            data-username="<?= $user['username']; ?>"><i class="fa fa-key"></i></button>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<!-- MODAL SIMPAN -->
<form action="/UserController/save" method="post" onsubmit="return validatePasswords()">
    <div class="modal" tabindex="-1" id="addModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Buat Pengguna</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label for="name" class="form-label ml-3">Nama Pengguna</label>
                    <input type="text" class="form-control rounded-pill" name="name" id="name"
                        value="<?= old('name') ?>" required placeholder="Enter your name">
                    <label for="nohp" class="form-label ml-3">Nohp</label>
                    <input type="text" class="form-control rounded-pill" id="nohp" name="nohp"
                        value="<?= old('nohp') ?>" required placeholder="Enter your phone">
                    <label for="alamat" class="form-label ml-3">Alamat</label>
                    <input type="text" class="form-control rounded-pill" id="alamat" name="alamat"
                        value="<?= old('alamat') ?>" required placeholder="Enter your addres">
                    <label for="username" class="form-label ml-3">Username</label>
                    <input type="text" class="form-control rounded-pill" id="username" value="<?= old('username') ?>"
                        name="username" placeholder="Enter your Username" required>
                    <label for="password" class="form-label ml-3">Password</label>
                    <input type="password" class="form-control rounded-pill  " id="password"
                        value="<?= old('password') ?>" name="password" name="password" placeholder="Enter your password"
                        required>
                    <label for="confirmPassword" class="form-label ml-3">Confirm Password</label>
                    <input type="password" class="form-control rounded-pill  " id="confirmPassword"
                        value="<?= old('confirmPassword') ?>" name="confirmPassword" placeholder="Confirm your password"
                        required>
                    <div id="passwordError" class="ml-3 text-danger mb-3"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- END MODAL SIMPAN -->

<!-- MODAL EDIT -->
<form action="/UserController/update" method="post">
    <div class="modal" tabindex="-1" id="editModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Data Pengguna</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control id" name="id">
                    <label for="">Nama</label>
                    <input type="text" class="form-control nama" name="name">

                    <label for="">Nohp</label>
                    <input type="text" class="form-control nohp" name="nohp">

                    <label for="">Alamat</label>
                    <input type="text" class="form-control alamat" name="alamat">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info">Simpan Perubahan</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- END MODAL EDIT -->

<!-- MODAL HAPUS -->
<form action="/UserController/delete" method="post">
    <div class="modal" tabindex="-1" id="deleteModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus Data Pengguna</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4>Anda Yakin Hapus Data Ini</h4>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" class="id">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info">Hapus</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- END MODAL HAPUS -->

<!-- MODAL GANTI PASSWORD -->
<form action="/UserController/changePassword" method="post" onsubmit="return validateChangePasswords()">
    <div class="modal" tabindex="-1" id="changeModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ganti Password Pengguna</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control rounded-pill username" readonly
                        placeholder="Enter your password" required>
                    <div class="mb-3">
                        <label for="password" class="form-label ms-3">New Password</label>
                        <input type="password" class="form-control rounded-pill " id="newpassword"
                            value="<?= old('password') ?>" name="password" name="password"
                            placeholder="Enter your password" required>
                    </div>
                    <div class="mb-3">
                        <label for="confirmPassword" class="form-label ms-3">Confirm New Password</label>
                        <input type="password" class="form-control rounded-pill " id="newconfirmPassword"
                            value="<?= old('confirmPassword') ?>" name="confirmPassword"
                            placeholder="Confirm your password" required>
                    </div>
                    <div id="newpasswordError" class="text-danger mb-3"></div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" class="id">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info">Ganti</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- END MODAL GANTI PASSWORD -->

<script>
$(document).ready(function() {
    $('#tableUser').DataTable();
});

$('.btn-delete').on('click', function() {
    const id = $(this).data('id');
    $('.id').val(id);
    $('#deleteModal').modal('show');
});
$('.btn-change').on('click', function() {
    const id = $(this).data('id');
    const username = $(this).data('username');
    $('.username').val(username);
    $('.id').val(id);
    $('#changeModal').modal('show');
});

$('.btn-edit').on('click', function() {
    const id = $(this).data('id');
    const nama = $(this).data('nama');
    const nohp = $(this).data('nohp');
    const alamat = $(this).data('address');
    $('.id').val(id);
    $('.nama').val(nama);
    $('.nohp').val(nohp);
    $('.alamat').val(alamat);
    $('#editModal').modal('show');
});

function validatePasswords() {
    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("confirmPassword").value;

    if (password !== confirmPassword) {
        document.getElementById("passwordError").innerText = "Passwords do not match!";
        return false;
    }
    return true;
}

function validateChangePasswords() {
    var password = document.getElementById("newpassword").value;
    var confirmPassword = document.getElementById("newconfirmPassword").value;

    if (password !== confirmPassword) {
        document.getElementById("newpasswordError").innerText = "Passwords do not match!";
        return false;
    }
    return true;
}
</script>
<?= $this->endSection('') ?>