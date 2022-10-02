<?php
include_once 'include/ViewClass.php';
include_once 'include/InsertClass.php';
if (isset($_GET['link'])) {
	$link = $_GET['link'];
} else {
	$link = 'index.php';
}

session_start();
$viewcls = new ViewClass();
if (isset($_SESSION['true']) == true) {
	session_unset();
}



if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['student'])) {
	$email = $_POST['email'];
	$password = $_POST['pass'];

	$get = $viewcls->logincheck('student_table', 'student_email', 'student_password', $email, $password, $link);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['teacher'])) {
	$email = $_POST['email'];
	$password = $_POST['pass'];

	$get = $viewcls->logincheckteacher('teacher_table', 'teacher_email', 'teacher_password', $email, $password, $link);
}
if (isset($get)) {
	echo $get;
	//header("Location:$link");
}
?>
<!DOCTYPE html>
<html lang="en">


<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
	<title>Login V7</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="login/images/icons/favicon.ico" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/css/util.css">
	<link rel="stylesheet" type="text/css" href="login/css/main.css">
	<!--===============================================================================================-->
</head>

<body>
	<div class="global-container">
		<div class="card login-form">
			<div class="card-body">
				<h3 class="card-title text-center">Log in to Learner</h3>
				<div class="card-text">
					<!--
			<div class="alert alert-danger alert-dismissible fade show" role="alert">Incorrect username or password.</div> -->
					<form method="POST" action="">
						<!-- to error: add class "has-danger" -->
						<div class="form-group">
							<label for="exampleInputEmail1">Email address</label>
							<input type="email" class="form-control form-control-sm" id="exampleInputEmail1" name="email" aria-describedby="emailHelp">
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Password</label>
							<a href="#" style="float:right;font-size:12px;">Forgot password?</a>
							<input type="password" name="pass" class="form-control form-control-sm" id="exampleInputPassword1">
						</div>

						<div class="row">
							<div class="col-md-6">
								<button name="student" class="btn btn-primary btn-block">
									Student
								</button>

							</div>
							<div class="col-md-6">
								<button name="teacher" class="btn btn-primary btn-block">
									Teacher
								</button>
							</div>
						</div>


						<div class="sign-up">

							<span style="margin-top: 10px;" class="txt2 p-b-10">
								Don’t have an account?
							</span>
							<a class="btn btn-success" href="registration.php?reg=teacher">
								Teacher Signup
							</a>
							<a class="btn btn-success" href="registration.php?reg=student">
								Student Signup
							</a>


						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

		<style>
			body {
				width: 660px;
				margin: 0 auto;
			}

			.sign-up a {
				float: right;
				margin: 5px;

			}
		</style>

		<!--===============================================================================================-->
		<script src="login/vendor/jquery/jquery-3.2.1.min.js"></script>
		<!--===============================================================================================-->
		<script src="login/vendor/animsition/js/animsition.min.js"></script>
		<!--===============================================================================================-->
		<script src="login/vendor/bootstrap/js/popper.js"></script>
		<script src="login/vendor/bootstrap/js/bootstrap.min.js"></script>
		<!--===============================================================================================-->
		<script src="login/vendor/select2/select2.min.js"></script>
		<!--===============================================================================================-->
		<script src="login/vendor/daterangepicker/moment.min.js"></script>
		<script src="login/vendor/daterangepicker/daterangepicker.js"></script>
		<!--===============================================================================================-->
		<script src="login/vendor/countdowntime/countdowntime.js"></script>
		<!--===============================================================================================-->
		<script src="login/js/main.js"></script>
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
		<script>
			window.dataLayer = window.dataLayer || [];

			function gtag() {
				dataLayer.push(arguments);
			}
			gtag('js', new Date());

			gtag('config', 'UA-23581568-13');
		</script>
</body>

</html>