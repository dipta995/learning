<?php include 'include/header.php'; ?>

<?php include 'include/background.php'; ?>


	<!-- course section -->
	<section class="course-section spad pb-0">
		<div class="course-warp">
	  

		                                    
			<div class="row course-items-area">
					<?php 
					if (!isset($_GET['search']) || $_GET['search']==NULL) {
						echo "<script> window.location = 'index.php';</script>";
					}
					elseif (isset($_GET['search']) || $_GET['search']!=NULL) {
						$viewcourse = $viewcls->searchkey($_GET['search']);
						foreach ($viewcourse as $value) {
					?> 
				<div class="mix col-lg-3 col-md-4 col-sm-6 finance">
					<div class="course-item">
					<a href="single-course.php?playlistid=<?php echo $value['course_id'] ?>">
						<div class="course-thumb set-bg" data-setbg="<?php echo $value['course_image']; ?>">
							<div class="price">Price: $<?php echo $value['price']; ?></div>
						</div>
						<div class="course-info">
							<div class="course-text">
		 						<h5><?php echo $value['course_title']; ?></h5>
								<p><?php echo $viewcls->shorter($value['course_details'],50); ?></p>
								<div class="students"><?php 
								echo $viewcourse = $viewcls->enrolestudentcount($value['course_id']);

								 
								 ?> Students</div>
								 <?php 
								 if ($value['rat_total']>0) {
								 	
								 
								  $ratting = ceil($value['rat_total']/$value['rat_hit']); 
								 		 for ($i=1; $i <= $ratting; $i++) { 
								 		 	 
								 		 	echo "<i class='fa fa-star'></i>";
								 		 }}else{
								 		 	echo "Not Rated";
								 		 }



								 		?>
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
				<?php  }} ?>
			 
			</div>
			 
		</div>
	</section>
	<!-- course section end -->


	<!-- banner section -->
	<section class="banner-section spad">
		<div class="container">
			<div class="section-title mb-0 pb-2">
				<h2>Join Our Community Now!</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec malesuada lorem maximus mauris scelerisque, at rutrum nulla dictum. Ut ac ligula sapien. Suspendisse cursus faucibus finibus.</p>
			</div>
			<div class="text-center pt-5">
				<a href="#" class="site-btn">Register Now</a>
			</div>
		</div>
	</section>
	<!-- banner section end -->

	<?php include 'include/footer.php'; ?>