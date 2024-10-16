<?= $this->extend('admin/menu') ?>
<?= $this->section('main') ?>
<link rel="stylesheet" href="<?= base_url("landingasset/")?>../../plugins/summernote/summernote-bs4.min.css">
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
                            data-toggle="modal">Buat Postingan</a>
                        <h3 class="card-title">Data Postingan</h3>
                    </div>
                    <div class="card-body">
                        <table id="tableUser" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Kategory</th>
                                    <th>Judul</th>
                                    <!-- <th>Jumlah Komentar</th> -->
                                    <th>Diposting pada</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($Posts as $post): ?>
                                <tr>
                                    <td><?= $post['id']; ?></td>
                                    <td><?= $post['name'] ?? "Admin"; ?></td>
                                    <td><?= $post['post_category']; ?></td>
                                    <td><?= $post['title']; ?></td>
                                    <!-- <td><?= $post['jmlcomment']; ?></td> -->
                                    <td><?= date('d F Y, H:i:s', strtotime($post['created_at'])); ?>
                                    </td>
                                    <td>
                                        <button class="btn btn-danger btn-delete btn-sm mb-1"
                                            data-id="<?= $post['id']; ?>"><i class="fa fa-trash"></i></button>
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
<form action="/PostController/save" method="post" enctype="multipart/form-data">
    <div class="modal " tabindex="-1" id="addModal">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Buat Postingan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title">Judul Postingan</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Masukkan Judul"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="post_category">Kategori Post</label>
                        <select class="form-control" id="post_category" name="post_category" required>
                            <option value="" disabled selected>Pilih</option>
                            <option value="Info Sekolah">Info Sekolah</option>
                            <option value="Edukasi">Edukasi</option>
                            <option value="Ekstrakurikuler">Ekstrakurikuler</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="article">Artikel Thumnail</label>
                        <textarea required name="articlethumnail" class="form-control" style="max-height:300px">
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="article">Artikel</label>
                        <textarea id="summernote" required name="article">
                            Tulis <em>article</em> <u>anda</u> <strong>disini</strong>
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="imagecover">Gambar Sampul</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="imagecover" name="imagecover" required>
                                <label class="custom-file-label" for="imagecover">Choose file</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="video">Video (opsional)</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="video" name="video">
                                <label class="custom-file-label" for="video">Choose file</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Posting</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- END MODAL SIMPAN -->

<!-- MODAL HAPUS -->
<form action="/PostController/delete" method="post">
    <div class="modal" tabindex="-1" id="deleteModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus Postingan</h5>
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

<script>
$(function() {
    $('#summernote').summernote()

    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
        mode: "htmlmixed",
        theme: "monokai"
    });
})
$(document).ready(function() {
    $('#tableUser').DataTable();
});
$('.btn-delete').on('click', function() {
    const id = $(this).data('id');
    $('.id').val(id);
    $('#deleteModal').modal('show');
});


document.getElementById('imagecover').addEventListener('change', function(event) {
    var fileName = event.target.files[0] ? event.target.files[0].name : 'No file chosen';
    document.querySelector('.custom-file-label').textContent = fileName;
});

document.getElementById('video').addEventListener('change', function(event) {
    var videoFileName = event.target.files[0] ? event.target.files[0].name : 'No file chosen';
    document.querySelector('.custom-file-label[for="video"]').textContent = videoFileName;
});
</script>
<?= $this->endSection('') ?>