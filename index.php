<?php include 'include/header.php'; ?>


	<!-- Hero section -->
	<section class="hero-section set-bg" data-setbg="img/bg.jpg">
		<div class="container">
			<div class="hero-text text-white">
				<h2 style="color: #fff;">Find Free Online Courses</h2>
				<!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec malesuada lorem maximus mauris scelerisque, at rutrum nulla <br> dictum. Ut ac ligula sapien. Suspendisse cursus faucibus finibus.</p> -->
			</div>
			<div class="row">
				<div class="col-lg-3"></div>
				<div class="col-lg-9">
					<form method="get" action="searchresult.php?search=" class="intro-newslatter">
						<input type="text" name="search" placeholder="Enter Course name">
						 
						<button style="border-radius: 25px;" class="site-btn">Search </button>
					</form>
				</div>
			</div>
		</div>
	</section>
	<!-- Hero section end -->


	<!-- categories section -->
	<section class="categories-section spad">
		<div class="container">
			<div class="section-title">
				<h2> Course Categories</h2>
				<!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec malesuada lorem maximus mauris scelerisque, at rutrum nulla dictum. Ut ac ligula sapien. Suspendisse cursus faucibus finibus.</p> -->
			</div>
			<div class="row">
				<!-- categorie -->
				<?php 
					$viewcat = $viewcls->catviewlimit(3);
					if ($viewcat) {
					foreach ($viewcat as $value) {
					
				 ?>
				<div class="col-lg-4 col-md-6">
					<div class="categorie-item">
						<a href="courses.php?catid=<?php echo $value['category_id']; ?>">
							
						<div class="ci-text">
							<h5><?php echo $value['category_name']; ?></h5>
							<p>Lorem ipsum dolor sit amet, consectetur</p>
							<span><?php 
								echo $viewcourse = $viewcls->coursecount($value['category_id']);
								 
								 ?> Courses</span> 
						</div>
						</a>
					</div>
				</div>
				<?php } }  ?>
				 
			</div>
			<div class="section-title">
				<a class="site-btn" href="categories.php">See All Categories</a>
			</div>
		</div>
	</section>
	<!-- categories section end -->


	<!-- search section -->
 
	<!-- search section end -->


	<!-- course section -->
	<section class="course-section spad">
		<div class="container">
			<div class="section-title mb-0">
				<h2>Featured Courses</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec malesuada lorem maximus mauris scelerisque, at rutrum nulla dictum. Ut ac ligula sapien. Suspendisse cursus faucibus finibus.</p>
			</div>
		</div>
		<div class="course-warp">
		<!-- 	<ul class="course-filter controls">
				<li class="control active" data-filter="all">All</li>
				<li class="control" data-filter=".finance">Finance</li>
				<li class="control" data-filter=".design">Design</li>
				<li class="control" data-filter=".web">Web Development</li>
				<li class="control" data-filter=".photo">Photography</li>
			</ul>  -->                                      
			<div class="row course-items-area">
				<!-- course -->
				<?php 
					$viewcourse = $viewcls->coursefeature();
					foreach ($viewcourse as $value) {
					
				 ?>

				<div class="mix col-lg-3 col-md-4 col-sm-6">
					<div class="course-item">
						<a href="single-course.php?playlistid=<?php echo $value['course_id'] ?>">
						<div class="course-thumb set-bg" data-setbg="<?php echo $value['course_image']; ?>">
							<div class="price">Price: $<?php echo $value['price']; ?></div>
						</div>
						<div class="course-info">
							<div class="course-text">
	 							<h5><?php echo $value['course_title']; ?></h5>
								
								<div class="students"><?php 
								echo $viewcourse = $viewcls->enrolestudentcount($value['course_id']);
								 
								 ?> Students</div><span>
								 	<div class="star-rating">

									 <?php 
									 if ($value['rat_total']>0) {
									  $ratting = ceil($value['rat_total']/$value['rat_hit']); 
								 		 for ($i=1; $i <= $ratting; $i++) { 
								 		 	 
								 		 	echo "<label for='5-stars' class='star'>&#9733;</label>";
								 		 }
								 		 }else{
								 		 	echo "Not Rated";
								 		 }



								 		?>
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
				<!-- course -->
				
			</div>
		</div>
	</section>
	<!-- course section end -->
	
	<!-- signup section end -->


	<!-- banner section -->

	<!-- banner section end -->


	<?php include 'include/footer.php'; ?>