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
                <table class="table table-bordered">
                    <tr>
                        <th width="150px">Program Studi</th>
                        <td width="30px">:</td>
                        <td>D3 Teknik Informatika</td>
                    </tr>
                    <tr>
                        <th>Kelas</th>
                        <td>:</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <th>Tahun Akademik</th>
                        <td>:</td>
                        <td>
                            <?= $ta_aktif['ta'] ?>/<?= $ta_aktif['semester'] ?>
                        </td>
                    </tr>
                </table>
                <h3 class="box-title">Data</label></h3>
                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#add"><i class="fa fa-plus"></i> Tambah Data</button>
            </div>

            <div class="card-body">

                <table id="datatablesSimple" class="table-responsive">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIM</th>
                            <th>Nama Mahasiswa</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($mahasiswa as $key => $value) {
                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $value['nim']  ?></td>
                                <td><?= $value['nama_mahasiswa'] ?></td>
                                <td class="text-center">

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
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Mahasiswa</h4>
            </div>
            <div class="modal-body">

                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="30px">No</th>
                            <th>NIM</th>
                            <th>Nama Mahasiswa</th>
                            <th width="30px"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($mhs_tpk as $key => $value) { ?>
                            <?php if ($kelasmahasiswa['id_kelas'] == $value['id_kelas']) { ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $value['nim'] ?></td>
                                    <td><?= $value['nama_mahasiswa'] ?></td>
                                    <td class="text-center">
                                        <a href="<?= base_url('kelasmahasiswa/add_anggota_kelas/' . $value['id_mahasiswa'] . '/' . $kelasmahasiswa['id_km']) ?>" class="btn btn-success btn-xs"><i class="fa fa-plus"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        <?php  } ?>
                    </tbody>
                </table>

            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<?= $this->endSection('page-content'); ?>