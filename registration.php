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
				<h3 class="card-title text-center"></h3>
				<div class="card-text">

					<?php
					include_once 'include/InsertClass.php';


					$senddata = new InsertClass();
					if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['student'])) {
						$sending = $senddata->studentregistration($_POST);
					}
					if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['teacher'])) {
						$sending = $senddata->teacherregistration($_POST);
					}

					?>
					<?php
					if (($_GET['reg']) == 'teacher') {


					?>

						<form method="post" action="">
							<span class="txt1">
								Teacher Account Regestration
							</span>
							<br>
							<?php if (isset($sending)) {
								echo $sending;
							} ?>





							<div class="form-group">
								<label for="exampleInputEmail1">Name</label>
								<input class="form-control form-control-sm" type="text" name="teacher_name" placeholder="Your Name">

							</div>

							<div class="form-group">
								<label for="exampleInputEmail1">email</label>
								<input type="text" class="form-control form-control-sm" name="teacher_email" placeholder="Your E-mail">


							</div>

							<div class="form-group">
								<label for="exampleInputEmail1">phone</label>
								<input type="text" class="form-control form-control-sm" name="teacher_phone" placeholder="Your Phone">



							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Account No</label>
								<input type="text" class="form-control form-control-sm" name="account_no" placeholder="Account Number">



							</div>

							<div class="wrap-input100 validate-input m-b-20">
								<span class="btn-show-pass">
									<i class="fa fa fa-eye"></i>
								</span>
								<label for="exampleInputEmail1">Password</label>
								<input class="form-control form-control-sm" type="password" name="teacher_password" placeholder="Your Password">


							</div>


							<div class="">
								<button name="teacher" class="btn btn-primary btn-block">
									Sign up
								</button>
							</div>
							<div class="sign-up">

								<span style="margin-top: 10px;" class="txt2 p-b-10">
									Already have an account?
								</span>
								<a href="login.php" class="btn btn-info">
									Login in now
								</a>


							</div>


						</form>
					<?php } elseif (isset($_GET['reg']) == 'student') { ?>


						<form method="post" action="">
							<span class="login100-form-title p-b-40">
								Create new Account
							</span>
							<?php if (isset($sending)) {
								echo $sending;
							} ?>



							<div class="form-group">
								<input class="form-control form-control-sm" type="text" name="student_name" placeholder="name">

							</div>

							<div class="form-group">
								<input class="form-control form-control-sm" type="text" name="student_email" placeholder="Email">

							</div>

							<div class="form-group">
								<input class="form-control form-control-sm" type="text" name="student_phone" placeholder="Phone">

							</div>

							<div class="wrap-input100 validate-input m-b-20">
								<span class="btn-show-pass">
									<i class="fa fa fa-eye"></i>
								</span>
								<input class="form-control form-control-sm" type="password" name="student_password" placeholder="Password">

							</div>

							<div class="form-group">
								<input type="radio" name="gender" value="male">
								<label style="margin-top: 3px;
margin-left: 10px;
margin-right: 45px;" for="male">Male</label><br>
								<input type="radio" name="gender" value="female">
								<label style="margin-top: 3px;
margin-left: 10px;
margin-right: 45px;" for="female">Female</label><br>
							</div>
							<div class="">
								<button name="student" class="btn btn-primary btn-block">
									Sign up
								</button>
							</div>
							<div class="sign-up">

								<span style="margin-top: 10px;" class="txt2 p-b-10">
									Already have an account?
								</span>
								<a href="login.php" class="btn btn-info">
									Login in now
								</a>


							</div>

						</form>
					<?php } else {
					} ?>
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