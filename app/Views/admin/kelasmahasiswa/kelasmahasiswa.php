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
                <button type="button" class="btn btn-sm btn-secondary ms-auto me-5 me-md-3 my-2 my-md-0" data-bs-toggle="modal" data-bs-target="#add"><i class="fa fa-plus"></i>Tambah Data</button>

                <button class="btn btn-primary btn-sm " data-bs-toggle="modal" data-bs-target="#import"><i class="fas fa-solid fa-file-import"></i> Import File</button>
            </div>

            <div class="card-body">

                <table id="datatablesSimple" class="table-responsive">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIM</th>
                            <th>Nama Mahasiswa</th>
                            <th>Kelas</th>
                            <th>Tahun Akademik</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($kelasmahasiswa as $key => $value) {
                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $value['nim']  ?></td>
                                <td><?= $value['nama_mahasiswa']  ?></td>
                                <td><?= $value['kelas']  ?></td>
                                <td><?= $value['tahun_semester']  ?></td>
                                <td>
                                    <a href="<?= base_url('kelasmahasiswa/rincian_kelas/') ?>" class="btn btn-success btn-flat btn-sm"><i class="fas fa-solid fa-pen-to-square"></i></a>
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
            <?php echo form_open_multipart('kelasmahasiswa/import') ?>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="formFileSm" class="form-label">File Excel</label>
                    <div class="custom-file"></div>
                    <input class="form-control form-control-sm" name="file_excel" type="file" required accept=".xls, .xlsx">
                </div>
                <div class="mb-3">
                    <label>Kelas</label>
                    <select name="id_kelas" class="form-control">
                        <option value="">--Pilih Kelas--</option>
                        <?php foreach ($kelas as $key => $value) { ?>
                            <option value="<?= $value['id_kelas'] ?>"><?= $value['kelas'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tahun Akademik</label>
                    <select class="form-control form-control-sm" name="id_ts">
                        <option value="">--Pilih Tahun Akademik--</option>
                        <?php foreach ($ts as $key => $value) { ?>
                            <option value="<?= $value['id_ts'] ?>"><?= $value['tahun_semester'] ?></option>
                        <?php } ?>
                    </select>
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
                <h4 class="modal-title">Tambah Data Kelas Mahasiswa</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <?php
                echo form_open('kelasmahasiswa/insert');
                ?>
                <label>Nama Mahasiswa</label>
                <select name="id_mahasiswa" class="form-control">
                    <option value="">--Pilih Mahasiswa--</option>
                    <?php foreach ($mahasiswa as $key => $value) { ?>
                        <option value="<?= $value['id_mahasiswa'] ?>">NIM. <?= $value['nim'] ?> | <?= $value['nama_mahasiswa'] ?></option>
                    <?php } ?>
                </select>
                <label>Kelas</label>
                <select name="id_kelas" class="form-control">
                    <option value="">--Pilih Kelas--</option>
                    <?php foreach ($kelas as $key => $value) { ?>
                        <option value="<?= $value['id_kelas'] ?>"><?= $value['kelas'] ?></option>
                    <?php } ?>
                </select>
                <label>Tahun Akademik</label>
                <select class="form-control" name="id_ts">
                    <option value="">--Pilih Tahun Semester--</option>
                    <?php foreach ($ts as $key => $value) { ?>
                        <option value="<?= $value['id_ts'] ?>"><?= $value['tahun_semester'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left btn-flat" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success btn-flat">Simpan</button>
            </div>
            <?php echo form_close() ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<!-- modal delete -->
<?php foreach ($kelasmahasiswa as $key => $value) { ?>
    <div class="modal fade" id="delete<?= $value['id_km'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Kelas Mahasiswa</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">

                    Apakah Anda Yakin Ingin Menghapus Data?</b>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left btn-flat" data-bs-dismiss="modal">Close</button>
                    <a href="<?= base_url('kelasmahasiswa/delete/' . $value['id_km']) ?>" class="btn btn-success btn-flat">Delete</a>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>




<?= $this->endSection('page-content'); ?>