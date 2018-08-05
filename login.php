<?php

//untuk memasukan halaman lain 

require_once "core/init.php";

if(isset($_SESSION['user'])){
	header('Location: index.php');
}

$error_msg = ["Ada masalah saat login",
			  "Nama dan password wajib diisi"
];

$error = null;

//mengecek apakah data sudah terisi dan tidak kosong 
if(isset($_POST['submit'])){

	$nama = $_POST['username'];
	$pass = $_POST['password'];

	if(!empty(trim($nama)) && !empty(trim($pass))){

		if(cek_data($nama, $pass)){
			$_SESSION['user'] = $nama;
			$_SESSION['id'] = getuserId($nama);
			$_SESSION['status'] = getUserLevel($nama);
			header('Location: index.php');
			die($_SESSION['id']);
		}else {
			$error = $error_msg[0];
		}

	}else{
		$error = $error_msg[1];
	}
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="vendor/Login_v12/images/icons/favicon.ico"/>
	<!--===============================================================================================-->
	<link rel="stylesheet" href="vendor/bootstrap-3.3.7-dist/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/Login_v12/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/Login_v12/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/Login_v12/vendor/animate/animate.css">
	<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/Login_v12/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/Login_v12/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/Login_v12/css/util.css">
	<link rel="stylesheet" type="text/css" href="vendor/Login_v12/css/main.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/style.css">
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('vendor/Login_v12/images/img-01.jpg');">
			<div class="wrap-login100 p-t-190 p-b-30">
				<form class="login100-form validate-form" method="post">
					<div class="login100-form-avatar">
						<img src="vendor/Login_v12/images/default-user.png" alt="AVATAR">
					</div>

					<span class="login100-form-title p-t-20 p-b-45">
						SISTEM INFORMASI ARSIP SURAT SUBBAGRENIM TI POL JAMBI
					</span>

					<div class="lala">
						<div class="wrap-input100 validate-input m-b-10" data-validate = "Username is required">
							<input class="input100" type="text" name="username" placeholder="NIP/NRP">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-user"></i>
							</span>
						</div>

						<div class="wrap-input100 validate-input m-b-10" data-validate = "Password is required">
							<input class="input100" type="password" name="password" placeholder="Password">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-lock"></i>
							</span>
						</div>

						<div class="error_msg"><?php echo $error ?></div>

						<div class="container-login100-form-btn p-t-10">
							<button class="login100-form-btn" name="submit" value="sumbit" type="">
								Login
							</button>
						</div>

						<div class="text-center w-full p-t-25 p-b-230">
							<a href="#" class="txt1">
								Forgot Username / Password?
							</a>
						</div>

					</div>

					<div class="text-center w-full">
						
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<!--===============================================================================================-->	
	<script src="vendor/bootstrap-3.3.7-dist/js/jquery.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/Login_v12/vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/Login_v12/vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/Login_v12/js/main.js"></script>

</body>
</html>

<?php ?>