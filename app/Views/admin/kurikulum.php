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
                            <th>Kurikulum</th>
                            <th width="150px" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($kurikulum as $key => $value) { ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $value['tahun_kurikulum'] ?></td>
                                <td class="text-center">
                                    <button class="btn btn-warning btn-sm btn-flat" data-bs-toggle="modal" data-bs-target="#edit<?= $value['id_kurikulum'] ?>"><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-danger btn-sm btn-flat" data-bs-toggle="modal" data-bs-target="#delete<?= $value['id_kurikulum'] ?>"><i class="fa fa-trash"></i></button>
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
                <h4 class="modal-title">Tambah Data Kurikulum</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <?php
                echo form_open('kurikulum/add');
                ?>

                <div class="form-group">
                    <label>Tahun Kurikulum</label>
                    <input type="text" name="tahun_kurikulum" class="form-control" placeholder="Tahun Kurikulum" required>
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
<?php foreach ($kurikulum as $key => $value) { ?>
    <div class="modal fade" id="edit<?= $value['id_kurikulum'] ?>">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Kurikulum</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <?php
                    echo form_open('kurikulum/edit/' . $value['id_kurikulum']);
                    ?>
                    <div class="form-group">
                        <label>Tahun Kurikulum</label>
                        <input type="text" name="tahun_kurikulum" class="form-control" placeholder="Kurikulum" value="<?= $value['tahun_kurikulum'] ?>" required>
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
<?php foreach ($kurikulum as $key => $value) { ?>
    <div class="modal fade" id="delete<?= $value['id_kurikulum'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Kurikulum</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">

                    Apakah Anda Yakin Ingin Menghapus <b><?= $value['tahun_kurikulum'] ?> ?</b>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left btn-flat" data-bs-dismiss="modal">Close</button>
                    <a href="<?= base_url('kurikulum/delete/' . $value['id_kurikulum']) ?>" class="btn btn-success btn-flat">Delete</a>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>
<?= $this->endSection('page-content'); ?>