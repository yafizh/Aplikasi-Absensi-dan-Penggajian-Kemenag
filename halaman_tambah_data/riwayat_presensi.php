<?php
if (isset($_POST['submit'])) {
    $id_pegawai = $mysqli->real_escape_string($_POST['id_pegawai']);
    $status = $mysqli->real_escape_string($_POST['status']);
    $jenis = $mysqli->real_escape_string($_POST['jenis'] ?? '');
    $tanggal = $mysqli->real_escape_string($_POST['tanggal'] ?? '');
    $waktu = $mysqli->real_escape_string($_POST['waktu'] ?? '00:00:00');

    $q = "
        INSERT INTO presensi_pegawai ( 
            id_pegawai,
            tanggal_waktu,
            status,
            jenis
        ) VALUES (
            '$id_pegawai',
            '" . ("$tanggal $waktu") . "',
            '$status',
            '$jenis' 
        )
    ";

    if ($mysqli->query($q)) {
        echo "<script>alert('Berhasil menambah data presensi');</script>";
        echo "<script>window.location.href = '?page=" . $_GET['page'] . "';</script>";
    } else echo "Error: " . $q . "<br>" . $mysqli->error;
}
?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row justify-content-center mb-2">
            <div class="col-sm-6">
                <h1 class="text-center">Form Presensi</h1>
            </div>
        </div>
    </div>
</section>
<form action="" method="POST">
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="id_pegawai">Nama</label>
                                <?php
                                $q = "
                                    SELECT 
                                        p.id,
                                        p.nip,
                                        p.nama,
                                        j.nama jabatan 
                                    FROM 
                                        pegawai p
                                    INNER JOIN 
                                        jabatan j 
                                    ON 
                                        j.id=p.id_jabatan
                                ";
                                if (!$result = $mysqli->query($q))
                                    echo "Error: " . $q . "<br>" . $mysqli->error;
                                ?>
                                <select class="form-control select2bs4" name="id_pegawai" id="id_pegawai" required>
                                    <option value="" disabled selected>Pilih Pegawai</option>
                                    <?php while ($row = $result->fetch_assoc()) : ?>
                                        <option data-jabatan="<?= $row['jabatan']; ?>" data-nip="<?= $row['nip']; ?>" value="<?= $row['id']; ?>"><?= $row['nama']; ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>NIP</label>
                                <input type="text" class="form-control" name="nip" disabled>
                            </div>
                            <div class="form-group">
                                <label>Jabatan</label>
                                <input type="text" class="form-control" name="jabatan" disabled>
                            </div>
                            <div class="form-group">
                                <label for="status">Status Kehadiran</label>
                                <select class="form-control select2bs4" name="status" id="status" required>
                                    <option value="" disabled selected>Pilih Status Kehadiran</option>
                                    <option value="Hadir">Hadir</option>
                                    <option value="Sakit">Sakit</option>
                                    <option value="Izin">Izin</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="jenis">Jenis Presensi</label>
                                <select class="form-control select2bs4" name="jenis" id="jenis" required disabled>
                                    <option value="" disabled selected>Pilih Jenis Presensi</option>
                                    <option value="Masuk">Masuk</option>
                                    <option value="Pulang">Pulang</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" class="form-control" name="tanggal" id="tanggal" value="<?= Date("Y-m-d"); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="waktu">Waktu</label>
                                <input type="time" class="form-control" name="waktu" id="waktu" value="<?= Date("H:i"); ?>" required disabled>
                            </div>
                            <div>
                                <a href="?page=<?= $_GET['page']; ?>" class="btn btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-primary float-right" name="submit">Tambah</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>
<script>
    document.querySelector("select[name=id_pegawai]").addEventListener('change', function() {
        document.querySelector("input[name=nip]").value = this[this.selectedIndex].getAttribute('data-nip');
        document.querySelector("input[name=jabatan]").value = this[this.selectedIndex].getAttribute('data-jabatan');
    });
    document.querySelector("select[name=status]").addEventListener('change', function() {
        if (this[this.selectedIndex].value == 'Hadir') {
            document.querySelector("select[name=jenis]").removeAttribute('disabled');
            document.querySelector('input[name=waktu]').removeAttribute('disabled');
            return;
        }

        document.querySelector("select[name=jenis]").setAttribute('disabled', '');
        document.querySelector('input[name=waktu]').setAttribute('disabled', '');
        return;
    });
</script>