<?php

if (isset($_GET['id'])) {
    $result = $mysqli->query("SELECT pegawai.*, user.username, user.password, user.status FROM pegawai INNER JOIN user ON pegawai.id_user=user.id WHERE pegawai.id=" . $_GET['id']);
    $data = $result->fetch_assoc();
    $id_user = $data['id_user'];
    $gambar = $data['gambar'];
} else {
    echo "<script>alert('id tidak ditemukan');</script>";
    echo "<script>window.location.href = '?page=pegawai';</script>";
}
?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Pegawai</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Pegawai</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Identitas Pegawai</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nip">NIP</label>
                            <input type="text" class="form-control" value="<?= $data['nip']; ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" value="<?= $data['nama']; ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="nomor_telepon">Nomor Telepon</label>
                            <input type="text" class="form-control" value="<?= $data['nomor_telepon']; ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" class="form-control" value="<?= $data['tanggal_lahir']; ?>" disabled>
                        </div>
                    </div>
                </div>

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Jabatan</h3>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="pangkat">Pangkat</label>
                            <input type="text" class="form-control" value="<?= $data['pangkat']; ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="golongan">Golongan</label>
                            <input type="text" class="form-control" value="<?= $data['golongan']; ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="tmt">TMT</label>
                            <input type="date" class="form-control" value="<?= $data['tmt']; ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="jabatan">Jabatan</label>
                            <input type="text" class="form-control" value="<?= $data['jabatan']; ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="unit_kerja">Unit Kerja</label>
                            <input type="text" class="form-control" value="<?= $data['unit_kerja']; ?>" disabled>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Preview Gambar</h3>
                    </div>
                    <div class="card-body d-flex justify-content-center" style="height: 470.5px; padding: 20px;">
                        <img id="preview" src="<?= $gambar; ?>" class="w-50" style="object-fit: cover;">
                    </div>
                </div>

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Akun Pegawai</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" value="<?= $data['username']; ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" value="<?= $data['password']; ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" required class="form-control" disabled>
                                <option <?= $data['status'] === "ADMIN" ? "selected" : ""; ?> value="ADMIN">Admin</option>
                                <option <?= $data['status'] === "PIMPINAN" ? "selected" : ""; ?> value="PIMPINAN">Pimpinan</option>
                                <option <?= $data['status'] === "PEGAWAI" ? "selected" : ""; ?> value="PEGAWAI" selected>Pegawai</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>