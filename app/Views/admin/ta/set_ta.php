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
                        <tr>
                            <th>No</th>
                            <th>Tahun Akademik</th>
                            <th>Semester</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($ts as $key => $value) { ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $value['tahun_semester']  ?></td>
                                <td><?= $value['keterangan']  ?></td>
                                <td class="text-center">
                                    <?php if ($value['status'] == 0) {
                                        echo '<p>Non-Aktif</p>';
                                    } else {
                                        echo '<p>Aktif</p>';
                                    } ?>
                                </td>
                                <td class="text-center">
                                    <?php if ($value['status'] == 0) { ?>
                                        <a href="<?= base_url('tahunAkademik/set_status_ta/' . $value['id_ts']) ?>" class="btn btn-success btn-sm"><i class="fa fa-check"></i>Aktifkan</a>
                                    <?php } ?>
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