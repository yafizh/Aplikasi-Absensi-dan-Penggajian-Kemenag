<?php

if (isset($_GET['id'])) {
    $result = $mysqli->query("SELECT * FROM tunjangan WHERE id=" . $_GET['id']);
    $data = $result->fetch_assoc();
} else {
    echo "<script>alert('id tidak ditemukan');</script>";
    echo "<script>window.location.href = '?page=" . $_GET['page'] . "';</script>";
}


if (isset($_POST['submit'])) {
    $nama = $mysqli->real_escape_string($_POST['nama']);
    $tunjangan = $mysqli->real_escape_string($_POST['tunjangan']);
    $jenis_pemberian = $mysqli->real_escape_string($_POST['jenis_pemberian']);

    $q = "
        UPDATE tunjangan SET 
            nama='$nama',
            tunjangan='$tunjangan',
            jenis_pemberian='$jenis_pemberian'  
        WHERE 
            id=" . $_GET['id'] . "
    ";

    if ($mysqli->query($q)) {
        echo "<script>alert('Berhasil memperbaharui data tunjangan');</script>";
        echo "<script>window.location.href = '?page=" . $_GET['page'] . "';</script>";
    } else echo "Error: " . $q . "<br>" . $mysqli->error;
}
?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row justify-content-center mb-2">
            <div class="col-sm-6">
                <h1 class="text-center">Form Tunjangan</h1>
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
                                <label for="nama">Nama Tunjangan</label>
                                <input type="text" class="form-control" name="nama" id="nama" required value="<?= $data['nama']; ?>" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="tunjangan">Tunjangan</label>
                                <input type="text" class="form-control" name="tunjangan" id="tunjangan" value="<?= $data['tunjangan']; ?>" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <label for="jenis_pemberian">Jenis Pemberian</label>
                                <input type="text" class="form-control" name="jenis_pemberian" id="jenis_pemberian" value="<?= $data['jenis_pemberian']; ?>" required autocomplete="off">
                            </div>
                            <div>
                                <a href="?page=<?= $_GET['page']; ?>" class="btn btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-primary float-right" name="submit">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>