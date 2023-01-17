<style>
    .nav-link {
        color: white !important;
    }

    .nav-link:hover {
        background-color: #fff !important;
        color: #00640E !important;
    }

    .nav-link.active {
        background-color: #fff !important;
        color: #00640E !important;
    }
</style>
<aside class="main-sidebar elevation-4 text-white" style="background-color: #00640E;">
    <div class="sidebar">
        <div class="p-3 d-flex flex-column align-items-center">
            <img src="assets/img/logo.png" width="120" class="mb-3">
            <h5 class="text-center">APLIKASI ABSENSI DAN PENGGAJIAN PEGAWAI KEMENTERIAN AGAMA KABUPATEN TAPIN</h5>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="?page=dashboard" class="nav-link <?= isset($_GET['page']) ? (($_GET['page'] === "dashboard") ? "active" : "")  : "active" ?>">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-header">MASTER DATA</li>
                <li class="nav-item">
                    <a href="?page=jabatan" class="nav-link <?= isset($_GET['page']) ? (($_GET['page'] === "jabatan") ? "active" : "")  : "" ?>">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Jabatan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="?page=tunjangan" class="nav-link <?= isset($_GET['page']) ? (($_GET['page'] === "tunjangan") ? "active" : "")  : "" ?>">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Tunjangan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="?page=pegawai" class="nav-link <?= isset($_GET['page']) ? (($_GET['page'] === "pegawai") ? "active" : "")  : "" ?>">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Pegawai
                        </p>
                    </a>
                </li>
                <li class="nav-header">PRESENSI PEGAWAI</li>
                <li class="nav-item">
                    <a href="?page=scanner" class="nav-link <?= isset($_GET['page']) ? (($_GET['page'] === "scanner") ? "active" : "")  : "" ?>">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Scanner
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="?page=riwayat_presensi" class="nav-link <?= isset($_GET['page']) ? (($_GET['page'] === "riwayat_presensi") ? "active" : "")  : "" ?>">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Riwayat Presensi
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="?page=tabel_presensi" class="nav-link <?= isset($_GET['page']) ? (($_GET['page'] === "tabel_presensi") ? "active" : "")  : "" ?>">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Tabel Presensi
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
<div class="content-wrapper">