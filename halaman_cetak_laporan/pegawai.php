<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laporan Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <?php include_once('header.php'); ?>
    <h4 class="text-center my-3">Laporan Pegawai</h4>
    <section class="p-3">
        <strong>
            <span style="width: 150px; display: inline-block;">Filter</span>
        </strong>
        <?php if (isset($_POST['dari_tmt'])) : ?>
            <br>
            <span style="width: 150px; display: inline-block;">Dari TMT</span>
            <span>: <?= indonesiaDate($_GET['dari_tanggal']); ?></span>
        <?php endif; ?>
        <?php if (isset($_POST['dari_tmt'])) : ?>
            <br>
            <span style="width: 150px; display: inline-block;">Sampai TMT</span>
            <span>: <?= indonesiaDate($_GET['sampai_tanggal']); ?></span>
        <?php endif; ?>
    </section>
    <main class="p-3">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th class="text-center align-middle no-td">No</th>
                    <th class="text-center align-middle">NIP</th>
                    <th class="text-center align-middle">Nama</th>
                    <th class="text-center align-middle">Jabatan</th>
                    <th class="text-center align-middle">TMT</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $q = "
                    SELECT 
                        p.*,
                        j.nama jabatan 
                    FROM 
                        pegawai p
                    INNER JOIN 
                        jabatan j 
                    ON 
                        j.id=p.id_jabatan
                    ";

                if (isset($_POST['dari_tmt']) && isset($_POST['sampai_tmt']))
                    $q .= " WHERE tmt >= '" . $_POST['dari_tmt'] . "' AND tmt <= '" . $_POST['sampai_tmt'] . "'";

                $q .= " ORDER BY p.nama";
                $no = 1;
                if ($result = $mysqli->query($q)) {
                } else echo "Error: " . $q . "<br>" . $mysqli->error;
                ?>
                <?php if ($result->num_rows) : ?>
                    <?php while ($row = $result->fetch_assoc()) : ?>
                        <tr>
                            <td class="text-center align-middle"><?= $no++; ?></td>
                            <td class="text-center align-middle"><?= $row['nip']; ?></td>
                            <td class="align-middle"><?= $row['nama']; ?></td>
                            <td class="text-center align-middle"><?= $row['jabatan']; ?></td>
                            <td class="text-center align-middle"><?= indonesiaDate($row['tmt']); ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php else : ?>
                    <tr>
                        <td class="text-center" colspan="4">Tidak Ada Data</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </main>
    <?php include_once('footer.php'); ?>
</body>

</html>