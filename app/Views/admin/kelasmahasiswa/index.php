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

            <div class="card-body">

                <table id="datatablesSimple" class="table-responsive">
                    <thead>
                        <tr>
                            <th width="50px" class="text-center">No</th>
                            <th class="text-center">Nama Kelas</th>
                            <th width="50px" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($kelas as $key => $value) {
                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $value['kelas']  ?></td>
                                <td class="text-center">
                                    <a href="<?= base_url('kelasmahasiswa/detail/' . $value['id_kelas']) ?>" class="btn btn-success btn-flat btn-sm"><i class="fas fa-solid fa-pen-to-square"></i></a>
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