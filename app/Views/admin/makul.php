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
                <button type="button" class="btn btn-sm btn-secondary ms-auto me-5 me-md-3 my-2 my-md-0" data-bs-toggle="modal" data-bs-target="#add"><i class="fa fa-plus"></i> Tambah Data</button>
            </div>

            <div class="card-body">
                <table id="datatablesSimple" class="table-responsive">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Mata Kuliah</th>
                            <th>Mata Kuliah</th>
                            <th>SKS</th>
                            <th>Semester</th>
                            <th>Tahun Kurikulum</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($makul as $key => $value) { ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $value['kode_mk'] ?></td>
                                <td><?= $value['mk'] ?></td>
                                <td><?= $value['sks'] ?></td>
                                <td><?= $value['smt'] ?></td>
                                <td><?= $value['tahun_kurikulum'] ?></td>
                                <td class="text-center">
                                    <button class="btn btn-warning btn-sm btn-flat" data-bs-toggle="modal" data-bs-target="#edit<?= $value['id_mk'] ?>"><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-danger btn-sm btn-flat" data-bs-toggle="modal" data-bs-target="#delete<?= $value['id_mk'] ?>"><i class="fa fa-trash"></i></button>
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
                <h4 class="modal-title">Tambah Data Kelas</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <?php
                echo form_open('makul/add');
                ?>

                <div class="control-group after-add-more">
                    <label>Kode Mata Kuliah</label>
                    <input type="text" name="kode_mk" class="form-control">
                    <label>Mata Kuliah</label>
                    <input type="text" name="mk" class="form-control">
                    <label>Semester</label>
                    <select class="form-control" name="smt">
                        <option value="">--Pilih Semester--</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                    </select>
                    <label>SKS</label>
                    <select class="form-control" name="sks">
                        <option value="">--Pilih SKS--</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                    <label>Kurikulum</label>
                    <select name="id_kurikulum" class="form-control">
                        <option value="">--Pilih Kelas--</option>
                        <?php foreach ($kurikulum as $key => $value) { ?>
                            <option value="<?= $value['id_kurikulum'] ?>"><?= $value['tahun_kurikulum'] ?></option>
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
</div>

<!-- modal edit -->
<?php foreach ($makul as $key => $value) { ?>
    <div class="modal fade" id="edit<?= $value['id_mk'] ?>">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Mata Kuliah</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <?php
                    echo form_open('makul/edit/' . $value['id_mk']);
                    ?>
                    <div class="form-group">
                        <label>Kode Mata Kuliah</label>
                        <input name="kode_mk" value="<?= $value['kode_mk'] ?>" class="form-control" placeholder="Kode Mata Kuliah" required>
                    </div>
                    <div class="form-group">
                        <label>Mata Kuliah</label>
                        <input name="mk" value="<?= $value['mk'] ?>" class="form-control" placeholder="Nama" required>
                    </div>
                    <div class="form-group">
                        <label>SKS </label>
                        <select name="sks" class="form-control">
                            <option><?= $value['sks'] ?></option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Semester</label>
                        <select name="smt" class="form-control">
                            <option><?= $value['smt'] ?></option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                        </select>

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
<?php foreach ($makul as $key => $value) { ?>
    <div class="modal fade" id="delete<?= $value['id_mk'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Mata Kuliah</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">

                    Apakah Anda Yakin Ingin Menghapus <b><?= $value['mk'] ?> .?</b>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left btn-flat" data-bs-dismiss="modal">Close</button>
                    <a href="<?= base_url('makul/delete/' . $value['id_mk']) ?>" class="btn btn-success btn-flat">Delete</a>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>
<?= $this->endSection('page-content'); ?>