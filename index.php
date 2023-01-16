<?php
session_start();
date_default_timezone_set("Asia/Kuala_Lumpur");
include_once "templates/header.php";
// include_once "utils/utils.php";
include_once "database/koneksi.php";
if (isset($_SESSION['user'])) {
    include_once "templates/navbar.php";
    if ($_SESSION['user']['status'] == 'ADMIN') include_once "templates/sidebar/sidebar_admin.php";
    // else if ($_SESSION['status'] == 'PEGAWAI') include_once "templates/sidebar/sidebar_pegawai.php";
    if (isset($_GET['page'])) {
        switch ($_GET['page']) {
            case "jabatan":
                if (isset($_GET['method'])) {
                    if ($_GET['method'] === 'tambah')
                        include_once "halaman_tambah_data/jabatan.php";
                    elseif ($_GET['method'] === 'edit')
                        include_once "halaman_edit_data/jabatan.php";
                    elseif ($_GET['method'] === 'hapus')
                        include_once "halaman_hapus_data/jabatan.php";
                } else
                    include_once "halaman_tampil_data/jabatan.php";
                break;
            case "pegawai":
                if (isset($_GET['method'])) {
                    if ($_GET['method'] === 'tambah')
                        include_once "halaman_tambah_data/pegawai.php";
                    elseif ($_GET['method'] === 'edit')
                        include_once "halaman_edit_data/pegawai.php";
                    elseif ($_GET['method'] === 'hapus')
                        include_once "halaman_hapus_data/pegawai.php";
                    elseif ($_GET['method'] === 'detail')
                        include_once "halaman_detail/pegawai.php";
                } else
                    include_once "halaman_tampil_data/pegawai.php";
                break;
            default:
                include_once "beranda.php";
        }
    } else {
        if ($_SESSION['status'] == 'PEGAWAI')
            include_once "beranda_pegawai.php";
        else
            include_once "beranda.php";
    }
} else header('Location: halaman_auth/login.php');
include_once "templates/footer.php";
