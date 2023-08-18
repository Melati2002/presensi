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
                Form Akun & Pengguna
            </div>
            <div class="card-body">
                <?php
                echo form_open('akunPegawai/insert');
                ?>

                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="username">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="password">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Role</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="role">
                            <option value="">--Pilih Role--</option>
                            <option value="1">Staf Administrasi</option>
                            <option value="2">Dosen</option>
                            <option value="3">Ketua Program Studi</option>
                        </select>
                    </div>

                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Nomor Pegawai</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="no_pegawai">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Nama Pegawai</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nama_pegawai">
                    </div>
                </div>
                <button type="submit" class="btn btn-success btn-flat">Simpan</button>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</main>

<?= $this->endSection('page-content'); ?>