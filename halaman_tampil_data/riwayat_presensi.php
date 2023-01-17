<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-12">
                <h1>Data Riwayat Presensi</h1>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="card">
        <div class="card-header">
            <a href="?page=riwayat_presensi&method=tambah" class="btn btn-primary float-right">Tambah</a>
        </div>
        <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="text-center td-fit">No</th>
                        <th class="text-center">Tanggal</th>
                        <th class="text-center">Waktu</th>
                        <th class="text-center">NIP</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Jenis Presensi</th>
                        <th class="text-center">Status</th>
                        <th class="text-center td-fit">Aksi</th>
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
                            <td class="text-center td-fit" style="vertical-align: middle;"><?= $row['nip'] ?></td>
                            <td style="vertical-align: middle;"><?= $row['nama'] ?></td>
                            <td class="text-center" style="vertical-align: middle;"><?= $row['status'] == 'Hadir' ? $row['jenis'] : '-'; ?></td>
                            <td class="text-center" style="vertical-align: middle;"><?= $row['status']; ?></td>
                            <td class="text-center td-fit">
                                <a href="?page=riwayat_presensi&method=edit&id=<?= $row['id'] ?>" class="btn btn-sm btn-warning text-white">Edit</a>
                                <form action="?page=riwayat_presensi&method=hapus&id=<?= $row['id'] ?>" method="POST" class="d-inline">
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>