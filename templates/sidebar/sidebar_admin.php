<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="#" class="d-block"><?= $_SESSION['user']['username']; ?></a>
                <a href="#" class="d-block"><?= $_SESSION['user']['status']; ?></a>
            </div>
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
                    <a href="?page=pegawai" class="nav-link <?= isset($_GET['page']) ? (($_GET['page'] === "pegawai") ? "active" : "")  : "" ?>">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Tunjangan
                        </p>
                    </a>
                </li>
                <li class="nav-header">DATA PEGAWAI</li>
                <li class="nav-item">
                    <a href="?page=pegawai" class="nav-link <?= isset($_GET['page']) ? (($_GET['page'] === "pegawai") ? "active" : "")  : "" ?>">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Pegawai
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
<div class="content-wrapper">