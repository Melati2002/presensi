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
                <a href="<?= base_url('pengampumk/add') ?>" class="btn btn-secondary btn-sm"><i class="fa fa-plus"></i> Tambah Data</a>
                <button type="button" class="btn btn-sm btn-secondary ms-auto me-5 me-md-3 my-2 my-md-0" data-bs-toggle="modal" data-bs-target="#add"><i class="fa fa-plus"></i>Tambah Data</button>
            </div>

            <div class="card-body">
                <table id="datatablesSimple" class="table-responsive">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Dosen</th>
                            <th>Kode Mata Kuliah</th>
                            <th>Mata Kuliah</th>
                            <th>SKS</th>
                            <th>Smt</th>
                            <th>Kelas</th>
                            <th>Thn Akademik</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($pengampu as $key => $value) { ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $value['nama_pegawai'] ?></td>
                                <td><?= $value['kode_mk'] ?></td>
                                <td><?= $value['mk'] ?></td>
                                <td><?= $value['sks'] ?></td>
                                <td><?= $value['smt'] ?></td>
                                <td><?= $value['kelas'] ?></td>
                                <td><?= $value['tahun_semester'] ?></td>
                                <td class="text-center">
                                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#edit<?= $value['id_pengampumk'] ?>"><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete<?= $value['id_pengampumk'] ?>"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                        <?php  } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
<!-- modal Add -->
<div class="modal fade" id="add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Pengampu Mata Kuliah</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <?php
                echo form_open('pengampumk/insert');
                ?>
                <label>Mata Kuliah</label>
                <select name="id_mk" class="form-control">
                    <option value="">--Pilih Mata Kuliah--</option>
                    <?php foreach ($makul as $key => $value) { ?>
                        <option value="<?= $value['id_mk'] ?>"><?= $value['kode_mk'] ?> | <?= $value['mk'] ?> | <?= $value['sks'] ?></option>
                    <?php } ?>
                </select>
                <label>Kelas</label>
                <select name="id_kelas" class="form-control">
                    <option value="">--Pilih Kelas--</option>
                    <?php foreach ($kelas as $key => $value) { ?>
                        <option value="<?= $value['id_kelas'] ?>"><?= $value['kelas'] ?></option>
                    <?php } ?>
                </select>
                <label>Nama Dosen</label>
                <select name="id_pegawai" class="form-control">
                    <option value="">--Pilih Dosen--</option>
                    <?php foreach ($pegawai as $key => $value) { ?>
                        <option value="<?= $value['id_pegawai'] ?>"><?= $value['nama_pegawai'] ?> | No. <?= $value['no_pegawai'] ?></option>
                    <?php } ?>
                </select>
                <label>Tahun Akademik</label>
                <select class="form-control" name="id_ts[]">
                    <option value="">--Pilih Tahun Akademik--</option>
                    <?php foreach ($ts as $key => $value) { ?>
                        <option value="<?= $value['id_ts'] ?>"><?= $value['tahun_semester'] ?></option>
                    <?php } ?>
                </select>
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


<!-- modal delete -->
<?php foreach ($pengampu as $key => $value) { ?>
    <div class="modal fade" id="delete<?= $value['id_pengampumk'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Pengampu Mata Kuliah</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">

                    Apakah Anda Yakin Ingin Menghapus Data?</b>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left btn-flat" data-bs-dismiss="modal">Close</button>
                    <a href="<?= base_url('pengampumk/delete/' . $value['id_pengampumk']) ?>" class="btn btn-success btn-flat">Delete</a>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>
<?= $this->endSection('page-content'); ?>