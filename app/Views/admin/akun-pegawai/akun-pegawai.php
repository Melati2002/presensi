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
                <a href="<?= base_url('akunPegawai/add') ?>" class="btn btn-sm btn-secondary"><i class="fa fa-plus"></i> Tambah Data</a>
            </div>

            <div class="card-body">
                <table id="datatablesSimple" class="table-responsive">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor Pegawai</th>
                            <th>Nama Pegawai</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($pegawai as $key => $value) { ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $value['no_pegawai'] ?></td>
                                <td><?= $value['nama_pegawai'] ?></td>
                                <td><?= $value['username'] ?></td>
                                <td><?= $value['password'] ?></td>
                                <td class="text-center">
                                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#edit<?= $value['id_pegawai'] ?>"><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete<?= $value['id_pegawai'] ?>"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                        <?php  } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<!-- modal delete -->
<?php foreach ($pegawai as $key => $value) { ?>
    <div class="modal fade" id="delete<?= $value['id_pegawai'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Pegawai</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">

                    Apakah Anda Yakin Ingin Menghapus <b><?= $value['nama_pegawai'] ?> .?</b>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left btn-flat" data-bs-dismiss="modal">Close</button>
                    <a href="<?= base_url('pegawai/delete/' . $value['id_pegawai']) ?>" class="btn btn-success btn-flat">Delete</a>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>
<?= $this->endSection('page-content'); ?>