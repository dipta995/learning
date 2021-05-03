 <?php include 'include/header.php'; ?>

  <?php  $marks = $viewcls->totamarks($_GET['courseid'],$student_id);

   $mark = $viewcls->studentmarks($_GET['courseid'],$student_id);
/*   $cid = $_GET['courseid'];
   if ($mark!=$marks) {
    	echo "<script> window.location='courseplaylist.php?playlistid=$cid'</script>";
    } */
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

	<section class="elements-page spad pb-0">
		<div class="container">
	 
			  
			<div class="element">
	<!-- 			<h2 class="e-title">Get Started for exam</h2>
				<p>Total Question: 10</p>
				 -->

			<!-- 	<a href="#" class="site-btn mr-3 mb-3 mb-md-0">Send Message</a>
				<a href="#" class="site-btn btn-dark mr-3 mb-3 mb-md-0">Send Message</a>
				<a href="#" class="site-btn btn-fade">Send Message</a> -->
			</div>
	 
			<!-- Element -->
			<div class="element">
				<!-- <h2 class="e-title">Get Started for exam</h2> -->
				<div class="row">
					<div class="col-lg-6 mb-4 mb-lg-0">
						 
				 	<div class="phone-number">
				  	<h3>Your Total Schor is <?php echo $mark; ?> out of <?php echo $marks; ?></h3><br>
				  	<a download href="pdf.php?courseid=<?php echo $_GET['courseid'] ?>" class="site-btn mr-3 mb-3 mb-md-0">Download Certificate</a>
				 	 
					</div>
					</div>
		

				</div>
			</div>
  
		 
		 
		</div>
	</section>







 <?php include 'include/footer.php'; ?>