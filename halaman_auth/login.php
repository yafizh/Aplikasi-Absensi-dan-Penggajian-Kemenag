<?php
session_start();
include_once "../database/koneksi.php";
if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	$sql = "
		SELECT 
			user.*, 
			pegawai.id AS id_pegawai, 
			pegawai.nama, 
			pegawai.gambar 
		FROM 
			user 
		LEFT JOIN 
			pegawai 
		ON 
			user.id=pegawai.id_user 
		WHERE 
			user.username='$username' 
			AND 
			user.password='$password'";
	if ($result = $mysqli->query($sql)) {
		if ($result->num_rows) {
			$_SESSION['user'] = $result->fetch_assoc();
			echo "<script>window.location.replace('../index.php');</script>";
		} else
			echo "<script>alert('Username atau Password Salah!');</script>";
	} else echo "Error: " . $sql . "<br>" . $mysqli->error;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Halaman Login</title>

	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
	<link rel="stylesheet" href="../assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
	<div class="login-box">
		<div class="card">
			<div class="card-body login-card-body">
				<div class="d-flex flex-column align-items-center justify-content-center mb-3">
					<img src="../assets/img/logo.png" class="mb-3" width="150" height="150">
					<p class="login-box-msg" style="font-weight: bold;">APLIKASI ABSENSI DAN PENGGAJIAN PEGAWAI KEMENTERIAN AGAMA KABUPATEN TAPIN</p>
				</div>
				<form action="" method="POST">
					<div class="input-group mb-3">
						<input type="text" class="form-control" name="username" placeholder="Username" autocomplete="off" autofocus>
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-envelope"></span>
							</div>
						</div>
					</div>
					<div class="input-group mb-3">
						<input type="password" class="form-control" name="password" placeholder="Password">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-lock"></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<button type="submit" name="submit" class="btn btn-primary btn-block">Login</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

	<script src="../assets/plugins/jquery/jquery.min.js"></script>
	<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="../assets/js/adminlte.min.js"></script>
</body>

</html>