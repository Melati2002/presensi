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
                            <th>Smt</th>
                            <th>Kode Matkul</th>
                            <th>Mata Kuliah</th>
                            <th>SKS</th>
                            <th>Kelas</th>
                            <th>Dosen</th>
                            <th>Hari</th>
                            <th>Waktu</th>
                            <th>Ruangan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($jadwal as $key => $value) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $value['smt'] ?></td>
                                <td><?= $value['kode_mk'] ?></td>
                                <td><?= $value['matkul'] ?></td>
                                <td><?= $value['sks'] ?></td>
                                <td><?= $value['kelas'] ?></td>
                                <td><?= $value['nama_dosen'] ?></td>
                                <td><?= $value['hari'] ?></td>
                                <td><?= $value['waktu'] ?></td>
                                <td><?= $value['ruangan'] ?></td>

                                <td>
                                    <button class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#delete<?= $value['id_jadwal'] ?>"><i class="fa fa-trash"></i></button>
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
                <h4 class="modal-title">Tambah Jadwal Perkuliahan</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <?php
                echo form_open('jadwal/add/' . $id_kelas);
                ?>

                <div class="form-group">
                    <label>Mata Kuliah</label>
                    <select name="id_pengampu" class="form-control">
                        <option value="">--Pilih Mata Kuliah--</option>
                        <?php foreach ($pengampu as $key => $value) { ?>
                            <option value="<?= $value['id_pengampumk'] ?>">Smt.<?= $value['smt'] ?> | <?= $value['mk'] ?> | <?= $value['nama_pegawai'] ?></option>
                        <?php } ?>

                    </select>
                </div>

                <div class="form-group">
                    <label>Kelas</label>
                    <select name="id_kelas" class="form-control">
                        <option value="">--Pilih Kelas--</option>
                        <?php foreach ($kelas as $key => $value) { ?>
                            <option value="<?= $value['id_kelas'] ?>"><?= $value['kelas'] ?></option>
                        <?php  } ?>
                    </select>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Hari</label>
                            <select name="hari" class="form-control">
                                <option value="">--Pilih Hari--</option>
                                <option value="Senin">Senin</option>
                                <option value="Selasa">Selasa</option>
                                <option value="Rabu">Rabu</option>
                                <option value="Kamis">Kamis</option>
                                <option value="Jumat">Jumat</option>
                                <option value="Sabtu">Sabtu</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Waktu</label>
                            <select name="slotwaktu" class="form-control">
                                <option value="">--Pilih Waktu--</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>

                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Ruangan</label>
                            <select name="id_ruangan" class="form-control">
                                <option value="">--Pilih Ruang--</option>
                                <?php foreach ($ruangan as $key => $value) { ?>
                                    <option value="<?= $value['id_ruangan'] ?>"><?= $value['ruangan'] ?></option>
                                <?php } ?>

                            </select>
                        </div>
                    </div>

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
<?= $this->endSection('page-content'); ?>