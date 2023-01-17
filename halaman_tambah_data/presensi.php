<?php
date_default_timezone_set("Asia/Kuala_Lumpur");
require '../database/koneksi.php';

try {
    $mysqli->begin_transaction();
    $data = json_decode(file_get_contents('php://input'), true);
    $id_pegawai = $mysqli->real_escape_string($data['id_pegawai']);

    if (Date('H') <= 12) {
        $jenis = 'Masuk';
        $check = $mysqli->query("SELECT * FROM presensi_pegawai WHERE id_pegawai=$id_pegawai AND DATE(tanggal_waktu)='" . Date("Y-m-d") . "' AND jenis='$jenis'");
    } else {
        $jenis = 'Pulang';
        $check = $mysqli->query("SELECT * FROM presensi_pegawai WHERE id_pegawai=$id_pegawai AND DATE(tanggal_waktu)='" . Date("Y-m-d") . "' AND jenis='$jenis'");
    }
    if (!$check->num_rows) {
        $q = "
        INSERT INTO presensi_pegawai ( 
            id_pegawai,
            tanggal_waktu,
            status,
            jenis
        ) VALUES (
            '$id_pegawai',
            '" . Date("Y-m-d H:i:s") . "',
            'Hadir',
            '$jenis' 
        )
        ";
        $mysqli->query($q);
    }

    $mysqli->commit();
    echo json_encode(['isSuccess' => true]);
} catch (Exception $e) {
    $mysqli->rollback();
    echo json_encode(array(
        'error' => array(
            'msg' => $e->getMessage(),
            'code' => $e->getCode(),
        ),
    ));
};
