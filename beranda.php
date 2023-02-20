<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-12">
                <h1>Selamat Datang Admin</h1>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-6">
                <?php $pegawai = $mysqli->query("SELECT * FROM pegawai"); ?>
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3><?= $pegawai->num_rows; ?></h3>
                        <p>Pegawai</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <?php $admin = $mysqli->query("SELECT * FROM user WHERE status='ADMIN'"); ?>
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3><?= $admin->num_rows; ?></h3>
                        <p>Admin</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-6">

                <?php $jabatan = $mysqli->query("SELECT * FROM jabatan"); ?>
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3><?= $jabatan->num_rows; ?></h3>
                        <p>Jabatan</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <?php $tunjangan = $mysqli->query("SELECT * FROM tunjangan"); ?>
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3><?= $tunjangan->num_rows; ?></h3>
                        <p>Tunjangan</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                </div>
            </div>
        </div>


    </div>
</section>