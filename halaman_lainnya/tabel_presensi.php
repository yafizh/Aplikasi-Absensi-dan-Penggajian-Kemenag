<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1>Tabel Presensi Pegawai Bulan <?= MONTH_IN_INDONESIA[Date('m') - 1]; ?> <?= Date("Y"); ?></h1>
            </div>
        </div>
    </div>
</section>


<?php
$q = "
    SELECT 
        * 
    FROM 
        pegawai 
    ORDER BY 
        nama";
$result = $mysqli->query($q);
$pegawai = [];
while ($row = $result->fetch_assoc()) {
    $pegawai[] = array_merge($row, ['presensi' => []]);
}

$q = "
    SELECT 
        id_pegawai, 
        DAY(tanggal_waktu) tanggal,
        status 
    FROM 
        presensi_pegawai 
    WHERE 
        MONTH(tanggal_waktu)='" . Date('m') . "' 
        AND 
        YEAR(tanggal_waktu)='" . Date("Y") . "' ORDER BY id_pegawai";
$presensi_pegawai = $mysqli->query($q)->fetch_all(MYSQLI_ASSOC);
foreach ($pegawai as $index => $value_pegawai) {

    for ($i = 1; $i <= Date('t'); $i++) {
        if ((Date('Y-m-') . ($i < 10 ? ('0' . $i) : $i)) <= Date('Y-m-d')) {
            $ada = false;
            foreach ($presensi_pegawai as $value_presensi_pegawai) {
                if ($value_pegawai['id'] == $value_presensi_pegawai['id_pegawai'] && $value_presensi_pegawai['tanggal'] == $i) {
                    if ($value_presensi_pegawai['status'] == 'Hadir') {
                        $pegawai[$index]['presensi'][] = 'H';
                    } elseif ($value_presensi_pegawai['status'] == 'Izin') {
                        $pegawai[$index]['presensi'][] = 'I';
                    } elseif ($value_presensi_pegawai['status'] == 'Sakit') {
                        $pegawai[$index]['presensi'][] = 'S';
                    }
                    $ada = !$ada;
                    break;
                }
            }
            if (!$ada) {
                $pegawai[$index]['presensi'][] = '-';
            }
        } else {
            $pegawai[$index]['presensi'][] = '';
        }
    }
}
?>

<section class="content">
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="text-center align-middle" rowspan="2">NIP</th>
                        <th class="text-center align-middle" rowspan="2">Nama</th>
                        <th class="text-center align-middle" colspan="<?= Date('t'); ?>">Kehadiran</th>
                    </tr>
                    <tr>
                        <?php for ($i = 1; $i <= Date('t'); $i++) : ?>
                            <th class="text-center"><?= $i; ?></th>
                        <?php endfor; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pegawai as $value) : ?>
                        <tr>
                            <td class="text-center td-fit" style="vertical-align: middle;"><?= $value['nip'] ?></td>
                            <td style="vertical-align: middle;"><?= $value['nama'] ?></td>
                            <?php foreach ($value['presensi'] as $presensi) : ?>
                                <td class="text-center"><?= $presensi; ?></td>
                            <?php endforeach; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="mt-5">
                <table>
                    <tr>
                        <td colspan="2">Keterangan</td>
                    </tr>
                    <tr>
                        <td>H</td>
                        <td>: Hadir</td>
                    </tr>
                    <tr>
                        <td>S</td>
                        <td>: Sakit</td>
                    </tr>
                    <tr>
                        <td>I</td>
                        <td>: Izin</td>
                    </tr>
                    <tr>
                        <td>-</td>
                        <td>: Tidak Hadir/Alpa</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</section>