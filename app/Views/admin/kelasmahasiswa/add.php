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
                <a href="<?= base_url('kelasmahasiswa/add') ?>" class="btn btn-sm btn-secondary"><i class="fa fa-plus"></i> Tambah Data</a>
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

<?= $this->endSection('page-content'); ?>