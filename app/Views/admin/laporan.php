<?= $this->extend('admin/menu') ?>
<?= $this->section('main') ?>
<div class="content-wrapper">
    <div class="content-header">
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Laporan</h3>
                    </div>
                    <div class="card-body">
                        <table id="tableUser" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Jenis Laporan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Laporan User</td>
                                    <td>
                                        <button class="btn btn-info btn-edit btn-sm mb-1" data-toggle="modal"
                                            data-target="#editModal">
                                            <i class="fa fa-file-contract"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Postingan Per Tanggal</td>
                                    <td>
                                        <button class="btn btn-info btn-edit btn-sm mb-1" data-toggle="modal"
                                            data-target="#dateRangeModal">
                                            <i class=" fa fa-file-contract"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Postingan Per Kategori</td>
                                    <td>
                                        <button class="btn btn-info btn-edit btn-sm mb-1" data-toggle="modal"
                                            data-target="#categoryModal">
                                            <i class="fa fa-file-contract"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Komentar Per Postingan</td>
                                    <td>
                                        <button class="btn btn-info btn-edit btn-sm mb-1" data-toggle="modal"
                                            data-target="#idPostinganModal">
                                            <i class="fa fa-file-contract"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="Laporan/CetakUser" method="post" target="_blank">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Laporan User</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="roleSelect">Pilih Level</label>
                        <select class="form-control" id="roleSelect" name="level">
                            <option disabled selected>Pilih</option>
                            <option value="Pengguna">Pengguna</option>
                            <option value="Guru">Guru</option>
                            <option value="Admin">Admin</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-print"></i>&nbsp;Print</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="modal fade" id="dateRangeModal" tabindex="-1" aria-labelledby="dateRangeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="Laporan/CetakPostinganTanggal" method="post" target="_blank">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="dateRangeModalLabel">Laporan Tanggal</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="startDate">Tanggal Awal</label>
                        <input type="date" class="form-control" id="startDate" name="start_date" required>
                    </div>
                    <div class="form-group">
                        <label for="endDate">Tanggal Akhir</label>
                        <input type="date" class="form-control" id="endDate" name="end_date" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-print"></i>&nbsp;Print</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="categoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="Laporan/CetakPostinganKategori" method="post" target="_blank">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="categoryModalLabel">Laporan Kategori</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="categorySelect">Pilih Kategori</label>
                        <select class="form-control" id="categorySelect" name="kategori" required>
                            <option disabled selected>Pilih</option>
                            <option value="Edukasi">Edukasi</option>
                            <option value="Info Sekolah">Info Sekolah</option>
                            <option value="Ekstrakurikuler">Ekstrakurikuler</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-print"></i>&nbsp;Print</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="idPostinganModal" tabindex="-1" aria-labelledby="idPostinganModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="Laporan/CetakKomentar" method="post" target="_blank">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="idPostinganModalLabel">Laporan Id Postingan</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="idPostingan">Id Postingan</label>
                        <input type="text" class="form-control" id="idPostingan" name="id_postingan" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-print"></i>&nbsp;Print</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection('') ?>