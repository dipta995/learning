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
	<div class="global-container">
		<div class="card login-form">
			<div class="card-body">
				<h3 class="card-title text-center">Log in to Learner</h3>
				<div class="card-text">
					


<?php 
  include_once 'include/InsertClass.php';
  
 
  //$senddata = new InsertClass();
if ($_SERVER['REQUEST_METHOD']=='POST') {
$sending = $senddata->createcourse_t($_POST,$_FILES,$student_id);

}

 ?>


				<form method="post" action=""  enctype="multipart/form-data">
					<span class="login100-form-title p-b-40">
						Create a new course
					</span>
					<?php if (isset($sending)) {
								echo $sending;
							} ?>

				  

					<div class="from-group" data-validate="Please enter Your Full Name">
						<input class="from-control" type="text" name="course_title" placeholder="Course Title">
						
					</div>

					<div class="from-group" data-validate="Please enter email: ex@abc.xyz">
						<input class="from-control" type="text" name="price" placeholder="price">
						
					</div>

					<div class="from-group" data-validate="Please enter Phone number">
						<select name="category_id" class="from-control">
							<option value="0">--CHOOSE CATEGORY--</option>
							 <?php 
					$viewcat = $viewcls->catview();
					if ($viewcat) {
						
					foreach ($viewcat as $value) {
					
				 ?>
							<option  value="<?php echo $value['category_id'] ?>"><?php echo $value['category_name'] ?></option>
							<?php } }  ?>
						</select>
						
					</div>

					<div class="from-group" data-validate = "Please enter password">
					 
						<textarea class="from-control"  cols="50" placeholder="course_details" name="course_details"></textarea>
						
					</div>
					<div class="from-group" data-validate = "Please enter password">
					 
						 <input class="from-control" type="file" name="image">
						
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
	
</div>






	<?php include 'include/footer.php'; ?>