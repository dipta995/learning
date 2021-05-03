
<?php 
 include_once 'include/ViewClass.php';
 include_once 'include/InsertClass.php';
 if (isset($_GET['link'])) {
 	$link = $_GET['link'];
 }else{
 	$link = 'index.php';
 }
  
  	session_start();
  $viewcls = new ViewClass();
  if (isset($_SESSION['true'])==true) {
  	session_unset(); 
  }
  


if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['student'])) {
	$email = $_POST['email'];
	$password = $_POST['pass'];
 
	$get = $viewcls->logincheck('student_table','student_email','student_password',$email,$password,$link);

	
}
if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['teacher'])) {
	$email = $_POST['email'];
	$password = $_POST['pass'];
 
	$get = $viewcls->logincheckteacher('teacher_table','teacher_email','teacher_password',$email,$password,$link);

	
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
				<form action="" method="post" class="login100-form validate-form">
					<span class="login100-form-title p-b-40">
						Login
					</span>

				 

					<div class="text-center p-t-55 p-b-30">
						<span class="txt1">
							Login with email
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter email: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-20" data-validate = "Please enter password">
						<span class="btn-show-pass">
							<i class="fa fa fa-eye"></i>
						</span>
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn">
						<button name="student" class="login100-form-btn">
							Student
						</button>
						<button name="teacher" class="login100-form-btn">
							Teacher
						</button>
					</div>
 

					<div class="flex-col-c p-t-224">
						<span class="txt2 p-b-10">
							Don’t have an account?
						</span>

						<a href="registration.php?reg=teacher" class="login100-form-btn">
							Teacher Signup
						</a><a href="registration.php?reg=student" class="login100-form-btn">
							Student Signup 
						</a>
					</div>

				</form>
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
