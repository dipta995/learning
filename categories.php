<?php include 'include/header.php'; ?>
<?php include 'include/background.php'; ?>


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
					$viewcat = $viewcls->catview();
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
		
		</div>
	</section>
	<!-- categories section end -->


	<!-- banner section -->

	<!-- banner section end -->


	<?php include 'include/footer.php'; ?>