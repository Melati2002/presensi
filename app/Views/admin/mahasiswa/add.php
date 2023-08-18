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
                Form Mahasiswa
            </div>
            <div class="card-body">
                <!-- membuat form  -->
                <!-- gunakan tanda [] untuk menampung array  -->
                <form action="<?= base_url('mahasiswa/save') ?>" method="POST">
                    <div class="control-group after-add-more">
                        <label>NIM</label>
                        <input type="text" name="nim[]" class="form-control">
                        <label>Nama Mahasiswa</label>
                        <input type="text" name="nama_mahasiswa[]" class="form-control">
                        <label>Gender</label>
                        <select class="form-control" name="gender[]">
                            <option value="">--Pilih Gender--</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                        <label>Tahun Masuk</label>
                        <input type="text" name="tahun_masuk[]" class="form-control">
                        <br>
                        <button class="btn btn-primary btn-sm add-more" type="button">
                            <i class="fa fa-plus"></i>Tambah Form
                        </button>
                        <hr>
                    </div>
                    <button class="btn btn-success" type="submit">Submit</button>
                </form>

                <!-- class hide membuat form disembunyikan  -->
                <!-- hide adalah fungsi bootstrap 3, klo bootstrap 4 pake invisible  -->
                <form action="<?= base_url('mahasiswa/insert') ?>" method="POST">
                    <div class="copy invisible">
                        <div class="control-group">
                            <label>NIM</label>
                            <input type="text" name="nim[]" class="form-control">
                            <label>Nama Mahasiswa</label>
                            <input type="text" name="nama_mahasiswa[]" class="form-control">
                            <label>Gender</label>
                            <select class="form-control" name="gender[]">
                                <option value="">--Pilih Gender--</option>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                            <label>Tahun Masuk</label>
                            <input type="text" name="tahun_masuk[]" class="form-control">
                            <br>
                            <button class="btn btn-danger btn-sm remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                            <hr>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
<!-- fungsi javascript untuk menampilkan form dinamis  -->
<!-- penjelasan :
saat tombol add-more ditekan, maka akan memunculkan div dengan class copy -->
<script type="text/javascript">
    $(document).ready(function() {
        $(".add-more").click(function() {
            var html = $(".copy").html();
            $(".after-add-more").after(html);
        });

        // saat tombol remove dklik control group akan dihapus 
        $("body").on("click", ".remove", function() {
            $(this).parents(".control-group").remove();
        });
    });
</script>
</main>
<?= $this->endSection('page-content'); ?>