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
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th width="10px" class="text-center">No</th>
                            <th>Kelas</th>
                            <th width="150px" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($kelas as $key => $value) { ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $value['kelas'] ?></td>
                                <td class="text-center">
                                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#edit<?= $value['id_kelas'] ?>"><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete<?= $value['id_kelas'] ?>"><i class="fa fa-trash"></i></button>
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
                echo form_open('kelas/add');
                ?>

                <div class="form-group">
                    <select name="kelas" class="form-control">
                        <option>--Pilih Kelas--</option>
                        <option value="1A">1A</option>
                        <option value="1B">1B</option>
                        <option value="1C">1C</option>
                        <option value="1D">1D</option>
                        <option value="2A">2A</option>
                        <option value="2B">2B</option>
                        <option value="2C">2C</option>
                        <option value="2D">2D</option>
                        <option value="3A">3A</option>
                        <option value="3B">3B</option>
                        <option value="3C">3C</option>
                        <option value="3D">3D</option>
                        <option value="4A">4A</option>
                        <option value="4B">4B</option>
                        <option value="4C">4C</option>
                        <option value="4D">4D</option>
                        <option value="5A">5A</option>
                        <option value="5B">5B</option>
                        <option value="5C">5C</option>
                        <option value="5D">5D</option>
                        <option value="6A">6A</option>
                        <option value="6B">6B</option>
                        <option value="6C">6C</option>
                        <option value="6D">6D</option>
                    </select>
                </div>


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


<!-- modal edit -->
<?php foreach ($kelas as $key => $value) { ?>
    <div class="modal fade" id="edit<?= $value['id_kelas'] ?>">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Kelas</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <?php
                    echo form_open('kelas/edit/' . $value['id_kelas']);
                    ?>

                    <div class="form-group">
                        <select name="kelas" class="form-control">
                            <option><?= $value['kelas'] ?></option>
                            <option value="1A">1A</option>
                            <option value="1B">1B</option>
                            <option value="1C">1C</option>
                            <option value="1D">1D</option>
                            <option value="2A">2A</option>
                            <option value="2B">2B</option>
                            <option value="2C">2C</option>
                            <option value="2D">2D</option>
                            <option value="3A">3A</option>
                            <option value="3B">3B</option>
                            <option value="3C">3C</option>
                            <option value="3D">3D</option>
                            <option value="4A">4A</option>
                            <option value="4B">4B</option>
                            <option value="4C">4C</option>
                            <option value="4D">4D</option>
                            <option value="5A">5A</option>
                            <option value="5B">5B</option>
                            <option value="5C">5C</option>
                            <option value="5D">5D</option>
                            <option value="6A">6A</option>
                            <option value="6B">6B</option>
                            <option value="6C">6C</option>
                            <option value="6D">6D</option>
                        </select>
                    </div>


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
<?php } ?>


<!-- modal delete -->
<?php foreach ($kelas as $key => $value) { ?>
    <div class="modal fade" id="delete<?= $value['id_kelas'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Kelas</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">

                    Apakah Anda Yakin Ingin Menghapus <b><?= $value['kelas'] ?> .?</b>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left btn-flat" data-bs-dismiss="modal">Close</button>
                    <a href="<?= base_url('kelas/delete/' . $value['id_kelas']) ?>" class="btn btn-success btn-flat">Delete</a>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>
<?= $this->endSection('page-content'); ?>