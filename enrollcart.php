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
					<div class="col-lg-10 offset-lg-1">
						<!-- search form -->
						<form class="course-search-form">
							<input type="text" placeholder="Course">
							<input type="text" class="last-m" placeholder="Category">
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
		 

		                                    
			<div class="row course-items-area">
					<?php 
					
						$viewcourse = $viewcls->allcoursesenroll($student_id);
						foreach ($viewcourse as $value) {
					?> 
				<div class="mix col-lg-3 col-md-4 col-sm-6 finance">
					<div class="course-item">
						<?php if ($value['pay_status']==1) { ?>
							<a href="courseplaylist.php?playlistid=<?php echo $value['course_id'] ?>">
						<?php } ?>
					
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
			 
			 
			<?php }   ?>
			 
			</div>
		 
		</div>
	</section>
	<!-- course section end -->


 

	<?php include 'include/footer.php'; ?>