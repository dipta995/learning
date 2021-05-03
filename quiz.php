 	<?php include 'include/header.php'; ?>
 	    <?php 
 	    $marks = $viewcls->totamarks($_GET['courseid'],$student_id);
  $per_page = 1;
if (isset($_GET["page"])) {
$page = $_GET["page"];
}else {
$page =1;
}
$start_form = ($page-1) * $per_page;
     ?>
	<!-- Page info -->
	<div class="page-info-section set-bg" data-setbg="img/page-bg/5.jpg">
		<div class="container">
			<div class="site-breadcrumb">
				<a href="#">Home</a>
				<span>Elements</span>
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


	<!-- Page -->
	<section class="elements-page spad pb-0">
		<div class="container">
			<?php if (!isset($_GET['question']) && isset($_GET['courseid'])) { ?>
			  
			<div class="element">
				<h2 class="e-title">Get Started for exam</h2>
				<p>Total Question: <?php echo $marks; ?></p>
				<a href="?question=1&courseid=<?php echo $_GET['courseid']; ?>" class="site-btn mr-3 mb-3 mb-md-0">Start</a>

			<!-- 	<a href="#" class="site-btn mr-3 mb-3 mb-md-0">Send Message</a>
				<a href="#" class="site-btn btn-dark mr-3 mb-3 mb-md-0">Send Message</a>
				<a href="#" class="site-btn btn-fade">Send Message</a> -->
			</div>
		<?php } else{ ?>
			<!-- Element -->
			<div class="element">
				<h2 class="e-title">Get Started for exam</h2>
				<div class="row">
					<div class="col-lg-6 mb-4 mb-lg-0">
						 
				 	<div class="phone-number">
				 		<?php 
				 		if ($_SERVER['REQUEST_METHOD']=='POST') {
				 			$sending = $senddata->addquizdata($_POST);
				 		}
				 		 ?>
				 		<form action="" method="post">
							<?php 
							$quizview = $viewcls->quizviewbyidforstudent($start_form,$per_page,$_GET['courseid']);
						 
							foreach ($quizview as $rows) {
						
							 ?>
							<span> Question : <?php  if (!isset($_GET['page'])) {
						 	echo $page = 1;
						 }else{
						 	echo $page=($_GET['page']);
						 } ?></span>
							<h2><?php echo $rows['quiz_question'] ?></h2>
							<input type="hidden" value="<?php echo $rows['quiz_id'] ?>" name="quiz_id">

							<input type="hidden" value="<?php echo $_GET['courseid'] ?>" name="course_id">
							<input type="hidden" value="<?php echo $student_id ?>" name="student_id">
							
							
			 
					
						<ul type="A">
							 	<?php $ans= "";
								$viewans = $viewcls->givenansview($rows['quiz_id'],$student_id);
								foreach ($viewans as $values) {
									$ans = $values['student_ans'];
								}
							$quizview = $viewcls->multipleview($rows['quiz_id'],$student_id);
							foreach ($quizview as $rows) {
							 ?>
							<li><input <?php if ($ans==$rows['ans_id']) {
								echo "checked";
							}else{} ?> type="radio" value="<?php echo $rows['ans_id'] ?>" name="student_ans">
								<?php echo $rows['multiple'] ?>
							</li>
							<?php if ($rows['answer']==1) { ?>
								  <input type="hidden" value="<?php echo $rows['ans_id'] ?>" name="given_ans">  
							<?php } ?>
						 
					<?php } ?>
							 
						</ul>
						<?php } ?>	
<?php 
$getCourse = $viewcls->quizviewbyid($_GET['courseid']);
$total_rows = mysqli_num_rows($getCourse);
$total_page = ceil($total_rows/$per_page);
?>
				 
						<?php  

						 if (!isset($_GET['page'])) {
						 	$page = 1;
						 }else{
						 	$page=($_GET['page']);
						 }
						
                if (($page)>$total_rows) {
                	$cid = $_GET['courseid'];
                	echo "<script> window.location = 'final.php?courseid=$cid';</script>";
                }
                echo "<input class='site-btn btn-dark mr-3 mb-3 mb-md-0' name='storedata' value='Confirm' type='submit'><a class='site-btn mr-3 mb-3 mb-md-0'href='?question=1&courseid=".$_GET['courseid']."&page=".($page+1)."'>Next</a>";
         ?>  </form>
					</div>
					</div>
		

				</div>
			</div>
 	<?php } ?>
		 
		 
		</div>
	</section>
	<!-- Page end -->
 	<?php include 'include/footer.php'; ?>