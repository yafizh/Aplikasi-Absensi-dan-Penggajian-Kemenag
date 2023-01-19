<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-12">
                <h1>Dashboard</h1>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Riwayat Presensi</h3>
        </div>
        <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="text-center td-fit">No</th>
                        <th class="text-center">Tanggal</th>
                        <th class="text-center">Waktu</th>
                        <th class="text-center">Jenis Presensi</th>
                        <th class="text-center">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $q = "
                        SELECT 
                            pp.id,
                            DATE(pp.tanggal_waktu) tanggal,
                            DATE_FORMAT(pp.tanggal_waktu, '%H:%i') waktu,
                            p.nip,
                            p.nama,
                            pp.status,
                            pp.jenis  
                        FROM 
                            presensi_pegawai pp
                        INNER JOIN 
                            pegawai p 
                        ON 
                            p.id=pp.id_pegawai 
                        WHERE 
                            pp.id_pegawai=" . $_SESSION['user']['id_pegawai'] . "
                        ORDER BY 
                            pp.id DESC";
                    $no = 1;
                    if ($result = $mysqli->query($q)) {
                    } else echo "Error: " . $q . "<br>" . $mysqli->error;
                    ?>
                    <?php while ($row = $result->fetch_assoc()) : ?>
                        <tr>
                            <td class="text-center td-fit" style="vertical-align: middle;"><?= $no++; ?></td>
                            <td class="text-center td-fit" style="vertical-align: middle;"><?= indonesiaDate($row['tanggal']) ?></td>
                            <td class="text-center td-fit" style="vertical-align: middle;"><?= $row['status'] == 'Hadir' ? $row['waktu'] : '-'; ?></td>
                            <td class="text-center" style="vertical-align: middle;"><?= $row['status'] == 'Hadir' ? $row['jenis'] : '-'; ?></td>
                            <td class="text-center" style="vertical-align: middle;"><?= $row['status']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php
    $q = "
        SELECT 
            * 
        FROM 
            pegawai 
        WHERE 
            id=" . $_SESSION['user']['id_pegawai'];
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
        YEAR(tanggal_waktu)='" . Date("Y") . "' 
        AND 
        id_pegawai=" . $_SESSION['user']['id_pegawai'] . "
    ORDER BY 
        id_pegawai";
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
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Tabel Presensi Bulan <?= MONTH_IN_INDONESIA[Date('m')-1]; ?> <?= Date("Y"); ?></h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
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