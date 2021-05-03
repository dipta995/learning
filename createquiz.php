	<?php include 'include/header.php'; ?>

	<!-- Page info -->
	<div class="page-info-section set-bg" data-setbg="img/page-bg/4.jpg">
		<div class="container">
			<div class="site-breadcrumb">
				<a href="#">Home</a>
				<span>Contact</span>
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



	<!-- Page -->
	<section class="contact-page spad pb-0">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="contact-form-warp">
						<div class="section-title text-white text-left">
							<h2>Get in Touch</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec malesuada lorem maximus mauris scelerisque, at rutrum nulla dictum. Ut ac ligula sapien. </p>
						</div>
						
						<?php 
								if ($_SERVER['REQUEST_METHOD']=='POST'&& isset($_POST['addquestions'])) {
								$sending = $senddata->addquestion($_POST,$_GET['playlistid']);
								}

								if ($_SERVER['REQUEST_METHOD']=='POST'&& isset($_POST['addanswer'])){
								$sending = $senddata->addquiz($_POST,$_GET['quizid']);
								}
/*
								if ($_SERVER['REQUEST_METHOD']=='POST'&& isset($_POST['upanswer'])){
								$sending = $senddata->upquiz($_POST,$_GET['upquizid']);
								}
*/
								if (isset($_GET['delquizid'])) {
									$deletedata->deletequiz($_GET['playlistid'],$_GET['delquizid']);
								}

							if (isset($_GET['quizid'])) { ?>
								<form method="post" action="" class="contact-form">
						 
							
						<div>

												
							<div class="form-check">
								  <input style="float: left;
								margin-top: 28px;" type="radio" name="answer"  value="1">
								  <input style="margin-left: 24px;
								margin-top: -32px;" type="text" name="multiple1" placeholder="Multiple Anser 1">
							</div>
							<div class="form-check">
								  <input style="float: left;
								margin-top: 28px;" type="radio" name="answer"  value="2">
								  <input style="margin-left: 24px;
								margin-top: -32px;" type="text" name="multiple2" placeholder="Multiple Anser 1">
							</div>
							<div class="form-check">
								  <input style="float: left;
								margin-top: 28px;" type="radio" name="answer"  value="3">
								  <input style="margin-left: 24px;
								margin-top: -32px;" type="text" name="multiple3" placeholder="Multiple Anser 1">
							</div>
							<div class="form-check">
								  <input style="float: left;
								margin-top: 28px;" type="radio" name="answer"  value="4">
								  <input style="margin-left: 24px;
								margin-top: -32px;" type="text" name="multiple4" placeholder="Multiple Anser 1">
							</div>
					  
						 
						</div>
 
							<input type="submit" name="addanswer" class="site-btn" value="Add Quizes">
						</form>
								
							<?php }elseif(isset($_GET['upquizid'])){ ?>

								<form method="post" action="" class="contact-form">
									
						 
							
						<div>

												
							<div class="form-check">
								  <input style="float: left;
								margin-top: 28px;" type="radio" name="answer"  value="1">
								  <input style="margin-left: 24px;
								margin-top: -32px;" type="text" name="multiple1" placeholder="Multiple Anser 1">
							</div>
							<div class="form-check">
								  <input style="float: left;
								margin-top: 28px;" type="radio" name="answer"  value="2">
								  <input style="margin-left: 24px;
								margin-top: -32px;" type="text" name="multiple2" placeholder="Multiple Anser 1">
							</div>
							<div class="form-check">
								  <input style="float: left;
								margin-top: 28px;" type="radio" name="answer"  value="3">
								  <input style="margin-left: 24px;
								margin-top: -32px;" type="text" name="multiple3" placeholder="Multiple Anser 1">
							</div>
							<div class="form-check">
								  <input style="float: left;
								margin-top: 28px;" type="radio" name="answer"  value="4">
								  <input style="margin-left: 24px;
								margin-top: -32px;" type="text" name="multiple4" placeholder="Multiple Anser 1">
							</div>
					  
						 
						</div>
 
							<input type="submit" name="upanswer" class="site-btn" value="Update quizes">
						</form>


						<?php	}else{
						 ?>
						 <form method="post" action="" class="contact-form">
						 
							<textarea name="quiz_question" placeholder="Question"></textarea>
					
 
							<input type="submit" name="addquestions" class="site-btn" value="Add Question">
						</form>
					<?php } ?>






					</div>
				</div>
				<div class="col-lg-4">
					<div class="contact-info-area">
						<div class="section-title text-left p-0">
							<h2>Created Quiz</h2><a class="site-btn" href="createquiz.php?playlistid=<?php echo $_GET['playlistid'] ?>">New question</a>
							<p>Donec malesuada lorem maximus mauris scelerisque, at rutrum nulla dictum. Ut ac ligula sapien. Suspendi sse cursus faucibus finibus.</p>
						</div>
						<div class="phone-number">.
							<?php 
							$quizview = $viewcls->quizviewbyid($_GET['playlistid']);
							$a = 0;
							foreach ($quizview as $rows) {
								$a++;
							 ?>
							<span> Question : <?php echo $a; ?></span>
							<h2><?php echo $rows['quiz_question'] ?></h2>
							<?php if ($rows['quiz_flag']==0) { ?>
								<a class="site-btn" href="createquiz.php?playlistid=<?php echo $_GET['playlistid']  ?>&quizid=<?php echo $rows['quiz_id'] ?>">Add Multiple</a>
							<?php }else{ ?>
							
							 <a class="site-btn" href="?playlistid=3&delquizid=<?php echo $rows['quiz_id'] ?>">Delete Multiple</a>  <?php } ?>
					
						<ul type="A">
							 	<?php 
							$quizview = $viewcls->multipleview($rows['quiz_id'],$student_id);
							foreach ($quizview as $rows) {
							 ?>
							<li style="
							<?php if ($rows['answer']==1) { ?>background-color: #96d096;padding:5px;<?php }?>"><?php echo $rows['multiple'] ?></li>
							
						 
					<?php } ?>
							 
						</ul>
						<?php } ?>	
					</div>
					 
					</div>
				</div>
			</div>
			<div id="map-canvas"></div>
		</div>
	</section>
	<!-- Page end -->


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