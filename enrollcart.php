<?php include 'include/header.php'; ?>


<?php include 'include/background.php'; ?>

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