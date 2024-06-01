<?php
session_start();
include '../config/db.php';

// Mendapatkan data user dari session atau database
$id_admin = $_SESSION['admin'];
$query = mysqli_query($con, "SELECT * FROM tb_admin WHERE id_admin='$id_admin'");
$data = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login | Admin</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="../assets/img/logo4.png"/>
	<link rel="stylesheet" type="text/css" href="../assets/_login/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/_login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/_login/fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/_login/vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="../assets/_login/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/_login/vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/_login/vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/_login/vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="../assets/_login/css/util.css">
	<link rel="stylesheet" type="text/css" href="../assets/_login/css/main.css">
</head>
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form method="post" action="" class="login100-form validate-form">
					<span class="login100-form-title p-b-48">
						<img src="../assets/img/logo4.png" width="100">
					</span>
					<span class="login100-form-title p-b-26">
						SMKN4 BANDAR LAMPUNG
					</span>
					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="username">
						<span class="focus-input100" data-placeholder="Username"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="password">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button type="submit" class="login100-form-btn">
								Login
							</button>
						</div>
					</div>
				</form>

				<?php 
				if ($_SERVER['REQUEST_METHOD']=='POST') {
					$pass= sha1($_POST['password']);
					$sqlCek = mysqli_query($con,"SELECT * FROM tb_admin WHERE username='$_POST[username]' AND password='$pass' AND aktif='Y'");
					$jml = mysqli_num_rows($sqlCek);
					$d = mysqli_fetch_array($sqlCek);
					
					if ($jml > 0) {
						$_SESSION['admin']= $d['id_admin'];
						
						echo "
						<script type='text/javascript'>
						setTimeout(function () { 
							swal('(Administrator) ', 'Login berhasil', {
								icon : 'success',
								buttons: {        			
									confirm: {
										className : 'btn btn-success'
									}
								},
							});    
						},10);  
						window.setTimeout(function(){ 
							window.location.replace('./dashboard.php');
						} ,3000);   
						</script>";
					}else{
						echo "
						<script type='text/javascript'>
						setTimeout(function () { 
							swal('Sorry!', 'Username / Password Salah', {
								icon : 'error',
								buttons: {        			
									confirm: {
										className : 'btn btn-danger'
									}
								},
							});    
						},10);  
						window.setTimeout(function(){ 
							window.location.replace('index.php');
						} ,3000);   
						</script>";
					}
				}
				?>
			</div>
		</div>
	</div>

	<!-- Navbar with profile icon -->
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="#">Navbar</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<img src="../assets/img/user/<?=$data['foto']?>" alt="Profile Picture" class="rounded-circle" width="30">
					</a>
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="#">Profile</a>
						<a class="dropdown-item" href="#">Settings</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="logout.php">Logout</a>
					</div>
				</li>
			</ul>
		</div>
	</nav>
	
	<div id="dropDownSelect1"></div>

	<script src="../assets/_login/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="../assets/_login/vendor/animsition/js/animsition.min.js"></script>
	<script src="../assets/_login/vendor/bootstrap/js/popper.js"></script>
	<script src="../assets/_login/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="../assets/_login/vendor/select2/select2.min.js"></script>
	<script src="../assets/_login/vendor/daterangepicker/moment.min.js"></script>
	<script src="../assets/_login/vendor/daterangepicker/daterangepicker.js"></script>
	<script src="../assets/_login/vendor/countdowntime/countdowntime.js"></script>
	<script src="../assets/js/plugin/sweetalert/sweetalert.min.js"></script>
	<script src="../assets/_login/js/main.js"></script>
</body>
</html>
