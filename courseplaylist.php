	<?php include 'include/header.php';

	/*$coursesid =$_GET['playlistid'];
	$viewcat = $viewcls->coursesviewbyid($coursesid);
	if ($viewcat) {
		foreach ($viewcat as $key) {
			$pay = $key['pay__status'];
		}
		if ($pay == 1) {
			# code...
		}
	}*/
						
								


	 ?>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script> 
$(document).ready(function(){
  $("#flip").click(function(){
    $("#panel").slideToggle("slow");
  });
});
</script>
<style> 
#panel, #flip {
  padding: 5px;
  text-align: center;
  background-color: red;
  border: solid 1px red;
  color: white;

}

#panel {
  padding: 50px;
  display: none;
  height: 400px;
}
</style>
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
	<?php if (isset($_SESSION['teacher_auth'])=='teacher_auth') {

		if ($_SERVER['REQUEST_METHOD']=='POST') {
$sending = $senddata->addvideo_t($_POST,$_FILES,$_GET['playlistid']);
}
	 ?>
	 <section class="search-section ss-other-page">
		<div class="container">
			<div class="search-warp">
				<div class="section-title text-white">
					<h2><span>Upload your Video</span></h2>

				</div>
				<div class="row">
					<div class="col-lg-10 offset-lg-1">
						<!-- search form -->
						<form method="post" action="" class="course-search-form" enctype="multipart/form-data">
							<input type="text" name="video_title" placeholder="Video title">
							<input type="file" name="video_file" class="last-m" placeholder="Video">
							<button name="video_up" class="site-btn btn-dark">Upload Video</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php }else{ ?>
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
<?php } ?>
	
	<!-- search section end -->



	<!-- Page -->
	<section class="contact-page spad pb-0">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					 		<?php if (isset($sending)) {
								echo $sending;
							} ?>

						 
							  <video class="contact-form-warp" width="700" controls>
								<source src="<?php echo $_GET['vieolink'] ?>" type="video/mp4">
								<source src="mov_bbb.ogg" type="video/ogg">
								Your browser does not support HTML video.
							</video>
					 
				 
				</div>
				<div class="col-lg-4">
					<div class="contact-info-area">
							<?php 
							$singlecourset = $viewcls->coursesviewbyid($_GET['playlistid']);
							foreach ($singlecourset as $rows) {
							 ?>

							<div style="background-color: #d82a4e; padding: 5px; color: #fff; text-align: center;"><?php echo $rows['course_title'] ?></div>  <br>
							

							<br>
						<?php }
						if (isset($_SESSION['teacher_auth'])=='teacher_auth') {

						 ?>
						<div style="background-color: #d82a4e; padding: 5px; color: #fff; text-align: center;"><a href="createquiz.php?playlistid=<?php echo $rows['course_id'] ?>">Create Quiz</a></div> <?php }else{ ?> <br>
						<div style="background-color: #d82a4e; padding: 5px; color: #fff; text-align: center;"><a style="color: #fbf8f8;" href="quiz.php?courseid=<?php echo $_GET['playlistid']; ?>">Take Quiz</a> <?php } ?></div> <br>
						<div class="section-title text-left p-0">
						
							<div id="flip">click to view</div>
							<div id="panel">
								<?php 
								$singlecourse = $viewcls->videogetall($_GET['playlistid']);
								if ($singlecourse) {
								foreach ($singlecourse as $row) {
								 ?>
							<p style="float: left; color: white;width: 100%;"><a style="color: white;font-size: 16px;" href="?&playlistid=<?php echo $_GET['playlistid'] ?>&vieolink=<?php echo $row['video_file']; ?>"><?php echo $row['video_title']; ?></a></p>

						<?php } }  ?>
							 
							</div>
						</div>
						<div class="phone-number">
							<?php  ?><?php include 'rat.php'; ?>
							
						</div>
					 
						 
					</div>
				</div>
			</div>
		 
		</div>
	</section>
	<!-- Page end -->


	 
	<!-- banner section end -->
	<?php include 'include/footer.php'; ?>