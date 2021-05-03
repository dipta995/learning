	<?php include 'include/header.php'; ?>
	<!-- Page info -->
	<div class="page-info-section set-bg" data-setbg="img/page-bg/1.jpg">
		<div class="container">
			<div class="site-breadcrumb">
				<a href="#">Home</a>
				<span>Courses</span>
			</div>
		</div>
	</div>
	<!-- Page info end -->


<div class="row">
	<div class="col-md-7">
			 <div class="row">
			 	
			 
					<?php 
					 
						$viewcourse = $viewcls->allcoursesbyauthId($student_id);
						foreach ($viewcourse as $value) {
					?> 

				<div style="margin: 5px;" class="mix col-lg-3 col-md-4 col-sm-6">
					<div class="course-item">
						<a href="courseplaylist.php?playlistid=<?php echo $value['course_id'] ?>">
						<div style="height: 150px;width: 171px;" class="course-thumb set-bg" data-setbg="<?php echo $value['course_image']; ?>">
							<div class="price">Price: $<?php echo $value['price']; ?></div>
						</div>
						<div class="course-info">
							<div class="course-text">
								<h5><?php echo $value['course_title']; ?></h5>
								<p><?php echo $viewcls->shorter($value['course_details'],50); ?></p>
								
								<div class="students"><?php 
								echo $viewcourse = $viewcls->enrolestudentcount($value['course_id']);
								 
								 ?> Students</div><span>
								 	<div class="star-rating">
								 		
								 		<?php  if ($value['rat_total']>0) {
								 		 $ratting = ceil($value['rat_total']/$value['rat_hit']); 
								 		 for ($i=1; $i <= $ratting; $i++) { 
								 		 	 
								 		 	echo "<label for='5-stars' class='star'>&#9733;</label>";
								 		 }}else{
								 		 	echo "Not Rated";
								 		 }



								 		?>

									<!--   <label for="5-stars" class="star">&#9733;</label> 
									  <label for="4-stars" class="star">&#9733;</label>
									  <label for="3-stars" class="star">&#9733;</label>
									  <label for="2-stars" class="star">&#9733;</label>
									  <label for="1-star" class="star">&#9733;</label> -->
									</div>   
								 </span>
							</div>
							<div class="course-author">
								<?php $teacher = $value['teacher_id'];
								 echo $teacher = $viewcls->teacherview($teacher);
								


								 ?>, <span>Teacher</span></p>
							</div>
						</div>

					</a>
					</div>
				</div>
		<?php } ?>
	</div>
	 
		
	</div>
	<div class="col-md-5">
		
		<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-90 p-b-30">


<?php 
  include_once 'include/InsertClass.php';
  
 
  //$senddata = new InsertClass();
if ($_SERVER['REQUEST_METHOD']=='POST') {
$sending = $senddata->createcourse_t($_POST,$_FILES,$student_id);

}

 ?>


				<form method="post" action="" class="login100-form validate-form" enctype="multipart/form-data">
					<span class="login100-form-title p-b-40">
						Create a new course
					</span>
					<?php if (isset($sending)) {
								echo $sending;
							} ?>

				  

					<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter Your Full Name">
						<input class="input100" type="text" name="course_title" placeholder="Course Title">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter email: ex@abc.xyz">
						<input class="input100" type="text" name="price" placeholder="price">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter Phone number">
						<select name="category_id" class="input100">
							<option value="0">--CHOOSE CATEGORY--</option>
							 <?php 
					$viewcat = $viewcls->catview();
					if ($viewcat) {
						
					foreach ($viewcat as $value) {
					
				 ?>
							<option  value="<?php echo $value['category_id'] ?>"><?php echo $value['category_name'] ?></option>
							<?php } }  ?>
						</select>
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-20" data-validate = "Please enter password">
					 
						<textarea class="input100"  cols="50" placeholder="course_details" name="course_details"></textarea>
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-20" data-validate = "Please enter password">
					 
						 <input class="input100" type="file" name="image">
						<span class="focus-input100"></span>
					</div>

				 
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Create Course
						</button>
					</div>

				 

				</form>
			</div>
		</div>
	</div>
	</div>
	
</div>






	<?php include 'include/footer.php'; ?>