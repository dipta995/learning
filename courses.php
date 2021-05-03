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


	<!-- search section -->
		<section class="search-section ss-other-page">
		<div class="container">
			<div class="search-warp">
				<div class="section-title text-white">
					<h2><span>Search your course</span></h2>
				</div>
				<div class="row">
					<div class="col-lg-1"></div>
					<div class="col-lg-11 ">
						<!-- search form -->
						<form method="get" action="searchresult.php?search=" class="course-search-form">
							<input type="text" style="width: 650px;" name="search" placeholder="Course">
							<!-- <input type="text" class="last-m" placeholder="Category"> -->
							<button class="site-btn btn-dark">Search Couse</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- search section end -->


	<!-- course section -->
	<section class="course-section spad pb-0">
		<div class="course-warp">
			<ul class="course-filter controls">
				<?php 
					$viewcat = $viewcls->catview();
					if ($viewcat) {
						
					foreach ($viewcat as $value) {
					
				 ?>
				<li class="control"><a href="?catid=<?php echo $value['category_id'] ?>"><?php echo $value['category_name'] ?></a></li>
				<?php } }  ?>
				
			</ul>  

		                                    
			<div class="row course-items-area">
					<?php 
					if (!isset($_GET['catid']) || $_GET['catid']==NULL) {
						$viewcourse = $viewcls->allcourses();
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
				<?php  } }elseif (isset($_GET['catid'])) {
					$viewcourse = $viewcls->coursefeaturebycatid($_GET['catid']);
						foreach ($viewcourse as $values) {
				 ?>
				 
			 <div class="mix col-lg-3 col-md-4 col-sm-6 finance">
					<div class="course-item">
						<a href="single-course.php?playlistid=<?php echo $values['course_id'] ?>">
						<div class="course-thumb set-bg" data-setbg="<?php echo $values['course_image']; ?>">
							<div class="price">Price: $<?php echo $values['price']; ?></div>
						</div>
						<div class="course-info">
							<div class="course-text">
								<h5><?php echo $values['course_title']; ?></h5>
								<p><?php echo $viewcls->shorter($values['course_details'],50); ?></p>
								<div class="students"><?php 
								echo $viewcourse = $viewcls->enrolestudentcount($values['course_id']);
								 
								 ?> Students</div>
								 <?php 
								 if ($values['rat_total']>0) {
								 	
								 
								  $ratting = ceil($values['rat_total']/$values['rat_hit']); 
								 		 for ($i=1; $i <= $ratting; $i++) { 
								 		 	 
								 		 	echo "<i class='fa fa-star'></i>";
								 		 }}else{
								 		 	echo "Not Rated";
								 		 }



								 		?>
							</div>
							<div class="course-author">
								<?php $teacher = $values['teacher_id'];
								 echo $teacher = $viewcls->teacherview($teacher);
								


								 ?>, <span>Teacher</span></p>
							</div>
						</div>
					</a>
					</div>
				</div>
			<?php } }  ?>
			 
			</div>
			 
		</div>
	</section>
	<!-- course section end -->


	<!-- banner section -->
<!-- 	<section class="banner-section spad">
		<div class="container">
			<div class="section-title mb-0 pb-2">
				<h2>Join Our Community Now!</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec malesuada lorem maximus mauris scelerisque, at rutrum nulla dictum. Ut ac ligula sapien. Suspendisse cursus faucibus finibus.</p>
			</div>
			<div class="text-center pt-5">
				<a href="#" class="site-btn">Register Now</a>
			</div>
		</div>
	</section> -->
	<!-- banner section end -->

	<?php include 'include/footer.php'; ?>