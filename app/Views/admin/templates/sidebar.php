<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">Main Navigation</div>
            <a class="nav-link" href="index.html">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>
            <a class="nav-link" href="<?= base_url('akunPegawai') ?>">
                <div class="sb-nav-link-icon"></div>
                Akun & Pegawai
            </a>
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#ruang-kelas" aria-expanded="false" aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon"></div>
                Ruangan & Kelas
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="ruang-kelas" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="<?= base_url('ruangan') ?>">Ruangan</a>
                    <a class="nav-link" href="<?= base_url('kelas') ?>">Kelas</a>
                </nav>
            </div>
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#kurikulum" aria-expanded="false" aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon"></div>
                Kurikulum
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="kurikulum" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="<?= base_url('kurikulum') ?>">Kurikulum</a>
                    <a class="nav-link" href="<?= base_url('makul') ?>">Mata Kuliah</a>
                </nav>
            </div>
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#kemahasiswaan" aria-expanded="false" aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon"></div>
                Kemahasiswaan
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="kemahasiswaan" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="<?= base_url('tahunAkademik/btn_add') ?>">Tahun Semester</a>
                    <a class="nav-link" href="<?= base_url('mahasiswa') ?>">Mahasiswa</a>
                    <a class="nav-link" href="<?= base_url('kelasmahasiswa') ?>">Kelas Mahasiswa</a>
                </nav>
            </div>
            <a class="nav-link" href="<?= base_url('pengampumk') ?>">
                <div class="sb-nav-link-icon"></div>
                Pengampu Mata Kuliah
            </a>
            <a class="nav-link" href="<?= base_url('jadwal') ?>">
                <div class="sb-nav-link-icon"></div>
                Jadwal Perkuliahan
            </a>
            <a class="nav-link" href="index.html">
                <div class="sb-nav-link-icon"></div>
                Presensi
            </a>
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#lap-presensi" aria-expanded="false" aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon"></div>
                Laporan Presensi
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="lap-presensi" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="401.html">Rekapitulasi Presensi Mahasiswa</a>
                    <a class="nav-link" href="404.html">Rekapitulasi Presensi Dosen</a>
                </nav>
            </div>
        </div>
</nav>