<?= $this->extend('admin/templates/headerfooter') ?>

<?= $this->section('page-content'); ?>

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4"><?= $subtitle ?></h1>
        <ol class="breadcrumb mb-6">
            <li class="breadcrumb-item"><?= $title ?></li>
            <li class="breadcrumb-item active"><?= $subtitle ?></li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#add"><i class="fa fa-plus"></i> Tambah Data</button>
                <button class="btn btn-primary btn-sm " data-bs-toggle="modal" data-bs-target="#import"><i class="fas fa-solid fa-file-import"></i> Import File</button>
            </div>

            <div class="card-body">
                <table id="datatablesSimple" class="table-responsive">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Gender</th>
                            <th>Tahun Masuk</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($mahasiswa as $key => $value) { ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $value['nim'] ?></td>
                                <td><?= $value['nama_mahasiswa'] ?></td>
                                <td><?= $value['gender'] ?></td>
                                <td><?= $value['tahun_masuk'] ?></td>
                                <td class="text-center">
                                    <button class="btn btn-warning btn-sm btn-flat" data-bs-toggle="modal" data-bs-target="#edit<?= $value['id_mahasiswa'] ?>"><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-danger btn-sm btn-flat" data-bs-toggle="modal" data-bs-target="#delete<?= $value['id_mahasiswa'] ?>"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                        <?php  } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<!-- modal import -->
<div class="modal fade" id="import">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Import Data Mahasiswa</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <?php echo form_open_multipart('mahasiswa/import') ?>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="formFileSm" class="form-label">File Excel</label>
                    <div class="custom-file"></div>
                    <input class="form-control form-control-sm" name="file_excel" type="file" required accept=".xls, .xlsx">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left btn-flat" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="" class="btn btn-success btn-flat">Simpan</button>
            </div>
            <?php echo form_close() ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<!-- modal Add -->
<div class="modal fade" id="add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Kelas</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <?php echo form_open('mahasiswa/insert'); ?>
                <div class="form-group">
                    <label>NIM</label>
                    <input name="nim" class="form-control" placeholder="NIM" required>
                </div>
                <div class="form-group">
                    <label>Nama</label>
                    <input name="nama_mahasiswa" class="form-control" placeholder="Nama" required>
                </div>
                <div class="form-group">
                    <label>Gender</label>
                    <select name="gender" class="form-control">
                        <option>--Pilih Gender--</option>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Tahun Masuk</label>
                    <input name="tahun_masuk" class="form-control" placeholder="Tahun Masuk" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left btn-flat" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="add" class="btn btn-success btn-flat">Simpan</button>
            </div>
            <?php echo form_close() ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<!-- modal edit -->
<?php foreach ($mahasiswa as $key => $value) { ?>
    <div class="modal fade" id="edit<?= $value['id_mahasiswa'] ?>">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Mahasiswa</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <?php
                    echo form_open('mahasiswa/edit/' . $value['id_mahasiswa']);
                    ?>
                    <div class="form-group">
                        <label>NIM</label>
                        <input name="nim" value="<?= $value['nim'] ?>" class="form-control" placeholder="NIM" required>
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input name="nama_mahasiswa" value="<?= $value['nama_mahasiswa'] ?>" class="form-control" placeholder="Nama" required>
                    </div>
                    <div class="form-group">
                        <label>Gender</label>
                        <select name="gender" class="form-control">
                            <option><?= $value['gender'] ?></option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>

                    </div>
                    <div class="form-group">
                        <label>Tahun Masuk</label>
                        <input name="tahun_masuk" value="<?= $value['tahun_masuk'] ?>" class="form-control" placeholder="Tahun Masuk" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left btn-flat" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="edit" class="btn btn-success btn-flat">Simpan</button>
                </div>
                <?php echo form_close() ?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>


<!-- modal delete -->
<?php foreach ($mahasiswa as $key => $value) { ?>
    <div class="modal fade" id="delete<?= $value['id_mahasiswa'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Mahasiswa</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">

                    Apakah Anda Yakin Ingin Menghapus <b><?= $value['nama_mahasiswa'] ?> .?</b>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left btn-flat" data-bs-dismiss="modal">Close</button>
                    <a href="<?= base_url('mahasiswa/delete/' . $value['id_mahasiswa']) ?>" class="btn btn-success btn-flat">Delete</a>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>
<?= $this->endSection('page-content'); ?>