<!DOCTYPE html>
<html lang="en">


<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
	<title>Login V7</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="login/images/icons/favicon.ico"/>
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

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-90 p-b-30">


<?php 
  include_once 'include/InsertClass.php';
  
 
  $senddata = new InsertClass();
if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['student'])) {
$sending = $senddata->studentregistration($_POST);

}
if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['teacher'])) {
							$sending = $senddata->teacherregistration($_POST);

							}

 ?>
<?php 
	if (($_GET['reg'])=='teacher') {
		
	
 ?>

				<form method="post" action="" class="login100-form validate-form">
					<span class="login100-form-title p-b-40">
						Teacher Account Regestration
					</span>
					<?php if (isset($sending)) {
								echo $sending;
							} ?>

				  
							
						

					<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter Your Full Name">
						<input class="input100" type="text" name="teacher_name" placeholder="Your Name">
						 
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter email: ex@abc.xyz">
						<input type="text" class="input100" name="teacher_email" placeholder="Your E-mail">
						 
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter Phone number">
							<input type="text" class="input100" name="teacher_phone" placeholder="Your Phone">
							
					 
						<span class="focus-input100"></span>
					</div>
				<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter Account Number">
											<input type="text" class="input100" name="account_no" placeholder="Account Number">
											
									 
										<span class="focus-input100"></span>
									</div>

					<div class="wrap-input100 validate-input m-b-20" data-validate = "Please enter password">
						<span class="btn-show-pass">
							<i class="fa fa fa-eye"></i>
						</span>
						<input class="input100" type="password" name="teacher_password" placeholder="Your Password">
						 
						<span class="focus-input100"></span>
					</div>

					 
					<div class="container-login100-form-btn">
						<button name="teacher" class="login100-form-btn">
							Sign up
						</button>
					</div>

					<div class="flex-col-c p-t-224">
						<span class="txt2 p-b-10">
							Already have an account?
						</span>

						<a href="login.php" class="txt3 bo1 hov1">
							Login in now
						</a>
					</div>

				</form>
			<?php }elseif(isset($_GET['reg'])=='student'){ ?>


				<form method="post" action="" class="login100-form validate-form">
					<span class="login100-form-title p-b-40">
						Create new Account
					</span>
					<?php if (isset($sending)) {
								echo $sending;
							} ?>

				  

					<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter Your Full Name">
						<input class="input100" type="text" name="student_name" placeholder="name">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter email: ex@abc.xyz">
						<input class="input100" type="text" name="student_email" placeholder="Email">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter Phone number">
						<input class="input100" type="text" name="student_phone" placeholder="Phone">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-20" data-validate = "Please enter password">
						<span class="btn-show-pass">
							<i class="fa fa fa-eye"></i>
						</span>
						<input class="input100" type="password" name="student_password" placeholder="Password">
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn">
						<input type="radio" name="gender" value="male">
						<label style="margin-top: 3px;
margin-left: 10px;
margin-right: 45px;" for="male">Male</label><br>
						<input type="radio" name="gender" value="female">
						<label style="margin-top: 3px;
margin-left: 10px;
margin-right: 45px;"  for="female">Female</label><br>
					</div>
					<div class="container-login100-form-btn">
						<button name="student" class="login100-form-btn">
							Sign up
						</button>
					</div>

					<div class="flex-col-c p-t-224">
						<span class="txt2 p-b-10">
							Already have an account?
						</span>

						<a href="login.php" class="txt3 bo1 hov1">
							Login in now
						</a>
					</div>

				</form>
			<?php }else{} ?>
			</div>
		</div>
	</div>


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
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-23581568-13');
	</script>
</body>

</html>
