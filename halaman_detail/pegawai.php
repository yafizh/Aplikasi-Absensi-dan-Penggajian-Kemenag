<?php

if (isset($_GET['id'])) {
    $q = "
        SELECT 
            p.*,
            j.nama jabatan,
            j.golongan,
            j.gaji_pokok
        FROM 
            pegawai p
        INNER JOIN 
            jabatan j 
        ON 
            p.id_jabatan=j.id 
        WHERE 
            p.id=" . $_GET['id'];
    $result = $mysqli->query($q);
    $data = $result->fetch_assoc();
    $gambar = $data['gambar'];
} else {
    echo "<script>alert('id tidak ditemukan');</script>";
    echo "<script>window.location.href = '?page=" . $_GET['page'] . "';</script>";
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
            <div class="col-md-4">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Preview Gambar</h3>
                    </div>
                    <div class="card-body d-flex justify-content-center" style="height: 400px; padding: 20px;">
                        <img id="preview" src="<?= $gambar; ?>" class="w-100" style="object-fit: cover;">
                    </div>
                </div>

                <style>
                    .fade-scale {
                        transform: scale(0);
                        opacity: 0;
                        -webkit-transition: all .25s linear;
                        -o-transition: all .25s linear;
                        transition: all .25s linear;
                    }

                    .fade-scale.in {
                        opacity: 1;
                        transform: scale(1);
                    }

                    #qrcode canvas {
                        height: 100% !important;
                    }
                </style>
                <div class="card card-primary">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="card-title flex-grow-1">QR CODE</h3>
                        <button id="cetak" class="btn btn-sm btn-dark m-0">Cetak</a>
                    </div>
                    <div class="card-body">
                        <div style="aspect-ratio: 1 / 1;">
                            <div id="qrcode" style="height: 100%;"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
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
                            <input type="text" class="form-control" value="<?= indonesiaDate($data['tanggal_lahir']); ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" class="form-control" value="<?= $data['tempat_lahir']; ?>" disabled>
                        </div>
                    </div>
                </div>

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Jabatan</h3>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="jabatan">Jabatan</label>
                            <input type="text" class="form-control" value="<?= $data['jabatan']; ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="golongan">Golongan</label>
                            <input type="text" class="form-control" value="<?= $data['golongan']; ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="gaji_pokok">Gaji Pokok</label>
                            <input type="text" class="form-control" value="<?= number_format($data['gaji_pokok'], 0, ",", "."); ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="tmt">TMT</label>
                            <input type="text" class="form-control" value="<?= indonesiaDate($data['tmt']); ?>" disabled>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    const qrCode = new QRCodeStyling({
        width: 1000,
        height: 1000,
        data: JSON.stringify(<?= json_encode($data); ?>),
        // image: "assets/img/favicon.png", 
        backgroundOptions: {
            color: "#ffffff",
        },
        imageOptions: {
            crossOrigin: "anonymous",
            margin: 30
        },
        margin: 0
    });

    qrCode.append(document.getElementById("qrcode"));
    document.getElementById('cetak').addEventListener('click', () => {
        qrCode.download({});
    });
</script>